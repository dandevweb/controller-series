<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:3',
            'episodes' => 'required|integer|min:1',
            'seasons' => 'required|integer|min:1',
            'cover' => 'nullable|image'
        ];
    }
}
