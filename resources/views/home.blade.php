@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-md-2">
        <div class="input-group">
            <span class="input-group-append">
                <button type="button" class="btn btn-warning ">
                    Total
                </button>
            </span>
            
            <input type="text" name="total" id="total"  class="form-control text-right" readonly>
        </div>
    </div>
</div>

{{-- accordion 1 --}}
<form action="" id="transactionForm" name="transactionForm" enctype="multipart/form-data">

    <input type="number" id="lastTrans" value="{{$lastTransId->transactionId}}">
    <input type="number" name="transactionId" id="transactionId">

    {{-- value for 6 peso --}}
    <input type="number" name="price[]" value="2.50">
    <input type="number" name="price[]" value="6.00">
    <input type="number" name="price[]" value="10.00">
    <div class="d-flex justify-content-center">
        <div class="col-md-4">
            <div id="accordion" role="tablist">
                <div class="card">
                  <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                      <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        BREAD
                      </a>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-body">
    
                        
                        <div class="input-group">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary second-trash">
                                    <span class="fa fa-trash text-danger"></span>
                                </button>
                            </span>
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-primary">
                                    ₱2.50
                                </button>
                            </span>
                            <span class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary btn-number second-minus" disabled="disabled" data-type="second-minus" data-field="second-qty">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="qty[]" id="second_qty"  class="form-control second-number text-center" value="0" min="0" max="50">
                            <input type="text" class="form-control text-right" id="two" value="0.00" name="subtotal[]"  readonly>
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary btn-number second-plus" data-type="second-plus" data-field="second_qty">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </span>
                        </div>
    
    
                        <div class="input-group">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary first-trash">
                                    <span class="fa fa-trash text-danger"></span>
                                </button>
                            </span>
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-primary">
                                    ₱6.00
                                </button>
                            </span>
                            <span class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary btn-number first-minus" disabled="disabled" data-type="first-minus" data-field="first_qty">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="qty[]" id="first_qty"   class="form-control first-number text-center num" value="0" min="0" max="50">
                            <input type="text" class="form-control text-right num" id="six" value="0.00" name="subtotal[]"  readonly>
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary btn-number first-plus" data-type="first-plus" data-field="first_qty">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </span>
                        </div>
    
                        <div class="input-group">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary third-trash">
                                    <span class="fa fa-trash text-danger"></span>
                                </button>
                            </span>
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-primary">
                                    ₱10.0
                                </button>
                            </span>
                            <span class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary btn-number third-minus" disabled="disabled" data-type="third-minus" data-field="third_qty">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="qty[]" id="third_qty"  class="form-control third-number text-center" value="0" min="0" max="50">
                            <input type="text" class="form-control text-right" id="three" value="0.00" name="subtotal[]"  readonly>
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary btn-number third-plus" data-type="third-plus" data-field="third_qty">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </span>
                
                        </div>
    
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <button id="saveTransaction" name="saveTransaction" type="button" class="btn btn-primary">Save</button>
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
                        console.log('Transaction saved successfully','Success');

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        // toastr.error(data['responseJSON']['message'],'Error has occured');
                    }
                });
            }
        });
    })
</script>
@endsection
