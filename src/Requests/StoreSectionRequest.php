<?php

namespace Prasanth\FormBuilder\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'screen_id' => [
                'required',
                'integer',
                'exists:form_screens,id'
            ],

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

            'screen_id.required' =>
                'Please select a screen.',

            'screen_id.exists' =>
                'Selected screen does not exist.',

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