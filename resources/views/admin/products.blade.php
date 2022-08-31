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
              <a class="nav-link active">Product's List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{'category'}}">Category's List</a>
            </li>
        </ul>
    </div>
    <div class="col-md-4 text-right">
        <!-- Button trigger modal -->
        <a href="javascript:void(0)" class="btn btn-primary" id="addProduct">Add Product</a>
    </div>
</div>


    <div class="mt-2">
        <table class="table table-bordered data-table nowrap" style="width:100%">
            <thead>
                <tr class="table-primary">
                <td class="text-center">No.</td>
                <td class="text-center">Product Name</td>
                <td class="text-center">Price</td>
                <td class="text-center">Category</td>
                <td>Action</td>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    {{-- add modal --}}

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                      <label for="prodName" class="col-sm-2 col-form-label">Name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control text-right" name="prodName" id="prodName" placeholder="Buko Roll">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="prodPrice" class="col-sm-2 col-form-label">Price:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-right" name="prodPrice" id="prodPrice" placeholder="5.00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prodCategory" class="col-sm-2 col-form-label">Category:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="prodCategory" name="prodCategory" >
                                <option value="">Select Category</option>
                                @foreach ($categories as $item)

                                    <option value="{{$item->categoryName}}">{{$item->categoryName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="savedata" name="savedata">Save Product</button>
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
        ajax: "{{ url('admin/products') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'prodName', name: 'prodName', class:'text-capitalize'},
            {data: 'prodPrice', name: 'prodPrice', class:'text-right'},
            {data: 'prodCategory', name: 'prodCategory', class:'text-right'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class:'text-center'},
        ]
    });
    // show add modal
    
    // SHOW ADD MODAL
    $('#addProduct').click(function () {
        $('#id').val('');
        $('#formProduct').trigger("reset");
        $('#addModal').modal('show');
        $('#error').html('');
    });

    // add function
    $('#savedata').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#productForm').serialize(),
            url: "{{ url('admin/product/store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#productForm').trigger("reset");
                $('#addModal').modal('hide');
                table.draw();
                toastr.success('Product saved successfully','Success');
            },
            error: function (data) {
                console.log('Error:', data);
                toastr.error(data['responseJSON']['message'],'Error has occured');
            }
        });
    });

     // EDIT
     $('body').on('click', '.editProduct', function () {
                $('#savedata').html('Update');
                $('#addModalTitle').html('Edit Employee');
                var id = $(this).data('id');
                $.ajax({
                    type:"GET",
                    url: "{{ url('admin/product/edit') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function(data){
                        $('#modelHeading').html("Edit Product");
                        $('#addModal').modal('show');
                        $('#id').val(data.id);
                        $('#prodName').val(data.prodName);
                        $('#prodPrice').val(data.prodPrice);
                        $('#prodCategory').prop('selected', true).val(data.prodCategory);;
                    }
                });

            });


    // DELETE  
    $('body').on('click', '.deleteProduct', function () {
      var id = $(this).data("id");
        if (confirm("Are You sure want to delete this product?") === true) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/product/destroy') }}",
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