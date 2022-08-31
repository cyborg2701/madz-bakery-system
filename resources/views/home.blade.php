@extends('layouts.app')

@section('content')
<form action="" id="transactionForm" name="transactionForm" enctype="multipart/form-data">
<div class="d-flex justify-content-center mb-2">
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-prepend">
                <button type="button" class="btn btn-info" id="btnTotal">
                    TOTAL
                </button>
            </span>
            
                <input type="text" name="total" id="total" class="form-control form-control-lg  text-right" readonly>
          
            <span class="input-group-prepend">
                <button id="saveTransaction" name="saveTransaction" type="button" class="btn btn-primary btn-lg ml-2">Save</button>
            </span>
        </div>
    </div>
</div>
{{-- accordion 1 --}}


    <input type="hidden" name="transactionId" id="transactionId">

    {{-- value for 6 peso --}}
    <input type="hidden" name="price[]" value="2.50" id="price1">
    <input type="hidden" name="price[]" value="6" id="price2">
    <input type="hidden" name="price[]" value="10" id="price3">
    <input type="hidden" name="price[]" value="20" id="price4">
    <input type="hidden" name="price[]" value="22" id="price5">
    <input type="hidden" name="price[]" value="24" id="price6">
    <input type="hidden" name="price[]" value="40" id="price7">
    <input type="hidden" name="price[]" value="45" id="price8">
    <input type="hidden" name="price[]" value="55" id="price9">
    <input type="hidden" name="price[]" value="55" id="price10">
    {{-- <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(4)}}" id="price10">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(16)}}" id="price11">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(14)}}" id="price12">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(15)}}" id="price13">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(13)}}" id="price14">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(26)}}" id="price15">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(27)}}" id="price16">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(28)}}" id="price17">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(29)}}" id="price18">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(25)}}" id="price19">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(22)}}" id="price20">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(19)}}" id="price21">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(21)}}" id="price22">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(17)}}" id="price23">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(18)}}" id="price24">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(23)}}" id="price25">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(24)}}" id="price26">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(20)}}" id="price27"> --}}
    
   

    <div class="d-flex justify-content-center">
        {{-- ASSORTED BREAD CATEGORY --}}
        <div class="col-md-6">
            <div class="input-group">
                {{-- discount title --}}
                <span class="input-group-prepend">
                    <input type="button"  class="form-control text-left btn-success m-1" value="Price" disabled>
                </span>
                {{-- quantity textbox --}}
                <input type="button"  class="form-control text-center btn-success m-1" value="Quantity" disabled>
                {{-- subtotal textbox --}}
                <input type="button"  class="form-control text-left btn-success m-1" value="Subtotal" disabled>
            </div>
            <input type="number" id="manualInput"  class="form-control form-control-lg text-center m-1 num" value="0" >
            {{-- 2.50 --}}
            <div class="input-group">
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty1"  class="form-control form-control-lg text-center m-1" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right m-1 num" id="subTotal1" value="0.00" name="subtotal[]" readonly>
                                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary m-1">
                        2.50
                    </button>
                </span>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete m-1" id="trash1">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="minus1">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="plus1">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            {{-- 6.00 --}}
            <div class="input-group">
                <div class="input-group">
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty2"  class="form-control form-control-lg text-center m-1" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right m-1 num" id="subTotal2" value="0.00" name="subtotal[]" readonly>
                                        {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary m-1">
                           6.00
                        </button>
                    </span>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete m-1" id="trash2">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="minus2">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="plus2">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

             {{-- 10.00 --}}
             <div class="input-group">
                <div class="input-group">
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty3"  class="form-control form-control-lg text-center m-1" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right m-1 num" id="subTotal3" value="0.00" name="subtotal[]" readonly>
                                        {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary m-1">
                           10
                        </button>
                    </span>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete m-1" id="trash3">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="minus3">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="plus3">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            <div class="input-group">
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty4"  class="form-control form-control-lg text-center m-1" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right m-1 num" id="subTotal4" value="0.00" name="subtotal[]" readonly>
                                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary m-1">
                        20
                    </button>
                </span>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete m-1" id="trash4">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="minus4">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="plus4">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            <div class="input-group">
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty5"  class="form-control form-control-lg text-center m-1" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right m-1 num" id="subTotal5" value="0.00" name="subtotal[]" readonly>
                                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary m-1">
                        22
                    </button>
                </span>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete m-1" id="trash5">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="minus5">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="plus5">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            <div class="input-group">
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty6"  class="form-control form-control-lg text-center m-1" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right m-1 num" id="subTotal6" value="0.00" name="subtotal[]" readonly>
                                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary m-1">
                       24
                    </button>
                </span>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete m-1" id="trash6">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="minus6">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="plus6">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            <div class="input-group">
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty7"  class="form-control form-control-lg text-center m-1" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right m-1 num" id="subTotal7" value="0.00" name="subtotal[]" readonly>
                                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary m-1">
                       40
                    </button>
                </span>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete m-1" id="trash7">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="minus7">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="plus7">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            <div class="input-group">
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty8"  class="form-control form-control-lg text-center m-1" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right m-1 num" id="subTotal8" value="0.00" name="subtotal[]" readonly>
                                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary m-1">
                        45
                    </button>
                </span>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete m-1" id="trash8">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="minus8">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="plus8">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            <div class="input-group">
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty9"  class="form-control form-control-lg text-center m-1" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right m-1 num" id="subTotal9" value="0.00" name="subtotal[]" readonly>
                                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary m-1">
                        55
                    </button>
                </span>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete m-1" id="trash9">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="minus9">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="plus9">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            <div class="input-group">
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty10"  class="form-control form-control-lg text-center m-1" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right m-1 num" id="subTotal10" value="0.00" name="subtotal[]" readonly>
                                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary m-1">
                        100
                    </button>
                </span>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete m-1" id="trash10">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="minus10">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number m-1" id="plus10">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
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
        var x = 1;
        var y = parseInt($('#lastTrans').val());
        $('#saveTransaction').click(function(e){

            e.preventDefault();
            if(confirm('Save transaction?') === true)
            {
                $('#transactionId').val(y+=x);
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
