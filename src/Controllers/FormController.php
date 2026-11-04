<?php

namespace Prasanth\FormBuilder\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Prasanth\FormBuilder\Models\Form;
use Illuminate\Validation\Rule;
class FormController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $query = Form::query();

            if ($request->search['value']) {

                $search = $request->search['value'];

                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            }

            $total = $query->count();

            $forms = $query
                ->offset($request->start)
                ->limit($request->length)
                ->latest()
                ->get();

            $data = [];

            foreach ($forms as $form) {
                    $actions = '

                    <a href="/admin/forms/' . $form->id . '/builder"
                    class="btn btn-info btn-sm">
                    Builder
                    </a>

                    <a href="/admin/forms/' . $form->id . '/edit"
                    class="btn btn-warning btn-sm">
                    Edit
                    </a>

                     <a href="javascript:void(0)"
                    class="btn btn-danger btn-sm delete-form" data-id="' . $form->id . '">
                    Delete
                    </a>

                    ';
                $data[] = [
                    'id' => $form->id,
                    'name' => $form->name,
                    'slug' => $form->slug,
                    'created_at' => $form->created_at->format('d-m-Y'),
                    'actions' => $actions
                ];
            }

            return response()->json([
                'draw' => intval($request->draw),
                'recordsTotal' => $total,
                'recordsFiltered' => $total,
                'data' => $data
            ]);
        }

        return view('formbuilder::forms.index');
    }

    public function create()
    {
        return view(
            'formbuilder::forms.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:forms,name',
            'description' => 'nullable|max:1000'
        ], [
            'name.required' => 'Form name is required.',
            'name.unique' => 'Form name already exists.'
        ]);

        Form::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => true
        ]);

        return redirect('/admin/forms')
            ->with('success', 'Form created successfully.');
    }

    public function edit($id)
    {
        $form = Form::findOrFail($id);

        return view(
            'formbuilder::forms.edit',
            compact('form')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('forms')
                    ->ignore($id),
            ],
        ]);

        $form = Form::findOrFail($id);

        $form->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect('/admin/forms')
            ->with('success', 'Form updated successfully.');
    }

    public function destroy($id)
    {
        Form::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Form deleted successfully'
        ]);
    }
}