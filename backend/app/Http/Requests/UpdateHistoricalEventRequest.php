<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHistoricalEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer',
            'image' => 'nullable|image',
            'period_id' => 'required|exists:periods,id',
            'historical_person_ids' => 'nullable|array',
            'historical_person_ids.*' => 'exists:historical_people,id',
        ];
    }
}
