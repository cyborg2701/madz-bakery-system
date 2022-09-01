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
                    <a class="nav-link active">Expenses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{'expenditures'}}">Expenditures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{'payable'}}">Accounts Payable</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4 text-right">
            <!-- Button trigger modal -->
            <a href="javascript:void(0)" class="btn btn-primary" btn-sm id="addCashout">Add Expense</a>
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
                <td class="text-center">Type</td>
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
                <h5 class="modal-title" id="addModalLabel">Expense Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cashoutForm" name="cashoutForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" id="created">
                    <div class="form-group row">
                        <label for="expenseType" class="col-sm-2 col-form-label">Type:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-right" name="expenseType" id="expenseType" placeholder="Salary">
                        </div>
                      </div>
                    <div class="form-group row">
                      <label for="expenseName" class="col-sm-2 col-form-label">Name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control text-right" name="expenseName" id="expenseName" placeholder="e.g. Michael">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="expenseAmount" class="col-sm-2 col-form-label">Amount:</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control text-right" name="expenseAmount" id="expenseAmount" placeholder="250.00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expenseRemarks" class="col-sm-2 col-form-label">Remarks:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-right" name="expenseRemarks" id="expenseRemarks" placeholder="Optional">
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
        select: true,
        ajax: "{{ url('admin/expense') }}",
        responsive: {
            details: {
                type: 'column'
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'created', name: 'created_at'},
            {data: 'expenseAmount', name: 'expenseAmount', class:'text-right', render: $.fn.dataTable.render.number(',', '.', 2, '')},
            {data: 'expenseName', name: 'expenseName', class:'text-capitalize'},
            {data: 'expenseType', name: 'expenseType', class:'text-capitalize, text-center'},
            {data: 'expenseRemarks', name: 'expenseRemarks', class:'text-capitalize, text-muted'},

            // , render: $.fn.dataTable.render.moment( 'dddd D MMMM YYYY' )
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
    $('#addCashout').click(function () {
        $('#id').val('');
        $('#cashoutForm').trigger("reset");
        $('#addModal').modal('show');
        $('#savedata').html('Save');
        $('#error').html('');
    });

    // add function
    $('#savedata').click(function (e) {
        e.preventDefault();

        $.ajax({
            data: $('#cashoutForm').serialize(),
            url: "{{ url('admin/expense/store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#cashoutForm').trigger("reset");
                $('#addModal').modal('hide');
                table.draw();
                toastr.success('Cashout saved successfully','Success');
            },
            error: function (data) {
                console.log('Error:', data);
                toastr.error(data['responseJSON']['message'],'Error has occured');
            }
        });
    });

    // EDIT
    $('body').on('click', '.editCashout', function () {
        $('#savedata').html('Update');
        var id = $(this).data('id');
        $.ajax({
            type:"GET",
             url: "{{ url('admin/expense/edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(data){
                $('#modelHeading').html("Edit Product");
                $('#addModal').modal('show');
                $('#id').val(data.id);
                $('#expenseType').val(data.expenseType);
                $('#expenseName').val(data.expenseName);
                $('#expenseAmount').val(data.expenseAmount);
                $('#expenseRemarks').val(data.expenseRemarks);
                $('#created').val(data.created_at);
            }
        });
    });



    // DELETE 
    $('body').on('click', '.deleteCashout', function () {
      var id = $(this).data("id");
        if (confirm("Are You sure want to delete this expense?") === true) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/expense/destroy') }}",
                data:{
                  id:id
                },
                success: function (data) {
                  table.draw();
                  toastr.success('Expense deleted successfully','Success');
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