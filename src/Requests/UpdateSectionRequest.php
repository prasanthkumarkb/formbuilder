<?php

namespace Prasanth\FormBuilder\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'code' => [
                'required',
                'max:100'
            ],

            'name' => [
                'required',
                'max:255'
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0'
            ]

        ];
    }

    public function messages(): array
    {
        return [

            'code.required' =>
                'Section Code is required.',

            'code.max' =>
                'Section Code cannot exceed 100 characters.',

            'name.required' =>
                'Section Name is required.',

            'name.max' =>
                'Section Name cannot exceed 255 characters.'

        ];
    }
}