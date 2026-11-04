@extends('formbuilder::layouts.master')

@section('content')
<style>
body {
    background: #f4f6f9;
}

.builder-header {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
}

.builder-layout {
    display: flex;
    gap: 20px;
}

.left-panel {
    width: 350px;
    background: #fff;
    border-radius: 12px;
    min-height: 700px;
    overflow: auto;
}

.right-panel {
    flex: 1;
    background: #fff;
    border-radius: 12px;
    min-height: 700px;
}

.panel-header {
    padding: 15px;
    border-bottom: 1px solid #eee;
    font-weight: 600;
}

.tree-item {
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 8px;
    margin-bottom: 5px;
}

.tree-item:hover {
    background: #f2f6ff;
}

.tree-item.active {
    background: #e8f0ff;
    border-left: 4px solid #0d6efd;
}

.screen-node {
    background: #f8fafc;
    border-radius: 12px;
    padding: 14px;
    border: 1px solid #e5e7eb;
    cursor: pointer;
    transition: .2s;
}

.screen-node:hover {
    background: #eef4ff;
}

.screen-node.selected {
    background: #dbeafe;
    border-left: 4px solid #2563eb;
}

.section-node {
    border-left: 3px solid #0d6efd;
    padding-left: 12px;
}

.field-node {
    padding-left: 10px;
}

.badge-screen {
    background: #0d6efd;
}

.badge-section {
    background: #198754;
}

.badge-field {
    background: #6c757d;
}
.drag-handle{
    cursor:move;
    color:#999;
}

.drag-handle{
    cursor: grab;
    color: #6c757d;
    display: inline-block;
    padding-right: 8px;
    user-select: none;
}

.drag-handle:active{
    cursor: grabbing;
}
.drag-handle{
    cursor: grab;
    color: #6c757d;
    user-select: none;
    font-weight: bold;
}

.screen-node{
    margin-bottom:15px;
}

.section-node{
    margin-top:10px;
}

.field-node{
    margin-top:5px;
}

.sortable-ghost{
    opacity:0.4;
}

.sortable-chosen{
    background:#eef4ff;
}
</style>
<script>



    window.FormBuilderConfig = {

        formId: {{ $form->id }},

        csrfToken: '{{ csrf_token() }}',
        saveScreenUrl: "{{ route('formbuilder.screens.store', $form->id) }}",
        updateScreenUrl:'{{ route("formbuilder.screens.update", "__ID__") }}',
        deleteScreenUrl:'{{ route("formbuilder.screens.destroy", "__ID__") }}',
        saveSectionUrl: "{{ route('formbuilder.sections.store', $form->id) }}",
        updateSectionUrl:'{{ route("formbuilder.sections.update", "__ID__") }}',
        deleteSectionUrl:'{{ route("formbuilder.sections.destroy", "__ID__") }}',
        saveFieldUrl: "{{ route('formbuilder.fields.store', $form->id) }}",
        updateFieldUrl:'{{ route("formbuilder.fields.update", "__ID__") }}',
        deleteFieldUrl:'{{ route("formbuilder.fields.destroy", "__ID__") }}',
        sectionsByScreenUrl: "{{ route('formbuilder.sections.byScreen', '__ID__') }}",
        sortScreensUrl: "{{ route('formbuilder.screens.sort', $form->id) }}",
        sortSectionsUrl: "{{ route('formbuilder.sections.sort', $form->id) }}",
        sortFieldsUrl: "{{ route('formbuilder.fields.sort', $form->id) }}"

    };



</script>
<div class="container-fluid py-4">

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="d-flex justify-content-between">

                <div>
                    <h3>{{ $form->name }}</h3>
                    <small class="text-muted">
                        Journey Builder
                    </small>
                </div>

                <div>

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addScreenModal"
                        data-bs-backdrop="static" data-bs-keyboard="false">

                        + Add Screen
                    </button>

                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSectionModal"
                        data-bs-backdrop="static" data-bs-keyboard="false">
                        + Add Section
                    </button>

                    <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#addFieldModal"
                        data-bs-backdrop="static" data-bs-keyboard="false">
                        + Add Field
                    </button>
                    <button id="previewJsonBtn" class="btn btn-warning">
                        JSON Preview
                    </button>
                    <button id="publishBtn" class="btn btn-dark">
                        Publish
                    </button>

                </div>

            </div>

        </div>

    </div>

    <div class="row mt-3">

        <div class="col-md-4">

            <div class="card">

                <div class="card-header">
                    Journey Structure
                </div>
               <div class="card-body">

    <div id="screen-list">

        <div id="screen-sortable">

            @forelse($form->screens as $screen)

                <div class="screen-node tree-item mb-3 {{ $loop->first ? 'active' : '' }}"
                     data-type="screen"
                     data-id="{{ $screen->id }}">

                    <span class="drag-handle me-2">⋮⋮</span>

                    <span class="badge badge-screen">
                        SCREEN
                    </span>

                    <strong class="ms-1">
                        {{ $screen->name }}
                    </strong>

                    {{-- SECTION CONTAINER --}}
                    <div class="section-sortable mt-3"
                         data-screen="{{ $screen->id }}">

                        @foreach($screen->sections as $section)

                            <div class="section-node ms-4"
                                 data-type="section"
                                 data-id="{{ $section->id }}">

                                <span class="drag-handle me-2">⋮⋮</span>

                                <span class="badge badge-section">
                                    SECTION
                                </span>

                                <span class="ms-1">
                                    {{ $section->code }}
                                    -
                                    {{ $section->name }}
                                </span>

                                {{-- FIELD CONTAINER --}}
                                <div class="field-sortable mt-2"
                                     data-section="{{ $section->id }}">

                                    @foreach($section->fields as $field)

                                        <div class="field-node ms-4"
                                             data-type="field"
                                             data-id="{{ $field->id }}">

                                            <span class="drag-handle me-2">⋮⋮</span>

                                            <span class="badge badge-field">
                                                FIELD
                                            </span>

                                            <span class="ms-1">
                                                {{ $field->label }}
                                            </span>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @empty

                <div class="text-center py-4">

                    <i class="bi bi-diagram-3 fs-1 text-muted"></i>

                    <p class="text-muted mt-2">
                        No Screens Added
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>



            </div>

        </div>

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    Properties
                </div>

                <div class="card-body">

                    <div id="property-panel">

                        @include(
                        'formbuilder::builder.partials.screen',
                        ['screen'=>$selectedScreen]
                        )

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('formbuilder::builder.modals.add-screen')

@include('formbuilder::builder.modals.add-section')

@include('formbuilder::builder.modals.add-field')

@include('formbuilder::builder.modals.json-preview')

<script>
$(function(){

 initSortable();
 
});



</script>
@endsection