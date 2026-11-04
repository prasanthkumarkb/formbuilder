<?php
namespace Prasanth\FormBuilder\Models;

use Illuminate\Database\Eloquent\Model;
use Prasanth\FormBuilder\Models\FormScreen;
class FormSection extends Model
{
    protected $table = 'form_sections';

    protected $fillable = [
        'form_id',
        'screen_id',
        'code',
        'name',
        'sort_order'
    ];

    public function screen()
    {
        return $this->belongsTo(FormScreen::class);
    }
    
    public function fields()
    {
    return $this->hasMany(
        FormField::class,
        'section_id'
    )->orderBy('sort_order');
    }
}