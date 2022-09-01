@extends('layouts.admin')
<style>
    #sales, #salesIcon {
        font-weight: 700;
        color: white;
        font-style: italic;
    }
</style>
@section('main-content')
    <div class="row">
        <div class="col-md-8">
            <ul class="nav  nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active">Daily Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.sales.weekly')}}">Weekly Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.sales.monthly')}}">Monthly Sales</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mt-2">
        <table class="table table-bordered data-table nowrap" style="width:100%">
            <thead>
                <tr class="table-primary">
                <td class="text-center">No.</td>
                <td class="text-center">Date</td>
                <td class="text-center">Sales /Revenue</td>
                <td class="text-center">Expenses</td>
                <td class="text-center">Net Profit</td>
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
        select: true,
        ajax: "{{ url('admin/sales') }}",
        responsive: {
            details: {
                type: 'column'
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'created_at', name: 'created_at', class:'text-left'},  
            {data: 'dailySales', name: 'dailySales', class:'text-left', render: $.fn.dataTable.render.number(',', '.', 2, '')},  
            {data: 'dailyExpenses', name: 'dailyExpenses', class:'text-left', render: $.fn.dataTable.render.number(',', '.', 2, '')},  
            {data: null, class: 'text-right',  render: function(data, type, row){
                return parseFloat(row.dailySales - row.dailyExpenses).toFixed(2)}
            },
        ],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'spacer',
                style: '',
                text: 'Export files'
            },
            'spacer',
            'csv',
            'spacer',
            'pdf',
            'spacer',
            'print'
        ]
    });
});

</script>
@endsection