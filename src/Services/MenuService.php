<?php
namespace Prasanth\FormBuilder\Services;

class MenuService
{
    public static function getMenu()
    {
        return config('formbuilder.menu');
    }
}