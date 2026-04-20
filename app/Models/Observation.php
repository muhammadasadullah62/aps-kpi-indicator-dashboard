<?php

namespace App\Models;

use App\Enums\Department;
use App\Enums\Wing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Observation extends Model
{
    protected $fillable = [
        'observer_id',
        'observee_id',
        'aggregate_percent',
        'sessions_payload',
        'notes',
        'observation_wing',
        'observation_department',
    ];

    protected function casts(): array
    {
        return [
            'sessions_payload' => 'array',
            'observation_wing' => Wing::class,
            'observation_department' => Department::class,
        ];
    }

    public function observer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'observer_id');
    }

    public function observee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'observee_id');
    }
}
