@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-2 text-gray-800" hidden>{{ __('Employee List') }}</h1>
    <div class="text-right">
    <!-- Button trigger modal -->
        <a href="javascript:void(0)" class="btn btn-primary" btn-sm id="addProduct">Add Product</a>
    </div>
    <div class="mt-2">
        <table class="table table-bordered data-table nowrap" style="width:100%">
            <thead>
                <tr class="table-primary">
                <td class="text-center">No.</td>
                <td class="text-center">Product Name</td>
                <td class="text-center">Price</td>
                <td class="text-center">Quantity</td>
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
                <h5 class="modal-title" id="addModalLabel">Product Information</h5>
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
                        <label for="prod_qty" class="col-sm-2 col-form-label">Quantity:</label>
                        <div class="col-sm-4">
                            <div class="input-group ">
                            <span class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary btn-number" disabled="disabled" data-type="minus" data-field="prodQty">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="prodQty"   class="form-control input-number" value="0" min="1" max="50">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary btn-number" data-type="plus" data-field="prodQty">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </span>
                        </div>
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
            {data: 'prodQty', name: 'prodQty', class:'text-right'},
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
            url: "{{ url('admin/store') }}",
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











        $('.btn-number').click(function(e){
        e.preventDefault();
        
        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {
                
                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                } 
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
        });
        $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {
            
            minValue =  parseInt($(this).attr('min'));
            maxValue =  parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());
            
            name = $(this).attr('name');
            if(valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if(valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }
        });

        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) || 
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });

</script>
@endsection