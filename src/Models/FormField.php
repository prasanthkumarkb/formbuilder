<?php

namespace Prasanth\FormBuilder\Models;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    protected $table = 'form_fields';

        protected $fillable = [

    'form_id',
    'screen_id',
    'section_id',

    'label',
    'field_name',
    'field_type',

    'placeholder',
    'default_value',
    'help_text',

    'required',

    'min_length',
    'max_length',

    'min_value',
    'max_value',

    'pattern',

    'validation_rules',
    'options',

    'context',

    'css_class',

    'column_width',

    'is_active',
    'is_readonly',
    'is_hidden',

    'tooltip',

    'sort_order'
];
}