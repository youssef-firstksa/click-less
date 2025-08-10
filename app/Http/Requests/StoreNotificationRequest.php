<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Enums\Status;

class StoreNotificationRequest extends FormRequest
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
            'status' => ['required', Rule::in(Status::cases())],
            'bank_id' => ['required', Rule::exists('banks', 'id')],
            'notification_type' => ['required', 'string'],
            'notification_view' => ['required', 'string'],
            'publish_start_at' => ['nullable', 'date'],
            'publish_end_at' => ['nullable', 'date'],
        ];

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules[$localeCode] = ['required', 'array'];
            $rules["{$localeCode}.title"] = ['required', 'string'];
            $rules["{$localeCode}.description"] = ['required', 'string'];
        }

        return $rules;
    }
}
