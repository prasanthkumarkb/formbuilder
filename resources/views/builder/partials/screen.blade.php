@if($screen)

<h4>Screen Configuration</h4>
<hr>

<input type="hidden" id="screen_id" value="{{ $screen->id }}">

<div class="row">

    <div class="col-md-6">

        <label>Screen Name</label>

        <input type="text" name="name" id="edit_screen_name" class="form-control" value="{{ $screen->name }}">
        <div id="error_edit_screen_name" class="text-danger"></div>

    </div>

    <div class="col-md-6">

        <label>Sort Order</label>

        <input type="number" name="sort_order" id="edit_screen_sort_order" class="form-control" value="{{ $screen->sort_order }}">
        <div id="error_edit_screen_sort_order" class="text-danger"></div>

    </div>
    <div class="col-md-6 mt-3">


        <button id="updateScreenBtn" class="btn btn-success">
            Update Screen
        </button>

        <button id="deleteScreenBtn" class="btn btn-danger">
            Delete Screen
        </button>
    </div>


</div>

@else

<div class="text-center py-5">

    <h5 class="text-muted">
        No Screen Selected
    </h5>

</div>

@endif
