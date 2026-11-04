<?php

namespace Prasanth\FormBuilder\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Prasanth\FormBuilder\Models\Form;
use Prasanth\FormBuilder\Models\FormScreen;
use Prasanth\FormBuilder\Requests\StoreScreenRequest;
use Prasanth\FormBuilder\Requests\UpdateScreenRequest;
class FormScreenController extends Controller
{
    public function store(StoreScreenRequest $request, $id)
    {
       
            $screen = FormScreen::create([
            'form_id'    => $id,
            'name'       => $request->name,
            'sort_order' => $request->sort_order ?? 0
        ]);

        return response()->json([
            'success' => true,
            'screen'  => $screen
        ]);
    }

    public function update(UpdateScreenRequest $request, $id)
    {
        $screen = FormScreen::findOrFail($id);
        
        $screen->update([
            'name' => $request->name,
            'sort_order' => $request->sort_order
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        FormScreen::findOrFail($id)->delete();

        return response()->json([
            'success'=>true
        ]);
    }

}