<?php

namespace App\Models;

use App\Enums\Department;
use App\Enums\UserRole;
use App\Enums\Wing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'employee_id',
        'role',
        'title',
        'password',
        'wing',
        'department',
        'departments',
        'other_department_label',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
            'wing' => Wing::class,
            'department' => Department::class,
            'departments' => 'array',
        ];
    }

    public function mediaItems(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function avatarMedia(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable')
            ->where('collection_name', 'avatar')
            ->latestOfMany();
    }

    public function observationsReceived(): HasMany
    {
        return $this->hasMany(Observation::class, 'observee_id');
    }

    public function observationsConducted(): HasMany
    {
        return $this->hasMany(Observation::class, 'observer_id');
    }

    public function canOpenObservationsPortalForObservee(User $observee): bool
    {
        if ($this->isFaculty()) {
            return false;
        }

        if ($this->isAdmin() || $this->isPrincipal()) {
            return $observee->isSectionHead() || $observee->isFaculty();
        }

        return $this->canObserveUser($observee);
    }

    public function initials(): string
    {
        $parts = preg_split('/\s+/', trim($this->name)) ?: [];

        $letters = '';
        foreach (array_slice($parts, 0, 2) as $part) {
            $letters .= Str::upper(Str::substr($part, 0, 1));
        }

        return $letters !== '' ? $letters : '?';
    }

    public function avatarUrl(): ?string
    {
        $media = $this->relationLoaded('avatarMedia')
            ? $this->getRelation('avatarMedia')
            : $this->avatarMedia()->first();

        return $media instanceof Media ? $media->url() : null;
    }

    public function isAdmin(): bool
    {
        return $this->role === UserRole::Admin;
    }

    public function isPrincipal(): bool
    {
        if ($this->role instanceof UserRole) {
            return $this->role === UserRole::Principal;
        }

        $raw = $this->getRawOriginal('role');

        return is_string($raw) && UserRole::tryFrom($raw) === UserRole::Principal;
    }

    public function isSectionHead(): bool
    {
        return $this->role === UserRole::SectionHead;
    }

    public function isFaculty(): bool
    {
        return $this->role === UserRole::Faculty;
    }

    public function canAccessQuantQualObservationPages(): bool
    {
        return ! $this->isPrincipal() && ! $this->isAdmin();
    }

    public function departmentsLabelForDisplay(): string
    {
        if ($this->isFaculty()) {
            return $this->department?->label() ?? '—';
        }

        if ($this->isSectionHead()) {
            $labels = collect($this->departments ?? [])->map(function ($v) {
                if (! is_string($v)) {
                    return null;
                }
                if ($v === Department::Other->value) {
                    return filled($this->other_department_label)
                        ? 'Other ('.$this->other_department_label.')'
                        : Department::Other->label();
                }

                return Department::tryFrom($v)?->label();
            })->filter()->values();

            return $labels->isEmpty() ? '—' : $labels->implode(', ');
        }

        return $this->department?->label() ?? '—';
    }

    public function canAccessSystemSettings(): bool
    {
        return $this->isAdmin()
            || $this->isPrincipal()
            || $this->isSectionHead()
            || $this->isFaculty();
    }

    public function canViewSystemSettingsOverview(): bool
    {
        return $this->isAdmin() || $this->isPrincipal();
    }

    public function canAccessObservations(): bool
    {
        return $this->isAdmin()
            || $this->isPrincipal()
            || ($this->isSectionHead() && $this->wing !== null);
    }

    public function canObserveUser(User $observee): bool
    {
        if ($this->isFaculty()) {
            return false;
        }

        if ($this->isAdmin() || $this->isPrincipal()) {
            return $observee->isSectionHead() || $observee->isFaculty();
        }

        if ($this->isSectionHead() && $this->wing !== null) {
            return $observee->isFaculty()
                && $observee->wing === $this->wing;
        }

        return false;
    }

    public function canEditObservation(\App\Models\Observation $observation): bool
    {
        if ($this->isAdmin() || $this->isPrincipal()) {
            return true;
        }

        return $this->id === $observation->observer_id;
    }

    public static function departmentValuesAssignedToSectionHeads(): Collection
    {
        return static::query()
            ->where('role', UserRole::SectionHead)
            ->pluck('departments')
            ->flatten()
            ->filter(fn ($v) => is_string($v) && $v !== '')
            ->unique()
            ->values();
    }

    public static function departmentsForObservationContext(): Collection
    {
        $values = static::departmentValuesAssignedToSectionHeads();
        $departments = $values
            ->map(fn (string $v) => Department::tryFrom($v))
            ->filter()
            ->unique(fn (Department $d) => $d->value)
            ->sortBy(fn (Department $d) => $d->label())
            ->values();

        if ($departments->isEmpty()) {
            return collect(Department::cases())->sortBy(fn (Department $d) => $d->label())->values();
        }

        return $departments;
    }

    public static function observationDepartmentAllowedValues(): array
    {
        return static::departmentsForObservationContext()
            ->map(fn (Department $d) => $d->value)
            ->values()
            ->all();
    }
}
