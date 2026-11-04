<?php

namespace Prasanth\FormBuilder\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Prasanth\FormBuilder\Models\Form;
use Prasanth\FormBuilder\Models\FormField;
use Prasanth\FormBuilder\Services\FormSchemaService;
use Prasanth\FormBuilder\Requests\StoreFieldRequest;
use Prasanth\FormBuilder\Requests\UpdateFieldRequest;
class FormFieldController extends Controller
{
    public function index($id)
    {
        $form = Form::with('fields')
            ->findOrFail($id);

        return view(
            'formbuilder::fields.index',
            compact('form')
        );
    }

    public function create($id)
    {
        $form = Form::findOrFail($id);

        return view(
            'formbuilder::fields.create',
            compact('form')
        );
    }

    public function store(
        StoreFieldRequest $request,
        $id,
        FormSchemaService $schemaService
    )
    {
         

        $field = FormField::create([

            'form_id' => $id,

            'screen_id' => $request->screen_id,

            'section_id' => $request->section_id,

            'label' => $request->label,

            'field_name' => $request->field_name,

            'field_type' => $request->field_type,

            'required' => $request->required ? 1 : 0,

            'validation_rules' => $request->validation_rules,

            'options' => $request->options,

            'sort_order' => 0

        ]);

        return response()->json([
            'success' => true,
            'field' => $field
        ]);

       
    }

        public function update(
        UpdateFieldRequest  $request,
        $id
    )
    {
        $field =
            FormField::findOrFail($id);

       $field->update([

                'label'            => $request->label,
                'field_name'       => $request->field_name,
                'field_type'       => $request->field_type,

                'placeholder'      => $request->placeholder,
                'default_value'    => $request->default_value,
                'help_text'        => $request->help_text,

                'min_length'       => $request->min_length,
                'max_length'       => $request->max_length,

                'min_value'        => $request->min_value,
                'max_value'        => $request->max_value,

                'pattern'          => $request->pattern,

                'validation_rules' => $request->validation_rules,

                'options'          => $request->options,

                'column_width'     => $request->column_width,

                'context'          => $request->context,

                'css_class'        => $request->css_class,

                'tooltip'          => $request->tooltip,

                'required'         => $request->required,

                'is_active'        => $request->is_active,

                'is_readonly'      => $request->is_readonly,

                'is_hidden'        => $request->is_hidden,

                'sort_order'       => 0

            ]);

        return response()->json([
            'success'=>true
        ]);
    }

    public function destroy($id)
    {
        FormField::findOrFail($id)
                ->delete();

        return response()->json([
            'success'=>true
        ]);
    }
}