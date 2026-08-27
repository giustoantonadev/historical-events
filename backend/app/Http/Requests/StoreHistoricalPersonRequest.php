<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHistoricalPersonRequest extends FormRequest
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
        ];
    }
}
