<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHistoricalPersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'birth_year' => 'nullable|integer',
            'portrait' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name_it' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_fr' => 'nullable|string|max:255',
            'biography_it' => 'nullable|string',
            'biography_en' => 'nullable|string',
            'biography_fr' => 'nullable|string',
        ];
    }
}
