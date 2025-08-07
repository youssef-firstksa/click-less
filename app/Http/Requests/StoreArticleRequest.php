<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Enums\Status;

class StoreArticleRequest extends FormRequest
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
            'product_id' => ['required', Rule::exists('products', 'id')],
            'section_id' => ['required', Rule::exists('sections', 'id')],
            'published_at' => ['nullable', 'date'],
        ];

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules[$localeCode] = ['required', 'array'];
            $rules["{$localeCode}.title"] = ['required', 'string'];
            $rules["{$localeCode}.content"] = ['required', 'string'];
        }

        return $rules;
    }
}
