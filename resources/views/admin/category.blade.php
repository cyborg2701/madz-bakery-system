@extends('layouts.admin')
<style>
    #products, #prodIcon {
        font-weight: 700;
        color: white;
        font-style: italic;
    }
</style>
@section('main-content')
    <div class="row">
        <div class="col-md-8">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link" href="{{'products'}}">Product's List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active">Category's List</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4 text-right">
             <!-- Button trigger modal -->
    <a href="javascript:void(0)" class="btn btn-primary" btn-sm id="addProduct">Add Category</a>
        </div>
    </div>
    <div class="mt-2">
        <table class="table table-bordered data-table nowrap" style="width:100%">
            <thead>
                <tr class="table-primary">
                <td class="text-center">No.</td>
                <td class="text-center">Category ID</td>
                <td class="text-center">Category Name</td>
                <td>Action</td>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    {{-- add modal --}}

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Category Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="categoryForm" name="categoryForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                      <label for="categoryId" class="col-sm-2 col-form-label">Category ID:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control text-right" name="categoryId" id="categoryId" placeholder="001">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="categoryName" class="col-sm-2 col-form-label">Category Name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-right" name="categoryName" id="categoryName" placeholder="Bread">
                        </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="savedata" name="savedata">Save Category</button>
            </div>
            </div>
        </div>
        </div>


{{-- Jquery --}}
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script>

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    toastr.options = {
                "debug": false,
                "newestOnTop": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "showDuration": "300",
                "hideDuration": "500",
                "timeOut": "3000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
    // load table
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        select: true,
        ajax: "{{ url('admin/category') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'categoryId', name: 'categoryId', class:'text-left'},
            {data: 'categoryName', name: 'categoryName', class:'text-capitalize'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class:'text-center'},
        ]
    });

    
    // SHOW ADD MODAL
    $('#addProduct').click(function () {
        $('#id').val('');
        $('#categoryForm').trigger("reset");
        $('#addModal').modal('show');
        $('#error').html('');
    });

    // add function
    $('#savedata').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#categoryForm').serialize(),
            url: "{{ url('admin/category/store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#categoryForm').trigger("reset");
                $('#addModal').modal('hide');
                table.draw();
                toastr.success('Category saved successfully','Success');
            },
            error: function (data) {
                console.log('Error:', data);
                toastr.error(data['responseJSON']['message'],'Error has occured');
            }
        });
    });


    // DELETE 
    $('body').on('click', '.deleteProduct', function () {
      var id = $(this).data("id");
        if (confirm("Are You sure want to delete this product?") === true) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/destroy') }}",
                data:{
                  id:id
                },
                success: function (data) {
                  table.draw();
                  toastr.success('Product deleted successfully','Success');
                },
                error: function (data) {
                  toastr.error(data['responseJSON']['message'],'Error has occured');
                }
            });
        }

    });

});

</script>
@endsection