<div class="modal fade" id="addSectionModal" data-bs-backdrop="static" data-bs-keyboard="false">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Add Section
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <select id="add_section_screen_id" class="form-control">

                    @foreach($form->screens as $screen)

                    <option value="{{ $screen->id }}">
                        {{ $screen->name }}
                    </option>

                    @endforeach

                </select>
                <div id="error_add_section_screen_id" class="text-danger"></div>

                <input type="text" id="add_section_code" class="form-control mt-2" placeholder="Section Code">

                <div id="error_add_section_code" class="text-danger"></div>

                <input type="text" id="add_section_name" class="form-control mt-2" placeholder="Section Name">
                <div id="error_add_section_name" class="text-danger"></div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>

                <button id="saveSectionBtn" class="btn btn-success">
                    Save
                </button>

            </div>

        </div>

    </div>
</div>