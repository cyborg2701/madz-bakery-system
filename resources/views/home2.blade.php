@extends('layouts.app')

@section('content')
<form action="" id="transactionForm" name="transactionForm" enctype="multipart/form-data">
<div class="d-flex justify-content-center mb-2">
    <div class="col-lg-6">
        <div class="input-group">
            <span class="input-group-prepend">
                <button type="button" class="btn btn-info" id="btnTotal">
                    TOTAL
                </button>
            </span>

                <input type="text" name="total" id="total"  class="form-control form-control-lg text-right" readonly>
            <span class="input-group-prepend">
                <button id="saveTransaction" name="saveTransaction" type="button" class="btn btn-primary btn-lg ml-2" style="width:100%">Save</button>
            </span>

               
        </div>
    </div>
</div>
{{-- accordion 1 --}}

    <div class="d-flex justify-content-center">
        {{-- ASSORTED BREAD CATEGORY --}}
        <div class="col-lg-6">
            {{-- TITLE --}}

            
            <div class="input-group">
                {{-- discount title --}}
                <span class="input-group-prepend">
                    <input type="text"  class="form-control-lg text-left btn btn-success m-1" value="INPUT AMOUNT">
                </span>
                {{-- SRP --}}

                    <input type="number" id="manualInput"  class="form-control form-control-lg text-right num m-1" value="0">

            </div>

        
        </div>
    </div>


</div>
</form>
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

        $('#saveTransaction').click(function(e){

            e.preventDefault();
            if(confirm('Save transaction?') === true)
            {
                $.ajax({
                    data: $('#transactionForm').serialize(),
                    url: "{{ route('saveTransaction') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data){
                        $('#transactionForm').trigger("reset");
                        $('#total').prop('value', 0);
                        toastr.success('Transaction saved successfully','Success');

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        toastr.error(data['responseJSON']['message'],'Error has occured');
                    }
                });
            }
        });
    })
</script>
@endsection
