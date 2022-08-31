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
                    <a class="nav-link" href="{{route('admin.sales.daily')}}">Daily Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">Weekly Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.sales.monthly')}}">Monthly Sales</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4 text-right">
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
        ajax: "{{ url('admin/sales/weekly') }}",
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