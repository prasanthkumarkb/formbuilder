<?php

namespace Prasanth\FormBuilder\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Prasanth\FormBuilder\Models\Form;
use Prasanth\FormBuilder\Models\FormScreen;
use Prasanth\FormBuilder\Models\FormSection;
use Prasanth\FormBuilder\Models\FormField;
use Prasanth\FormBuilder\Services\FormSchemaService;
class BuilderController extends Controller
{
    public function index($id)
    {
         $form = Form::with('screens.sections.fields')
                ->findOrFail($id);
        $selectedScreen = $form->screens->first();
        return view(
            'formbuilder::builder.index',
            compact('form', 'selectedScreen')
        );
    }

    public function property($type,$id)
{
    if($type=='screen')
    {
        $screen = FormScreen::findOrFail($id);

        return view(
            'formbuilder::builder.partials.screen',
            compact('screen')
        );
    }

    if($type=='section')
    {
        $section = FormSection::findOrFail($id);

        return view(
            'formbuilder::builder.partials.section',
            compact('section')
        );
    }

    if($type=='field')
    {
        $field = FormField::findOrFail($id);

        return view(
            'formbuilder::builder.partials.field',
            compact('field')
        );
    }
}

public function jsonPreview(
    FormSchemaService $service,
    $id
)
{
    $form = Form::findOrFail($id);

    return response()->json(
        $service->generate($form)
    );
}

public function publish(
    FormSchemaService $service,
    $id
)
{
    $form = Form::findOrFail($id);

    $service->save($form);

    return response()->json([
        'success'=>true
    ]);
}

public function sortScreens(Request $request)
{
    foreach($request->items as $item)
    {
        FormScreen::where(
            'id',
            $item['id']
        )->update([
            'sort_order' =>
                $item['sort_order']
        ]);
    }

    return response()->json([
        'success'=>true
    ]);
}

public function sortSections(Request $request)
{
    foreach($request->items as $item)
    {
        FormSection::where(
            'id',
            $item['id']
        )->update([
            'sort_order' =>
                $item['sort_order']
        ]);
    }

    return response()->json([
        'success'=>true
    ]);
}

public function sortFields(Request $request)
{
    foreach($request->items as $item)
    {
        FormField::where(
            'id',
            $item['id']
        )->update([
            'sort_order' =>
                $item['sort_order']
        ]);
    }

    return response()->json([
        'success'=>true
    ]);
}
}