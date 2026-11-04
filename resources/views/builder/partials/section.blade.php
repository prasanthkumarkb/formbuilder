<h4>Section Configuration</h4>
<hr>
<input type="hidden" id="section_id" value="{{ $section->id }}">

<div class="row">

    <div class="col-md-6">

        <label>Code</label>

        <input type="text" class="form-control" id="edit_section_code" value="{{ $section->code }}">
        <div id="error_edit_section_code" class="text-danger"></div>

    </div>

    <div class="col-md-6">

        <label>Name</label>

        <input type="text" class="form-control" id="edit_section_name" value="{{ $section->name }}">
        <div id="error_edit_section_name" class="text-danger"></div>

    </div>

     <div class="col-md-6 mt-3">


        <button id="updateSectionBtn" class="btn btn-success">
            Save Changes
        </button>

        <button id="deleteSectionBtn" class="btn btn-danger">
            Delete Section
        </button>
    </div>

</div>

<script>
$(document).ready(function() {

   $('#saveSectionBtn').click(function(){

    $.ajax({

        url:'/admin/forms/sections/'
            + $('#section_id').val(),

        method:'PUT',

        data:{

            _token: '{{ csrf_token() }}',

            code:
              $('#section_code').val(),

            name:
              $('#section_name').val()
        },

        success:function(){

            location.reload();

        }
    });

});

   $('#deleteSectionBtn').click(function(){

    $.ajax({

        url:'/admin/forms/sections/'
            + $('#section_id').val(),

        method:'DELETE',

        data:{

            _token:csrfToken
        },

        success:function(){

            location.reload();

        }
    });

});

}); 

</script>