<?php

namespace Prasanth\FormBuilder\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'label' => [
                'required',
                'max:255'
            ],

            'field_name' => [
                'required',
                'max:255',
                'regex:/^[a-zA-Z][a-zA-Z0-9_]*$/'
            ],

            'field_type' => [
                'required',
                'in:text,textarea,number,email,date,select,radio,checkbox,file'
            ],

            'column_width' => [
                'nullable',
                'integer',
                'min:1',
                'max:12'
            ],

            'context' => [
                'nullable',
                'in:admin,customer,both'
            ],

            'min_length' => [
                'nullable',
                'integer',
                'min:0'
            ],

            'max_length' => [
                'nullable',
                'integer',
                'gte:min_length'
            ],

            'min_value' => [
                'nullable',
                'numeric'
            ],

            'max_value' => [
                'nullable',
                'numeric',
                'gte:min_value'
            ],

            'validation_rules' => [
                'nullable',
                'string'
            ],

            'pattern' => [
                'nullable',
                'string'
            ],

            'options' => [
                'nullable',
                'string'
            ],

            'placeholder' => [
                'nullable',
                'max:255'
            ],

            'default_value' => [
                'nullable',
                'max:255'
            ],

            'help_text' => [
                'nullable',
                'string'
            ],

            'css_class' => [
                'nullable',
                'max:255'
            ],

            'tooltip' => [
                'nullable',
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

            'label.required' =>
                'Field Label is required.',

            'field_name.required' =>
                'Field Name is required.',

            'field_name.regex' =>
                'Field Name can contain only letters, numbers and underscore.',

            'field_type.required' =>
                'Field Type is required.',

            'column_width.max' =>
                'Column Width cannot be greater than 12.',

            'max_length.gte' =>
                'Max Length must be greater than or equal to Min Length.',

            'max_value.gte' =>
                'Max Value must be greater than or equal to Min Value.'

        ];
    }
}