@extends('formbuilder::layouts.master')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Create Form</h4>

    </div>

    <div class="card-body">

        <form action="{{ route('formbuilder.forms.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Form Name

                </label>

                <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name') }}">

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Description

                </label>

                <textarea
                    name="description"
                    rows="3"
                    class="form-control">{{ old('description') }}</textarea>

            </div>

            <button
                type="submit"
                class="btn btn-success">

                Save Form

            </button>

            <a href="/admin/forms"
               class="btn btn-secondary">

                Cancel

            </a>

        </form>

    </div>

</div>

@endsection