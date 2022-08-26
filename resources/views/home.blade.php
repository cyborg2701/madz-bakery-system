@extends('layouts.app')

@section('content')
<form action="" id="transactionForm" name="transactionForm" enctype="multipart/form-data">
<div class="d-flex justify-content-center mb-2">
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-prepend">
                <button type="button" class="btn btn-info" id="btnTotal">
                    TOTAL
                </button>
            </span>
            {{-- <input type="text" name="dailyTotal" value="{{$currentSales}}"  class="form-control form-control-lg form-control form-control-lg-lg  text-right" readonly> --}}
                <input type="text" name="total" id="total"  class="form-control form-control-lg form-control form-control-lg-lg  text-right" readonly>
        </div>
    </div>
    <div class="col-md-3">
        <button id="saveTransaction" name="saveTransaction" type="button" class="btn btn-primary btn-lg ml-5 btn-block">Save</button>
    </div>
</div>
{{-- accordion 1 --}}


    <input type="hidden" id="lastTrans" value="{{$lastTransId->transactionId}}">
    <input type="hidden" name="transactionId" id="transactionId">

    {{-- value for 6 peso --}}
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(7)}}" id="price1">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(6)}}" id="price2">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(5)}}" id="price3">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(12)}}" id="price4">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(9)}}" id="price5">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(8)}}" id="price6">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(11)}}" id="price7">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(10)}}" id="price8">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(3)}}" id="price9">
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(4)}}" id="price10">
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
    <input type="hidden" name="price[]" value="{{App\Models\Product::getProdPrice(20)}}" id="price27">
    
   

    <div class="d-flex justify-content-center">
        {{-- ASSORTED BREAD CATEGORY --}}
        <div class="col-lg-4">
            {{-- TITLE --}}
            <span class="badge bg-primary text-white">ASSORTED BREAD</span>
            <div class="input-group">
                {{-- discount title --}}
                <span class="input-group-prepend">
                    <input type="button"  class="form-control text-left btn-success" value="%" disabled>
                </span>
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <input type="button"  class="form-control text-left btn-success" value="Price" disabled>
                </span>
                {{-- quantity textbox --}}
                <input type="button"  class="form-control text-center btn-success" value="Quantity" disabled>
                {{-- subtotal textbox --}}
                <input type="button"  class="form-control text-left btn-success" value="Subtotal" disabled>
            </div>

            {{-- 2.50 --}}
            <div class="input-group">
                {{-- discount checkbox --}}
                <span class="input-group-prepend">
                
                    <button type="button" class="btn btn-outline-primary">
                        <input type="checkbox" id="discount1" value="0">
                    </button>
                </span>
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary">
                        {{App\Models\Product::getProdPrice(7)}}
                    </button>
                </span>
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty1"  class="form-control form-control-lg text-center" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right num" id="subTotal1" value="0.00" name="subtotal[]">
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash1">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus1">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus1">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            {{-- 6.00 --}}
            <div class="input-group">
                <div class="input-group">
                    {{-- discount checkbox --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            <input type="checkbox" id="discount2" value="0">
                        </button>
                    </span>
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(6)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty2"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal2" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash2">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus2">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus2">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

             {{-- 10.00 --}}
             <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(5)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty3"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal3" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash3">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus3">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus3">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

        
        </div>

        <div class="col-lg-4">
        {{-- TITLE --}}
        <span class="badge bg-primary text-white">PACKED BUNS</span>
            <div class="input-group">
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <input type="button"  class="form-control form-control-lg text-left btn-success" value="Price" disabled>
                </span>
                {{-- quantity textbox --}}
                <input type="button"  class="form-control form-control-lg text-center btn-success" value="Quantity" disabled>
                {{-- subtotal textbox --}}
                <input type="button"  class="form-control form-control-lg text-left btn-success" value="Subtotal" disabled>
            </div>

        {{-- 2.50 --}}
            <div class="input-group">
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary">
                        {{App\Models\Product::getProdPrice(12)}}
                    </button>
                </span>
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty4"  class="form-control form-control-lg text-center" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right num" id="subTotal4" value="0.00" name="subtotal[]" readonly>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash4">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus4">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus4">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

        {{-- 6.00 --}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(9)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty5"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal5" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash5">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus5">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus5">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

         {{-- 24--}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(8)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty6"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal6" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash6">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus6">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus6">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 
         {{-- 25--}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(11)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty7"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal7" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash7">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus7">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus7">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

         {{-- 30--}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(10)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty8"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal8" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash8">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus8">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus8">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 
        </div>


        <div class="col-lg-4">
            {{-- TITLE --}}
            <span class="badge bg-primary text-white">TASTY BREAD</span>
            <div class="input-group">
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <input type="button"  class="form-control form-control-lg text-left btn-success" value="Price" disabled>
                </span>
                {{-- quantity textbox --}}
                <input type="button"  class="form-control form-control-lg text-center btn-success" value="Quantity" disabled>
                {{-- subtotal textbox --}}
                <input type="button"  class="form-control form-control-lg text-left btn-success" value="Subtotal" disabled>
            </div>

            {{-- 2.50 --}}
            <div class="input-group">
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary">
                        {{App\Models\Product::getProdPrice(3)}}
                    </button>
                </span>
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty9"  class="form-control form-control-lg text-center" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right num" id="subTotal9" value="0.00" name="subtotal[]" readonly>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash9">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus9">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus9">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            {{-- 6.00 --}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(4)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty10"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal10" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash10">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus10">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus10">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>         
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <div class="col-lg-4">
            {{-- TITLE --}}
            <span class="badge bg-primary text-white">PALAMAN</span>
            <div class="input-group">
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <input type="button"  class="form-control form-control-lg text-left btn-success" value="Price" disabled>
                </span>
                {{-- quantity textbox --}}
                <input type="button"  class="form-control form-control-lg text-center btn-success" value="Quantity" disabled>
                {{-- subtotal textbox --}}
                <input type="button"  class="form-control form-control-lg text-left btn-success" value="Subtotal" disabled>
            </div>

            {{-- 2.50 --}}
            <div class="input-group">
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary">
                        {{App\Models\Product::getProdPrice(16)}}
                    </button>
                </span>
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty11"  class="form-control form-control-lg text-center" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right num" id="subTotal11" value="0.00" name="subtotal[]" readonly>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash11">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus11">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus11">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            {{-- 6.00 --}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(14)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty12"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal12" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash12">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus12">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus12">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            {{-- 10.00 --}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(15)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty13"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal13" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash13">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus13">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus13">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(13)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty14"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal14" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash14">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus14">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus14">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

        
        </div>

        <div class="col-lg-4">
            {{-- TITLE --}}
            <span class="badge bg-primary text-white">POWDERED</span>
            <div class="input-group">
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <input type="button"  class="form-control form-control-lg text-left btn-success" value="Price" disabled>
                </span>
                {{-- quantity textbox --}}
                <input type="button"  class="form-control form-control-lg text-center btn-success" value="Quantity" disabled>
                {{-- subtotal textbox --}}
                <input type="button"  class="form-control form-control-lg text-left btn-success" value="Subtotal" disabled>
            </div>

            {{-- 2.50 --}}
            <div class="input-group">
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary">
                        {{App\Models\Product::getProdPrice(26)}}
                    </button>
                </span>
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty15"  class="form-control form-control-lg text-center" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right num" id="subTotal15" value="0.00" name="subtotal[]" readonly>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash15">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus15">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus15">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            {{-- 6.00 --}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(27)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty16"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal16" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash16">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus16">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus16">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            {{-- 10.00 --}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(28)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty17"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal17" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash17">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus17">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus17">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(29)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty18"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal18" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash18">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus18">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus18">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 
        </div>

        <div class="col-lg-4">
            {{-- TITLE --}}
           <span class="badge bg-primary text-white">DRINKS</span>
            <div class="input-group">
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <input type="button"  class="form-control form-control-lg text-left btn-success" value="Price" disabled>
                </span>
                {{-- quantity textbox --}}
                <input type="button"  class="form-control form-control-lg text-center btn-success" value="Quantity" disabled>
                {{-- subtotal textbox --}}
                <input type="button"  class="form-control form-control-lg text-left btn-success" value="Subtotal" disabled>
            </div>

            {{-- 2.50 --}}
            <div class="input-group">
                {{-- SRP --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-primary">
                        {{App\Models\Product::getProdPrice(25)}}
                    </button>
                </span>
                {{-- quantity textbox --}}
                <input type="number" name="qty[]" id="qty19"  class="form-control form-control-lg text-center" value="0" >
                {{-- subtotal textbox --}}
                <input type="number" class="form-control form-control-lg text-right num" id="subTotal19" value="0.00" name="subtotal[]" readonly>
                {{-- trash button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash19">
                        <span class="fa fa-trash text-danger"></span>
                    </button>
                </span>
                {{-- minus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus19">
                        <span class="fa fa-minus"></span>
                    </button>
                </span>
                {{-- plus button --}}
                <span class="input-group-prepend">
                    <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus19">
                        <span class="fa fa-plus"></span>
                    </button>
                </span>
            </div>

            {{-- 6.00 --}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(22)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty20"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal20" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash20">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus20">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus20">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            {{-- 10.00 --}}
            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(19)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty21"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal21" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash21">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus21">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus21">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(21)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty22"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal22" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash22">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus22">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus22">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(17)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty23"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal23" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash23">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus23">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus23">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(18)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty24"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal24" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash24">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus24">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus24">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(23)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty25"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal25" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash25">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus25">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus25">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(24)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty26"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal26" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash26">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus26">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus26">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div> 

            <div class="input-group">
                <div class="input-group">
                    {{-- SRP --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-primary">
                            {{App\Models\Product::getProdPrice(20)}}
                        </button>
                    </span>
                    {{-- quantity textbox --}}
                    <input type="number" name="qty[]" id="qty27"  class="form-control form-control-lg text-center" value="0">
                    {{-- subtotal textbox --}}
                    <input type="number" class="form-control form-control-lg text-right num" id="subTotal27" value="0.00" name="subtotal[]" readonly>
                    {{-- trash button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg delete" id="trash27">
                            <span class="fa fa-trash text-danger"></span>
                        </button>
                    </span>
                    {{-- minus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="minus27">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    {{-- plus button --}}
                    <span class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-number" id="plus27">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
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
