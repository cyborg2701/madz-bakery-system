@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-2 text-gray-800" hidden>{{ __('Category List') }}</h1>
    <div class="text-right">
    <!-- Button trigger modal -->
        <a href="javascript:void(0)" class="btn btn-primary" btn-sm id="addProduct">Add Cash</a>
    </div>
    <div class="mt-2">
        <table class="table table-bordered data-table nowrap" style="width:100%">
            <thead>
                <tr class="table-primary">
                <td class="text-center">No.</td>
                <td class="text-center">Amount</td>
                <td class="text-center">Date</td>
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
                <h5 class="modal-title" id="addModalLabel">Add Cash</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cashForm" name="cashForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                      <label for="cashToday" class="col-sm-2 col-form-label">Name:</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control text-right" name="cashToday" id="cashToday" placeholder="0.00">
                      </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="savedata" name="savedata">Save</button>
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
        ajax: "{{ url('admin/cash') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'cashToday', name: 'cashToday', class:'text-left'},
            {data: 'created_at', name: 'created_at', class:'text-capitalize'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class:'text-center'},
        ]
    });
    // show add modal
    
    // SHOW ADD MODAL
    $('#addProduct').click(function () {
        $('#id').val('');
        $('#cashForm').trigger("reset");
        $('#addModal').modal('show');
        $('#error').html('');
    });

    // add function
    $('#savedata').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#cashForm').serialize(),
            url: "{{ url('admin/cash/store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#cashForm').trigger("reset");
                $('#addModal').modal('hide');
                table.draw();
                toastr.success('Cash saved successfully','Success');
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
                $('#addModalLabel').html('Edit Expenditure');
                var id = $(this).data('id');
                $.ajax({
                    type:"GET",
                    url: "{{ url('admin/cash/edit') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function(data){
                        $('#modelHeading').html("Edit Product");
                        $('#addModal').modal('show');
                        $('#id').val(data.id);
                        $('#expenditureName').val(data.expenditureName);
                        $('#expenditureAmount').val(data.expenditureAmount);
                        $('#expenditureADate').val(data.expenditureADate);

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