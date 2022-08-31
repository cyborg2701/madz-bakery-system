@extends('layouts.admin')
<style>
    #purchases, #purchIcon {
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
                    <a class="nav-link" href="{{'expense'}}">Expenses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{'expenditures'}}">Expenditures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">Accounts Payable</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4 text-right">
            <!-- Button trigger modal -->
            <a href="javascript:void(0)" class="btn btn-primary" btn-sm id="addProduct">Add Payable</a>
        </div>
    </div>
    
    <div class="mt-2">
        <table class="table table-bordered data-table nowrap" style="width:100%">
            <thead>
                <tr class="table-primary">
                <td class="text-center">No.</td>
                <td class="text-center">Date</td>
                <td class="text-center">Amount</td>
                <td class="text-center">Name</td>
                <td class="text-center">Desciption</td>
                <td class="text-center">Status</td>
                <td class="text-center">Remarks</td>

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
                <h5 class="modal-title" id="addModalLabel">Account Payable Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="payableForm" name="payableForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="label" class="col-sm-2 col-form-label">Description:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-right" name="label" id="label" placeholder="e.g. Utang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-right" name="name" id="name" placeholder="e.g. Michael">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control text-right" name="amount" id="amount" placeholder="0.00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="status" name="status" >
                                <option value="Pending" selected>Pending</option>
                                <option value="Paid">Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="remarks" class="col-sm-2 col-form-label">Remarks:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-right" name="remarks" id="remarks" placeholder="Optional">
                        </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="savedata" name="savedata">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
        ajax: "{{ url('admin/payable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'created_at', name: 'created_at'},
            {data: 'amount', name: 'amount', class:'text-right', render: $.fn.dataTable.render.number(',', '.', 2, '')},
            {data: 'label', name: 'label', class:'text-capitalize'},
            {data: 'name', name: 'name', class:'text-capitalize'},
            {data: 'status', name: 'status', class:'text-muted, font-weight-lighter'},
            {data: 'remarks', name: 'remarks', class:'text-muted, font-weight-lighter'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class:'text-center'},
        ],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                columns: ':not(:last-child)',
                     }
            },
            {
                extend: 'spacer',
                style: ''
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'spacer',
                style: ''
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },

        ]
    });
    // show add modal
    
    // SHOW ADD MODAL
    $('#addProduct').click(function () {
        $('#id').val('');
        $('#payableForm').trigger("reset");
        $('#addModal').modal('show');
        $('#savedata').html('Save');
        $('#error').html('');
    });

    // add function
    $('#savedata').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#payableForm').serialize(),
            url: "{{ url('admin/payable/store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#payableForm').trigger("reset");
                $('#addModal').modal('hide');
                table.draw();
                toastr.success('Payable saved successfully','Success');
            },
            error: function (data) {
                console.log('Error:', data);
                toastr.error(data['responseJSON']['message'],'Error has occured');
            }
        });
    });


      // EDIT
      $('body').on('click', '.editPayable', function () {
            $('#savedata').html('Update');
            var id = $(this).data('id');
            $.ajax({
                type:"GET",
                url: "{{ url('admin/payable/edit') }}",
                data: { id: id },
                dataType: 'json',
                success: function(data){
                    $('#addModal').modal('show');
                    $('#id').val(data.id);
                    $('#label').val(data.label);
                    $('#name').val(data.name);
                    $('#amount').val(data.amount);
                    $('#status').prop('selected', true).val(data.status);
                    $('#remarks').val(data.remarks);
                }
            });
        });

    // DELETE 
    $('body').on('click', '.deletePayable', function () {
      var id = $(this).data("id");
        if (confirm("Are You sure want to delete this payable?") === true) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/payable/destroy') }}",
                data:{
                  id:id
                },
                success: function (data) {
                  table.draw();
                  toastr.success('Payable deleted successfully','Success');
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