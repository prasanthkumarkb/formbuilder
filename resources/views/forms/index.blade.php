@extends('formbuilder::layouts.master')
@section('content')
<link rel="stylesheet"
        href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<div class="d-flex justify-content-between mb-3">

    <h3>Forms</h3>

    <a href="/admin/forms/create"
       class="btn btn-primary">

        Create Form

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<table id="formsTable" class="table table-bordered table-striped">

    <thead>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>

    </thead>

</table>



<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>

$(document).ready(function () {

    $('#formsTable').DataTable({

        processing: true,

        serverSide: true,

        ajax: '/admin/forms',

        columns: [

            {data: 'id'},
            {data: 'name'},
            {data: 'slug'},
            {data: 'created_at'},
            {
                data: 'actions',
                orderable: false,
                searchable: false
            }

        ]

    });

});


$(document).on('click', '.delete-form', function () {

    let id = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'This form will be deleted.',
        icon: 'warning',
        showCancelButton: true
    }).then((result) => {

        if (!result.isConfirmed) {
            return;
        }

        $.ajax({
            url: '/admin/forms/' + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN':
                    $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {

                $('#formsTable')
                    .DataTable()
                    .ajax
                    .reload();

                Swal.fire(
                    'Deleted!',
                    'Form deleted successfully.',
                    'success'
                );
            }
        });

    });

});
</script>

@endsection