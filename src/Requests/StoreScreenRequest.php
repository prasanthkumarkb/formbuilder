<?php

namespace Prasanth\FormBuilder\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScreenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:30',
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ];
    }

    public function messages(): array
    {
         return [
            'name.required' => 'Screen Name is required.',
            'name.max' => 'Screen Name cannot exceed 30 characters.',
            'sort_order.integer' => 'Sort Order must be an integer.',
            'sort_order.min' => 'Sort Order must be a positive integer.',
        ];
    }
}