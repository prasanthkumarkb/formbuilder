@extends('formbuilder::layouts.master')

@section('content')

<div class="card">

    <div class="card-header">

        Add Field

    </div>

    <div class="card-body">

        <form method="POST"  action="{{ route('fields.store', $form->id) }}">

            @csrf

            <div class="mb-3">

                <label>Label</label>

                <input
                    type="text"
                    name="label"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Field Name</label>

                <input
                    type="text"
                    name="field_name"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Field Type</label>

                <select
                    name="field_type"
                    class="form-control">

                    <option value="text">Text</option>

                    <option value="email">Email</option>

                    <option value="number">Number</option>

                    <option value="date">Date</option>

                    <option value="textarea">
                        Textarea
                    </option>

                    <option value="select">
                        Dropdown
                    </option>

                </select>

            </div>

            <div class="form-check mb-3">

                <input
                    type="checkbox"
                    name="required"
                    value="1">

                Required

            </div>

            <div class="mb-3">

                <label>

                    Validation Rules

                </label>

                <input
                    type="text"
                    name="validation_rules"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>

                    Options

                </label>

                <textarea
                    name="options"
                    class="form-control"></textarea>

                <small>

                    Example

                </small>

                ```text
                India,USA,UK
                ```

            </div>

            <button
                class="btn btn-success">

                Save

            </button>

        </form>

    </div>

</div>

@endsection