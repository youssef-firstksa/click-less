<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StoreRoleRequest extends FormRequest
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
            'name' => ['required', Rule::unique('roles')],
            'permission_ids' => ['required', 'array'],
        ];

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules[$localeCode] = ['required', 'array'];
            $rules["{$localeCode}.title"] = ['required', 'string'];
        }

        return $rules;
    }
}
