<?php

namespace Prasanth\FormBuilder\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Prasanth\FormBuilder\Models\Form;
use Prasanth\FormBuilder\Models\FormSection;
use Prasanth\FormBuilder\Requests\StoreSectionRequest;
use Prasanth\FormBuilder\Requests\UpdateSectionRequest;
class FormSectionController extends Controller
{
    public function store(StoreSectionRequest  $request,$id)
    {
      
        $section = FormSection::create([

            'form_id' => $id,

            'screen_id' => $request->screen_id,

            'code' => $request->code,

            'name' => $request->name,

            'sort_order' => $request->sort_order ?? 0
        ]);

        return response()->json([
            'success' => true,
             'message' => 'Section created successfully',
            'section' => $section
        ]);
    }

    public function update(UpdateSectionRequest  $request,$id)
    {
        $section =
            FormSection::findOrFail($id);

        $section->update([

            'code' => $request->code,

            'name' => $request->name,

        ]);

        return response()->json([
            'success'=>true
        ]);
    }

   public function destroy($id)
    {
        FormSection::findOrFail($id)
            ->delete();

        return response()->json([
            'success'=>true,
            'message' => 'Section updated successfully'
        ]);
    }

    public function byScreen($id)
    {
    $sections = FormSection::where(
        'screen_id',
        $id
    )
    ->orderBy('sort_order')
    ->get([
        'id',
        'name',
        'code'
    ]);

    return response()->json([
        'success' => true,
        'data' => $sections
    ]);
    }
}
