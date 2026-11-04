<h4>Field Configuration</h4>
<hr>
<input type="hidden" id="field_id" value="{{ $field->id }}">

<div class="row">

    <div class="col-md-6">

        <label>Label</label>

        <input type="text" id="edit_field_label" value="{{ $field->label }}" class="form-control">

        <small id="error_edit_field_label" class="text-danger d-none"></small>

    </div>

    <div class="col-md-6">

        <label>Field Name</label>

        <input type="text" id="edit_field_name" value="{{ $field->field_name }}" class="form-control">

    </div>

</div>

<div class="row mt-3">

    <div class="col-md-4">

        <label>Field Type</label>

        <select id="edit_field_type" class="form-select">

            <option value="text" {{ $field->field_type=='text'?'selected':'' }}>Text</option>
            <option value="textarea" {{ $field->field_type=='textarea'?'selected':'' }}>Textarea</option>
            <option value="number" {{ $field->field_type=='number'?'selected':'' }}>Number</option>
            <option value="email" {{ $field->field_type=='email'?'selected':'' }}>Email</option>
            <option value="date" {{ $field->field_type=='date'?'selected':'' }}>Date</option>
            <option value="select" {{ $field->field_type=='select'?'selected':'' }}>Select</option>
            <option value="radio" {{ $field->field_type=='radio'?'selected':'' }}>Radio</option>
            <option value="checkbox" {{ $field->field_type=='checkbox'?'selected':'' }}>Checkbox</option>
            <option value="file" {{ $field->field_type=='file'?'selected':'' }}>File</option>

        </select>

    </div>


    <div class="col-md-4">

        <label>Placeholder</label>

        <input type="text" id="edit_placeholder" value="{{ $field->placeholder }}" class="form-control">

    </div>

    <div class="col-md-4">

        <label>Default Value</label>

        <input type="text" id="edit_default_value" value="{{ $field->default_value }}" class="form-control">

    </div>

</div>

<div class="row mt-3">

    <div class="col-md-4">

        <label>Column Width</label>

        <select id="edit_column_width" class="form-select">

            @for($i = 1; $i <= 12; $i++) <option value="{{ $i }}" {{ $field->column_width == $i ? 'selected' : '' }}>

                {{ $i }}

                </option>

                @endfor

        </select>

    </div>

    <div class="col-md-4">

        <label>Context</label>

        <select id="edit_context" class="form-select">

            <option value="both" {{ $field->context == 'both' ? 'selected' : '' }}>
                Both
            </option>

            <option value="admin" {{ $field->context == 'admin' ? 'selected' : '' }}>
                Admin
            </option>

            <option value="customer" {{ $field->context == 'customer' ? 'selected' : '' }}>
                Customer
            </option>

        </select>

    </div>

    <div class="col-md-4">

        <label>CSS Class</label>

        <input type="text" id="edit_css_class" class="form-control" value="{{ $field->css_class }}">

    </div>

</div>

<div class="mt-3">

    <label>Help Text</label>

    <textarea id="help_text" class="form-control">{{ $field->help_text }}</textarea>

</div>

<div class="row mt-3">

    <div class="col-md-3">
        <label>Min Length</label>
        <input type="number" id="edit_min_length" value="{{ $field->min_length }}" class="form-control">
    </div>

    <div class="col-md-3">
        <label>Max Length</label>
        <input type="number" id="max_length" value="{{ $field->max_length }}" class="form-control">
    </div>

    <div class="col-md-3">
        <label>Min Value</label>
        <input type="number" id="edit_min_value" value="{{ $field->min_value }}" class="form-control">
    </div>

    <div class="col-md-3">
        <label>Max Value</label>
        <input type="number" id="edit_max_value" value="{{ $field->max_value }}" class="form-control">
    </div>
</div>

<div class="mt-3">
    <label>Validation Rules</label>
    <input type="text" id="edit_validation_rules" value="{{ $field->validation_rules }}" class="form-control">
</div>

<div class="row mt-3">

    <div class="col-md-6">

        <label>Regex Pattern</label>

        <input type="text" id="edit_pattern" class="form-control" value="{{ $field->pattern }}" placeholder="^[A-Za-z ]+$">

    </div>

    <div class="col-md-6">

        <label>Tooltip</label>

        <input type="text" id="edit_tooltip" class="form-control" value="{{ $field->tooltip }}">

    </div>

</div>

<div class="mt-3">
    <label>Options</label>
    <textarea id="edit_options" class="form-control">{{ $field->options }}</textarea>
</div>



<div class="row mt-3">

    <div class="col-md-3">
        <div class="form-check">
            <input type="checkbox" id="edit_required" class="form-check-input" {{ $field->required ? 'checked' : '' }}>
            <label class="form-check-label">
                Required
            </label>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-check">
            <input type="checkbox" id="edit_is_readonly" class="form-check-input" {{ $field->is_readonly ? 'checked' : '' }}>
            <label class="form-check-label">
                Readonly
            </label>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-check">
            <input type="checkbox" id="edit_is_hidden" class="form-check-input" {{ $field->is_hidden ? 'checked' : '' }}>
            <label class="form-check-label">
                Hidden
            </label>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-check">
            <input type="checkbox" id="edit_is_active" class="form-check-input" {{ $field->is_active ? 'checked' : '' }}>
            <label class="form-check-label">
                Active
            </label>
        </div>
    </div>

</div>

<div class="mt-4">

    <button id="updateFieldBtn" class="btn btn-primary">
        Save Changes
    </button>

    <button id="deleteFieldBtn" class="btn btn-danger">
        Delete Field
    </button>

</div>
