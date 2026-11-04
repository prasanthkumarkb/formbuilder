<div class="modal fade" id="addScreenModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Add Screen
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                

                <div class="mb-3">

                    <label>Screen Name</label>

                    <input type="text" id="add_screen_name" class="form-control">

                    <div id="error_add_screen_name" class="text-danger"></div>

                </div>

                <div class="mb-3">

                    <label>Sort Order</label>

                    <input type="number" id="add_screen_sort_order" value="0" class="form-control">
                    <div id="error_add_screen_sort_order" class="text-danger"></div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>

                <button type="button" id="saveScreenBtn" class="btn btn-primary">
                    Save
                </button>

            </div>

        </div>

    </div>

</div>