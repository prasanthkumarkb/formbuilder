<?php

namespace Prasanth\FormBuilder\Models;

use Illuminate\Database\Eloquent\Model;
use Prasanth\FormBuilder\Models\FormField;
use Prasanth\FormBuilder\Models\FormScreen;
use Prasanth\FormBuilder\Models\FormSection;
class Form extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status'
    ];

    public function fields()
    {
        return $this->hasMany(
            FormField::class,
            'form_id'
        )->orderBy('sort_order');
    }

    public function screens()
    {
        return $this->hasMany(FormScreen::class)
            ->orderBy('sort_order');
    }

    public function sections()
    {
        return $this->hasMany(FormSection::class)
                    ->orderBy('sort_order');
    }
}
