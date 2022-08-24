$(document).ready(function(){

    $('#subTotal1').on('input', function(){
        getTotal();
    });
    // get Total Value
    function getTotal(){
        var sum = 0;
        $('.num').each(function(){
            sum += +$(this).val();
        });
        $('#total').val(parseFloat(sum).toFixed(2));
    }
    // get total when trash was clicked
    function trashTotal(){
        var sum = 0;
        $('.delete').each(function(){
            sum += -$(this).val();
        });
        $('#total').val(parseFloat(sum).toFixed(2));
    }

    $(document).on('click', '.btn-number', function(e){
        e.preventDefault();
        getTotal();
    });

    $(document).on('click', '.delete', function(e){
        e.preventDefault();
        getTotal();
    });

    // plus minus discounts subtotal functions
    $( "button" ).click(function(evt) { 
        // this binding is lost inside of forEach
        var id = this.id;
        // Loop over each stored object in the array...
        var result = buttonsAndFunctions.forEach(function(obj){
          // If the current object.button matches the button.id, invoke the function
          // Since the function won't directly recieve the event, we'll pass the event
          // to the function:
          (obj.button === id) ? obj.fn(evt) : "";
        });
    });
    // quantity variables
    let $qty1 = $('#qty1').val(0);
    let $qty2 = $('#qty2').val(0);
    let $qty3 = $('#qty3').val(0);
    let $qty4 = $('#qty4').val(0);
    let $qty5 = $('#qty5').val(0);
    let $qty6 = $('#qty6').val(0);
    let $qty7 = $('#qty7').val(0);
    let $qty8 = $('#qty8').val(0);
    let $qty9 = $('#qty9').val(0);
    let $qty10 = $('#qty10').val(0);
    let $qty11 = $('#qty11').val(0);
    let $qty12 = $('#qty12').val(0);
    let $qty13 = $('#qty13').val(0);
    let $qty14 = $('#qty14').val(0);
    let $qty15 = $('#qty15').val(0);
    let $qty16 = $('#qty16').val(0);
    let $qty17 = $('#qty17').val(0);
    let $qty18 = $('#qty18').val(0);
    let $qty19 = $('#qty19').val(0);
    let $qty20 = $('#qty20').val(0);
    let $qty21 = $('#qty21').val(0);
    let $qty22 = $('#qty22').val(0);
    let $qty23 = $('#qty23').val(0);
    let $qty24 = $('#qty24').val(0);
    let $qty25 = $('#qty25').val(0);
    let $qty26 = $('#qty26').val(0);
    let $qty27 = $('#qty27').val(0);

    // subtotal variables
    let $subTotal1 = $('#subTotal1').val(0);
    let $subTotal2 = $('#subTotal2').val(0);
    let $subTotal3 = $('#subTotal3').val(0);
    let $subTotal4 = $('#subTotal4').val(0);
    let $subTotal5 = $('#subTotal5').val(0);
    let $subTotal6 = $('#subTotal6').val(0);
    let $subTotal7 = $('#subTotal7').val(0);
    let $subTotal8 = $('#subTotal8').val(0);
    let $subTotal9 = $('#subTotal9').val(0);
    let $subTotal10 = $('#subTotal10').val(0);
    let $subTotal11 = $('#subTotal11').val(0);
    let $subTotal12 = $('#subTotal12').val(0);
    let $subTotal13 = $('#subTotal13').val(0);
    let $subTotal14 = $('#subTotal14').val(0);
    let $subTotal15 = $('#subTotal15').val(0);
    let $subTotal16 = $('#subTotal16').val(0);
    let $subTotal17 = $('#subTotal17').val(0);
    let $subTotal18 = $('#subTotal18').val(0);
    let $subTotal19 = $('#subTotal19').val(0);
    let $subTotal20 = $('#subTotal20').val(0);
    let $subTotal21 = $('#subTotal21').val(0);
    let $subTotal22 = $('#subTotal22').val(0);
    let $subTotal23 = $('#subTotal23').val(0);
    let $subTotal24 = $('#subTotal24').val(0);
    let $subTotal25 = $('#subTotal25').val(0);
    let $subTotal26 = $('#subTotal26').val(0);
    let $subTotal27 = $('#subTotal27').val(0);

    // button functins
    var buttonsAndFunctions = [ 
        // plus buttons
        { button : "plus1", 
            fn : function(evt){ 
                $qty1.val(parseInt($qty1.val())+1);
                // apply discount
               if($('#discount1').is(':checked') === true){
                    console.log('discount is checked');
                    $subTotal1.val(parseFloat($qty1.val()*2).toFixed(2));
                } else{
                    $subTotal1.val(parseFloat($qty1.val()* $('#price1').val()).toFixed(2));
                }
            } 
                
        },

        { button : "plus2", 
            fn : function(evt){ 
                $qty2.val(parseInt($qty2.val())+1);
                // apply discount
                if($('#discount2').is(':checked') === true){
                    console.log('discount is checked');
                    $subTotal2.val(parseFloat($qty2.val()*5).toFixed(2));
                } else{
                    $subTotal2.val(parseFloat($qty2.val()* $('#price2').val()).toFixed(2));
                }
            } 
        },

        { button : "plus3", fn : function(evt){ $qty3.val(parseInt($qty3.val())+1); $subTotal3.val(parseFloat($qty3.val()*$('#price3').val()).toFixed(2)); }},
        { button : "plus4", fn : function(evt){ $qty4.val(parseInt($qty4.val())+1); $subTotal4.val(parseFloat($qty4.val()*$('#price4').val()).toFixed(2)); }},
        { button : "plus5", fn : function(evt){ $qty5.val(parseInt($qty5.val())+1);$subTotal5.val(parseFloat($qty5.val()*$('#price5').val()).toFixed(2)); }},
        { button : "plus6", fn : function(evt){ $qty6.val(parseInt($qty6.val())+1);$subTotal6.val(parseFloat($qty6.val()*$('#price6').val()).toFixed(2)); }},
        { button : "plus7", fn : function(evt){ $qty7.val(parseInt($qty7.val())+1); $subTotal7.val(parseFloat($qty7.val()*$('#price7').val()).toFixed(2)); }},
        { button : "plus8", fn : function(evt){ $qty8.val(parseInt($qty8.val())+1);$subTotal8.val(parseFloat($qty8.val()*$('#price8').val()).toFixed(2)); }},
        { button : "plus9", fn : function(evt){ $qty9.val(parseInt($qty9.val())+1);$subTotal9.val(parseFloat($qty9.val()*$('#price9').val()).toFixed(2)); }},
        { button : "plus10", fn : function(evt){ $qty10.val(parseInt($qty10.val())+1);$subTotal10.val(parseFloat($qty10.val()*$('#price10').val()).toFixed(2)); }},
        { button : "plus11", fn : function(evt){ $qty11.val(parseInt($qty11.val())+1);$subTotal11.val(parseFloat($qty11.val()*$('#price11').val()).toFixed(2)); }},
        { button : "plus12", fn : function(evt){ $qty12.val(parseInt($qty12.val())+1);$subTotal12.val(parseFloat($qty12.val()*$('#price12').val()).toFixed(2)); }},
        { button : "plus13", fn : function(evt){ $qty13.val(parseInt($qty13.val())+1);$subTotal13.val(parseFloat($qty13.val()*$('#price13').val()).toFixed(2)); }},
        { button : "plus14", fn : function(evt){ $qty14.val(parseInt($qty14.val())+1);$subTotal14.val(parseFloat($qty14.val()*$('#price14').val()).toFixed(2)); }},
        { button : "plus15", fn : function(evt){ $qty15.val(parseInt($qty15.val())+1);$subTotal15.val(parseFloat($qty15.val()*$('#price15').val()).toFixed(2)); }},
        { button : "plus16", fn : function(evt){ $qty16.val(parseInt($qty16.val())+1);$subTotal16.val(parseFloat($qty16.val()*$('#price16').val()).toFixed(2)); }},
        { button : "plus17", fn : function(evt){ $qty17.val(parseInt($qty17.val())+1);$subTotal17.val(parseFloat($qty17.val()*$('#price17').val()).toFixed(2)); }},
        { button : "plus18", fn : function(evt){ $qty18.val(parseInt($qty18.val())+1);$subTotal18.val(parseFloat($qty18.val()*$('#price18').val()).toFixed(2)); }},
        { button : "plus19", fn : function(evt){ $qty19.val(parseInt($qty19.val())+1);$subTotal19.val(parseFloat($qty19.val()*$('#price19').val()).toFixed(2)); }},
        { button : "plus20", fn : function(evt){ $qty20.val(parseInt($qty20.val())+1);$subTotal20.val(parseFloat($qty20.val()*$('#price20').val()).toFixed(2)); }},
        { button : "plus21", fn : function(evt){ $qty21.val(parseInt($qty21.val())+1);$subTotal21.val(parseFloat($qty21.val()*$('#price21').val()).toFixed(2)); }},
        { button : "plus22", fn : function(evt){ $qty22.val(parseInt($qty22.val())+1);$subTotal22.val(parseFloat($qty22.val()*$('#price22').val()).toFixed(2)); }},
        { button : "plus23", fn : function(evt){ $qty23.val(parseInt($qty23.val())+1);$subTotal23.val(parseFloat($qty23.val()*$('#price23').val()).toFixed(2)); }},
        { button : "plus24", fn : function(evt){ $qty24.val(parseInt($qty24.val())+1);$subTotal24.val(parseFloat($qty24.val()*$('#price24').val()).toFixed(2)); }},
        { button : "plus25", fn : function(evt){ $qty25.val(parseInt($qty25.val())+1);$subTotal25.val(parseFloat($qty25.val()*$('#price25').val()).toFixed(2)); }},
        { button : "plus26", fn : function(evt){ $qty26.val(parseInt($qty26.val())+1);$subTotal26.val(parseFloat($qty26.val()*$('#price26').val()).toFixed(2)); }},
        { button : "plus27", fn : function(evt){ $qty27.val(parseInt($qty27.val())+1);$subTotal27.val(parseFloat($qty27.val()*$('#price27').val()).toFixed(2)); }},


        // minus buttons
        { button : "minus1", 
        fn : function(evt){ 
                $qty1.val(parseInt($qty1.val())-1);
                // apply discount
                if($('#discount1').is(':checked') === true){
                    console.log('discount is checked');
                    $subTotal1.val(parseFloat($subTotal1.val()-2).toFixed(2));
                } else{
                    $subTotal1.val(parseFloat($subTotal1.val()- $('#price1').val()).toFixed(2));
                }
            } 
        },

        { button : "minus2", 
        fn : function(evt){ 
                $qty2.val(parseInt($qty2.val())-1);
                   // apply discount
                   if($('#discount2').is(':checked') === true){
                    console.log('discount is checked');
                    $subTotal2.val(parseFloat($subTotal2.val()-5).toFixed(2));
                } else{
                    $subTotal2.val(parseFloat($subTotal2.val()- $('#price2').val()).toFixed(2));
                }
            } 
        },

        { button : "minus3", fn : function(evt){ $qty3.val(parseInt($qty3.val())-1);$subTotal3.val(parseFloat($subTotal3.val()-$('#price3').val()).toFixed(2)); }},
        { button : "minus4", fn : function(evt){ $qty4.val(parseInt($qty4.val())-1);$subTotal4.val(parseFloat($subTotal4.val()-$('#price4').val()).toFixed(2)); }},
        { button : "minus5", fn : function(evt){ $qty5.val(parseInt($qty5.val())-1);$subTotal5.val(parseFloat($subTotal5.val()-$('#price5').val()).toFixed(2)); }},
        { button : "minus6", fn : function(evt){ $qty6.val(parseInt($qty6.val())-1);$subTotal6.val(parseFloat($subTotal6.val()-$('#price6').val()).toFixed(2)); }},
        { button : "minus7", fn : function(evt){ $qty7.val(parseInt($qty7.val())-1);$subTotal7.val(parseFloat($subTotal7.val()-$('#price7').val()).toFixed(2)); }},
        { button : "minus8", fn : function(evt){ $qty8.val(parseInt($qty8.val())-1);$subTotal8.val(parseFloat($subTotal8.val()-$('#price8').val()).toFixed(2)); }},
        { button : "minus9", fn : function(evt){ $qty9.val(parseInt($qty9.val())-1);$subTotal9.val(parseFloat($subTotal9.val()-$('#price9').val()).toFixed(2)); }},
        { button : "minus10", fn : function(evt){ $qty10.val(parseInt($qty10.val())-1);$subTotal10.val(parseFloat($subTotal10.val()-$('#price10').val()).toFixed(2)); }},
        { button : "minus11", fn : function(evt){ $qty11.val(parseInt($qty11.val())-1);$subTotal11.val(parseFloat($subTotal11.val()-$('#price11').val()).toFixed(2)); }},
        { button : "minus12", fn : function(evt){ $qty12.val(parseInt($qty12.val())-1);$subTotal12.val(parseFloat($subTotal12.val()-$('#price12').val()).toFixed(2)); }},
        { button : "minus13", fn : function(evt){ $qty13.val(parseInt($qty13.val())-1);$subTotal13.val(parseFloat($subTotal13.val()-$('#price13').val()).toFixed(2)); }},
        { button : "minus14", fn : function(evt){ $qty14.val(parseInt($qty14.val())-1);$subTotal14.val(parseFloat($subTotal14.val()-$('#price14').val()).toFixed(2)); }},
        { button : "minus15", fn : function(evt){ $qty15.val(parseInt($qty15.val())-1);$subTotal15.val(parseFloat($subTotal15.val()-$('#price15').val()).toFixed(2)); }},
        { button : "minus16", fn : function(evt){ $qty16.val(parseInt($qty16.val())-1);$subTotal16.val(parseFloat($subTotal16.val()-$('#price16').val()).toFixed(2)); }},
        { button : "minus17", fn : function(evt){ $qty17.val(parseInt($qty17.val())-1);$subTotal17.val(parseFloat($subTotal17.val()-$('#price17').val()).toFixed(2)); }},
        { button : "minus18", fn : function(evt){ $qty18.val(parseInt($qty18.val())-1);$subTotal18.val(parseFloat($subTotal18.val()-$('#price18').val()).toFixed(2)); }},
        { button : "minus19", fn : function(evt){ $qty19.val(parseInt($qty19.val())-1);$subTotal19.val(parseFloat($subTotal19.val()-$('#price19').val()).toFixed(2)); }},
        { button : "minus20", fn : function(evt){ $qty20.val(parseInt($qty20.val())-1);$subTotal20.val(parseFloat($subTotal20.val()-$('#price20').val()).toFixed(2)); }},
        { button : "minus21", fn : function(evt){ $qty21.val(parseInt($qty21.val())-1);$subTotal21.val(parseFloat($subTotal21.val()-$('#price21').val()).toFixed(2)); }},
        { button : "minus22", fn : function(evt){ $qty22.val(parseInt($qty22.val())-1);$subTotal22.val(parseFloat($subTotal22.val()-$('#price22').val()).toFixed(2)); }},
        { button : "minus23", fn : function(evt){ $qty23.val(parseInt($qty23.val())-1);$subTotal23.val(parseFloat($subTotal23.val()-$('#price23').val()).toFixed(2)); }},
        { button : "minus24", fn : function(evt){ $qty24.val(parseInt($qty24.val())-1);$subTotal24.val(parseFloat($subTotal24.val()-$('#price24').val()).toFixed(2)); }},
        { button : "minus25", fn : function(evt){ $qty25.val(parseInt($qty25.val())-1);$subTotal25.val(parseFloat($subTotal25.val()-$('#price25').val()).toFixed(2)); }},
        { button : "minus26", fn : function(evt){ $qty26.val(parseInt($qty26.val())-1);$subTotal26.val(parseFloat($subTotal26.val()-$('#price26').val()).toFixed(2)); }},
        { button : "minus27", fn : function(evt){ $qty27.val(parseInt($qty27.val())-1);$subTotal27.val(parseFloat($subTotal27.val()-$('#price27').val()).toFixed(2)); }},

        // trash button
        { button : "trash1", fn : function(evt){ $qty1.val(0);$subTotal1.val(0); }},
        { button : "trash2", fn : function(evt){ $qty2.val(0);$subTotal2.val(0); }},
        { button : "trash3", fn : function(evt){ $qty3.val(0);$subTotal3.val(0); }},
        { button : "trash4", fn : function(evt){ $qty4.val(0);$subTotal4.val(0); }},
        { button : "trash5", fn : function(evt){ $qty5.val(0);$subTotal5.val(0); }},
        { button : "trash6", fn : function(evt){ $qty6.val(0);$subTotal6.val(0); }},
        { button : "trash7", fn : function(evt){ $qty7.val(0);$subTotal7.val(0); }},
        { button : "trash8", fn : function(evt){ $qty8.val(0);$subTotal8.val(0); }},
        { button : "trash9", fn : function(evt){ $qty9.val(0);$subTotal9.val(0); }},
        { button : "trash10", fn : function(evt){ $qty10.val(0);$subTotal10.val(0); }},
        { button : "trash11", fn : function(evt){ $qty11.val(0);$subTotal11.val(0); }},
        { button : "trash12", fn : function(evt){ $qty12.val(0);$subTotal12.val(0); }},
        { button : "trash13", fn : function(evt){ $qty13.val(0);$subTotal13.val(0); }},
        { button : "trash14", fn : function(evt){ $qty14.val(0);$subTotal14.val(0); }},
        { button : "trash15", fn : function(evt){ $qty15.val(0);$subTotal15.val(0); }},
        { button : "trash16", fn : function(evt){ $qty16.val(0);$subTotal16.val(0); }},
        { button : "trash17", fn : function(evt){ $qty17.val(0);$subTotal17.val(0); }},
        { button : "trash18", fn : function(evt){ $qty18.val(0);$subTotal18.val(0); }},
        { button : "trash19", fn : function(evt){ $qty19.val(0);$subTotal19.val(0); }},
        { button : "trash20", fn : function(evt){ $qty20.val(0);$subTotal20.val(0); }},
        { button : "trash21", fn : function(evt){ $qty21.val(0);$subTotal21.val(0); }},
        { button : "trash22", fn : function(evt){ $qty22.val(0);$subTotal22.val(0); }},
        { button : "trash23", fn : function(evt){ $qty23.val(0);$subTotal23.val(0); }},
        { button : "trash24", fn : function(evt){ $qty24.val(0);$subTotal24.val(0); }},
        { button : "trash25", fn : function(evt){ $qty25.val(0);$subTotal25.val(0); }},
        { button : "trash26", fn : function(evt){ $qty26.val(0);$subTotal26.val(0); }},
        { button : "trash27", fn : function(evt){ $qty27.val(0);$subTotal27.val(0); }},

        ]
})