<?php

namespace App\Http\Requests;

use App\Enums\Wing;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreObservationRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $sessions = $this->input('sessions_payload');
        if (is_string($sessions)) {
            $decoded = json_decode($sessions, true);
            $this->merge([
                'sessions_payload' => is_array($decoded) ? $decoded : [],
            ]);
        }

        foreach (['observation_wing', 'observation_department'] as $key) {
            if ($this->input($key) === '') {
                $this->merge([$key => null]);
            }
        }
    }

    public function authorize(): bool
    {
        return $this->user()?->canAccessObservations() ?? false;
    }

    public function rules(): array
    {
        $observee = User::query()->find($this->input('observee_id'));
        $needsWingDepartment = $observee?->isSectionHead() ?? false;

        return [
            'observee_id' => ['required', 'exists:users,id'],
            'aggregate_percent' => ['required', 'integer', 'min:0', 'max:100'],
            'sessions_payload' => ['required', 'array'],
            'notes' => ['nullable', 'string', 'max:50000'],
            'observation_wing' => $needsWingDepartment
                ? ['required', Rule::enum(Wing::class)]
                : ['nullable', Rule::enum(Wing::class)],
            'observation_department' => $needsWingDepartment
                ? ['required', Rule::in(User::observationDepartmentAllowedValues())]
                : ['nullable', Rule::in(User::observationDepartmentAllowedValues())],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            $observee = User::query()->find($this->input('observee_id'));
            if (! $observee || ! $this->user()->canObserveUser($observee)) {
                $validator->errors()->add('observee_id', 'You are not allowed to record an observation for this person.');
            }
        });
    }
}
