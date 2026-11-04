<?php

namespace Prasanth\FormBuilder\Models;

use Illuminate\Database\Eloquent\Model;
use Prasanth\FormBuilder\Models\FormSection;
class FormScreen extends Model
{
    protected $table = 'form_screens';

    protected $fillable = [
        'form_id',
        'name',
        'sort_order'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function sections()
    {
        return $this->hasMany(FormSection::class, 'screen_id')
                    ->orderBy('sort_order');
    }
}