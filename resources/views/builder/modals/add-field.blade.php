<div class="modal fade" id="addFieldModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Add Field
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-6">
                        <label>Screen</label>

                        <select id="add_field_screen_id" class="form-select">

                            <option value="">Select Screen</option>

                            @foreach($form->screens as $screen)

                            <option value="{{ $screen->id }}">
                                {{ $screen->name }}
                            </option>

                            @endforeach

                        </select>
                        <div id="error_add_field_screen_id" class="invalid-feedback d-block"></div>

                    </div>

                    <div class="col-md-6">

                        <label>Section</label>

                        <select id="add_field_section_id" class="form-select">
                            <option value="">Select Section</option>
                        </select>
                         <div id="error_add_field_section_id" class="invalid-feedback d-block"></div>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-md-6">
                        <label>Label</label>

                        <input type="text" id="add_field_label" class="form-control">
                         <div id="error_add_field_label" class="invalid-feedback d-block"></div>
                    </div>

                    <div class="col-md-6">

                        <label>Field Name</label>

                        <input type="text" id="add_field_name" class="form-control">
                         <div id="error_add_field_name" class="invalid-feedback d-block"></div>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-md-4">

                        <label>Field Type</label>

                        <select id="add_field_type" class="form-select">

                            <option value="text">Text</option>
                            <option value="textarea">Textarea</option>
                            <option value="number">Number</option>
                            <option value="email">Email</option>
                            <option value="date">Date</option>
                            <option value="select">Select</option>
                            <option value="radio">Radio</option>
                            <option value="checkbox">Checkbox</option>
                            <option value="file">File</option>

                        </select>

                    </div>

                    <div class="col-md-4">

                        <label>Column Width</label>

                        <select id="add_column_width" class="form-select">

                            @for($i = 1; $i <= 12; $i++) <option value="{{ $i }}">
                                {{ $i }}
                                </option>
                                @endfor

                        </select>

                    </div>

                    <div class="col-md-4">

                        <label>Context</label>

                        <select id="add_context" class="form-select">

                            <option value="both">Both</option>
                            <option value="admin">Admin</option>
                            <option value="customer">Customer</option>

                        </select>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-md-6">

                        <label>Placeholder</label>

                        <input type="text" id="add_placeholder" class="form-control">

                    </div>

                    <div class="col-md-6">

                        <label>Default Value</label>

                        <input type="text" id="add_default_value" class="form-control">

                    </div>

                </div>

                <div class="mt-3">

                    <label>Help Text</label>

                    <textarea id="add_help_text" class="form-control" rows="2"></textarea>

                </div>

                <div class="row mt-3">

                    <div class="col-md-3">

                        <label>Min Length</label>

                        <input type="number" id="add_min_length" class="form-control">

                    </div>

                    <div class="col-md-3">

                        <label>Max Length</label>

                        <input type="number" id="add_max_length" class="form-control">

                    </div>

                    <div class="col-md-3">

                        <label>Min Value</label>

                        <input type="number" id="add_min_value" class="form-control">

                    </div>

                    <div class="col-md-3">

                        <label>Max Value</label>

                        <input type="number" id="add_max_value" class="form-control">

                    </div>

                </div>

                <div class="mt-3">

                    <label>Regex Pattern</label>

                    <input type="text" id="add_pattern" class="form-control">

                </div>

                <div class="mt-3">

                    <label>Validation Rules</label>

                    <input type="text" id="add_validation_rules" class="form-control">

                </div>

                <div class="mt-3">

                    <label>Options</label>

                    <textarea id="add_options" class="form-control" rows="3"></textarea>

                </div>

                <div class="mt-3">

                    <label>CSS Class</label>

                    <input type="text" id="add_css_class" class="form-control">

                </div>

                <div class="mt-3">

                    <label>Tooltip</label>

                    <input type="text" id="add_tooltip" class="form-control">

                </div>

                <div class="row mt-3">

                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" id="add_required" class="form-check-input">
                            <label class="form-check-label">
                                Required
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" id="add_is_readonly" class="form-check-input">
                            <label class="form-check-label">
                                Read Only
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" id="add_is_hidden" class="form-check-input">
                            <label class="form-check-label">
                                Hidden
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" checked id="add_is_active" class="form-check-input">
                            <label class="form-check-label">
                                Active
                            </label>
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary" data-bs-dismiss="modal">

                    Cancel

                </button>

                <button id="saveFieldBtn" class="btn btn-primary">

                    Save Field

                </button>

            </div>

        </div>

    </div>

</div>