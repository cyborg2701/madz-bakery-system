@extends('layouts.admin')
<style>
    #transactions, #transIcon {
        font-weight: 700;
        color: white;
        font-style: italic;
    }
</style>
@section('main-content')


    <div class="mt-2">
        <table class="table table-bordered data-table nowrap" style="width:100%">
            <thead>
                <tr class="table-primary">
                <td class="text-center">No.</td>
                <td class="text-center">Date</td>
                <td class="text-center">Amount</td>
                </tr>
            </thead>
            <tbody></tbody>
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
        ajax: "{{ url('admin/transactions') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'created_at', name: 'created_at'},
            {data: 'total', name: 'total', class:'text-right', render: $.fn.dataTable.render.number(',', '.', 2, '')}

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