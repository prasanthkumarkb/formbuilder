@extends('formbuilder::layouts.master')

@section('content')

<div class="d-flex justify-content-between">

    <h3>

        {{ $form->name }}

    </h3>

    <a
    href="/admin/forms/{{ $form->id }}/fields/create"
    class="btn btn-primary">

        Add Field

    </a>

</div>

<hr>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<table class="table table-bordered">

    <thead>

    <tr>

        <th>ID</th>

        <th>Label</th>

        <th>Name</th>

        <th>Type</th>

        <th>Required</th>

    </tr>

    </thead>

    <tbody>

    @foreach($form->fields as $field)

    <tr>

        <td>{{ $field->id }}</td>

        <td>{{ $field->label }}</td>

        <td>{{ $field->field_name }}</td>

        <td>{{ $field->field_type }}</td>

        <td>

            @if($field->required)

                Yes

            @else

                No

            @endif

        </td>

    </tr>

    @endforeach

    </tbody>

</table>

@endsection