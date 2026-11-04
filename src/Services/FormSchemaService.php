<?php

namespace Prasanth\FormBuilder\Services;

use Illuminate\Support\Facades\Storage;
use Prasanth\FormBuilder\Models\Form;

class FormSchemaService
{
    public function generate(Form $form): array
    {
        $form->load([
    'screens.sections.fields'
]);

        return [

    'id' => $form->id,

    'name' => $form->name,

    'slug' => $form->slug,

    'screens' =>

        $form->screens->map(function($screen){

            return [

                'id' => $screen->id,

                'name' => $screen->name,

                'sort_order' =>
                    $screen->sort_order,

                'sections' =>

                    $screen->sections->map(
                        function($section){

                            return [

                                'id' =>
                                    $section->id,

                                'code' =>
                                    $section->code,

                                'name' =>
                                    $section->name,

                                'fields' =>

                                    $section->fields->map(
                                        function($field){

                                            return [

                                                'id'=>$field->id,

                                                'label'=>$field->label,

                                                'name'=>$field->field_name,

                                                'type'=>$field->field_type,

                                                'required'=>
                                                    (bool)
                                                    $field->required,

                                                'validation_rules'=>
                                                    $field->validation_rules,

                                                'options'=>
                                                    $field->options
                                            ];

                                        }
                                    )->values()
                            ];

                        }
                    )->values()

            ];

        })->values()

];
    }

    public function save(Form $form): void
    {
        $json = json_encode(
            $this->generate($form),
            JSON_PRETTY_PRINT
        );
        $result = Storage::disk('public')->put(
    'forms/'.$form->slug.'.json',
    $json
);


        

  
    }
}