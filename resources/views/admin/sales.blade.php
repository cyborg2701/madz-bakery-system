@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-2 text-gray-800" hidden>{{ __('Cash Out') }}</h1>
    <div class="mt-2">
        <table class="table table-bordered data-table nowrap" style="width:100%">
            <thead>
                <tr class="table-primary">
                <td class="text-center">No.</td>
                <td class="text-center">Cashout Total</td>
                <td class="text-center">Expenses Total</td>
                <td class="text-center">Daily Sales</td>
                <td class="text-center">Cash Daily</td>
                <td class="text-center">Net Daily</td>
                {{-- <td class="text-center">Expenditure</td> --}}
                <td class="text-center">Date</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    {{-- add modal --}}

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Cashout Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cashoutForm" name="cashoutForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                      <label for="cashoutName" class="col-sm-2 col-form-label">Name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control text-right" name="cashoutName" id="cashoutName" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-sm-2 col-form-label">Amount:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control text-right" name="amount" id="amount" placeholder="250">
                        </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="savedata" name="savedata">Save Cashout</button>
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
        ajax: "{{ url('admin/sales') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'cashoutDaily', name: 'cashoutDaily', class:'text-left', render: $.fn.dataTable.render.number(',', '.', 2, '')},  
            {data: 'expenseTotal', name: 'expenseTotal', class:'text-left', render: $.fn.dataTable.render.number(',', '.', 2, '')},  
            {data: 'salesDaily', name: 'salesDaily', class:'text-left', render: $.fn.dataTable.render.number(',', '.', 2, '')},  
            {data: 'cash', name: 'cash', class:'text-left', render: $.fn.dataTable.render.number(',', '.', 2, '')},  
            {data: 'incomeToday', name: 'incomeToday', class:'text-left', render: $.fn.dataTable.render.number(',', '.', 2, '')},  
            // {data: null, render: function(data, type, row){
            //     return parseFloat(row.incomeToday - row.cashoutDaily).toFixed(2) }
            // },
            {data: 'created_at', name: 'created_at', class:'text-capitalize'},
        ],
        
    });
   


    // SHOW ADD MODAL
    $('#addCashout').click(function () {
        $('#id').val('');
        $('#cashoutForm').trigger("reset");
        $('#addModal').modal('show');
        $('#error').html('');
    });

    // add function
    $('#savedata').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#cashoutForm').serialize(),
            url: "{{ url('admin/cashouts/store') }}",
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


    // DELETE 
    $('body').on('click', '.deleteCashout', function () {
      var id = $(this).data("id");
        if (confirm("Are You sure want to delete this product?") === true) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/cashouts/destroy') }}",
                data:{
                  id:id
                },
                success: function (data) {
                  table.draw();
                  toastr.success('Cashout deleted successfully','Success');
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