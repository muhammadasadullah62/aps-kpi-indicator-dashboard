<?php

namespace App\Http\Requests;

use App\Enums\Department;
use App\Enums\Wing;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFacultyRequest extends FormRequest
{
    public function authorize(): bool
    {
        $u = $this->user();

        return $u && ($u->isAdmin() || $u->isPrincipal() || $u->isSectionHead());
    }

    public function rules(): array
    {

        $subject = $this->route('user');

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'employee_id' => ['prohibited'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users', 'email')->ignore($subject->id)],
            'password' => ['nullable', 'string', 'min:8'],
            'department' => ['required', Rule::enum(Department::class)],
            'title' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ];

        $rules['wing'] = $this->user()?->isSectionHead()
            ? ['prohibited']
            : ['required', Rule::enum(Wing::class)];

        return $rules;
    }
}
