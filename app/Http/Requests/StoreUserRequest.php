<?php

namespace App\Http\Requests;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'hr_id' => ['required', 'string', Rule::unique('users', 'hr_id')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8'],
            'gender' => ['required', 'in:male,female'],
            'status' => ['required', Rule::in(Status::cases())],
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'bank_ids' => ['required', 'array'],
            'bank_ids.*' => [Rule::exists('banks', 'id')],
        ];

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules[$localeCode] = ['required', 'array'];
            $rules["{$localeCode}.name"] = ['required', 'string'];
        }

        return $rules;
    }
}
