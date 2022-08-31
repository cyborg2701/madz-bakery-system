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
                    <a class="nav-link active">Expenditures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{'payable'}}">Accounts Payable</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4 text-right">
            <!-- Button trigger modal -->
            <a href="javascript:void(0)" class="btn btn-primary" btn-sm id="addProduct">Add Expenditure</a>
        </div>
    </div>
    
    <div class="mt-2">
        <table class="table table-bordered data-table nowrap" style="width:100%">
            <thead>
                <tr class="table-primary">
                <td class="text-center">No.</td>
                <td class="text-center">Date</td>
                <td class="text-center">Amount</td>
                <td class="text-center">Description</td>
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
                <h5 class="modal-title" id="addModalLabel">Expenditure Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="expenditureForm" name="expenditureForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="expenditureType" class="col-sm-4 col-form-label">Type:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control text-right" name="expenditureType" id="expenditureType" placeholder="e.g. Bills and Payments">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expenditureDescription" class="col-sm-4 col-form-label">Item / Description:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control text-right" name="expenditureDescription" id="expenditureDescription" placeholder="e.g. Ulam">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expenditureAmount" class="col-sm-4 col-form-label">Amount</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control text-right" name="expenditureAmount" id="expenditureAmount" placeholder="0.00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expenditureDate" class="col-sm-4 col-form-label">Date</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control text-right" name="expenditureDate" id="expenditureDate"  placeholder="2022-08-24">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expenditureRemarks" class="col-sm-4 col-form-label">Remarks:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control text-right" name="expenditureRemarks" id="expenditureRemarks" placeholder="Optional">
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
        ajax: "{{ url('admin/expenditures') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'created', name: 'created'},
            {data: 'expenditureAmount', name: 'expenditureAmount', class:'text-right', render: $.fn.dataTable.render.number(',', '.', 2, '')},
            {data: 'expenditureDescription', name: 'expenditureDescription', class:'text-capitalize, text-center'},
            {data: 'expenditureType', name: 'expenditureType', class:'text-capitalize, text-center'},
            {data: 'expenditureRemarks', name: 'expenditureRemarks', class:'text-capitalize'},
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
        $('#expenditureForm').trigger("reset");
        $('#addModal').modal('show');
        $('#savedata').html('Save');
        $('#error').html('');
    });

    // add function
    $('#savedata').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#expenditureForm').serialize(),
            url: "{{ url('admin/expenditures/store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#expenditureForm').trigger("reset");
                $('#addModal').modal('hide');
                table.draw();
                toastr.success('Expenditure saved successfully','Success');
            },
            error: function (data) {
                console.log('Error:', data);
                toastr.error(data['responseJSON']['message'],'Error has occured');
            }
        });
    });


      // EDIT
      $('body').on('click', '.editExpenditure', function () {
            $('#savedata').html('Update');
            var id = $(this).data('id');
            $.ajax({
                type:"GET",
                url: "{{ url('admin/expenditures/edit') }}",
                data: { id: id },
                dataType: 'json',
                success: function(data){
                    $('#addModal').modal('show');
                    $('#id').val(data.id);
                    $('#expenditureType').val(data.expenditureType);
                    $('#expenditureDescription').val(data.expenditureDescription);
                    $('#expenditureAmount').val(data.expenditureAmount);
                    $('#expenditureDate').val(data.created);
                    $('#expenditureRemarks').val(data.expenditureRemarks);
                }
            });
        });

    // DELETE 
    $('body').on('click', '.deleteExpenditure', function () {
      var id = $(this).data("id");
        if (confirm("Are You sure want to delete this expenditure?") === true) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/expenditures/destroy') }}",
                data:{
                  id:id
                },
                success: function (data) {
                  table.draw();
                  toastr.success('Expenditure deleted successfully','Success');
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