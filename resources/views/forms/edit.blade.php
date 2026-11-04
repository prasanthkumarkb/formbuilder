@extends('formbuilder::layouts.master')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Edit Form</h4>

    </div>

    <div class="card-body">

        <form
            action="/admin/forms/{{ $form->id }}/update"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>

                    Name

                </label>

                <input
                    type="text"
                    name="name"
                     class="form-control @error('name') is-invalid @enderror"
                    value="{{ $form->name }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">

                <label>

                    Description

                </label>

                <textarea
                    name="description"
                    class="form-control">{{ $form->description }}</textarea>

            </div>

            <button
                class="btn btn-success">

                Update

            </button>

        </form>

    </div>

</div>

@endsection