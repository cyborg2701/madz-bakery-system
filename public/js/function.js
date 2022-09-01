$(document).ready(function(){
    //detect input if focus
    $('input').focus(function(){
        $(this).val("");
    });


    // detech subtotal 1 
    $('#manualInput').on('input', function(){
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

    // button functions
    var buttonsAndFunctions = [ 
        // plus buttons
        { button : "plus1", fn : function(evt){ $qty1.val(parseInt($qty1.val())+1);$subTotal1.val(parseFloat($qty1.val()* $('#price1').val()).toFixed(2)); }},
        { button : "plus2", fn : function(evt){ $qty2.val(parseInt($qty2.val())+1);$subTotal2.val(parseFloat($qty2.val()* $('#price2').val()).toFixed(2)); }},
        { button : "plus3", fn : function(evt){ $qty3.val(parseInt($qty3.val())+1); $subTotal3.val(parseFloat($qty3.val()*$('#price3').val()).toFixed(2)); }},
        { button : "plus4", fn : function(evt){ $qty4.val(parseInt($qty4.val())+1); $subTotal4.val(parseFloat($qty4.val()*$('#price4').val()).toFixed(2)); }},
        { button : "plus5", fn : function(evt){ $qty5.val(parseInt($qty5.val())+1);$subTotal5.val(parseFloat($qty5.val()*$('#price5').val()).toFixed(2)); }},
        { button : "plus6", fn : function(evt){ $qty6.val(parseInt($qty6.val())+1);$subTotal6.val(parseFloat($qty6.val()*$('#price6').val()).toFixed(2)); }},
        { button : "plus7", fn : function(evt){ $qty7.val(parseInt($qty7.val())+1); $subTotal7.val(parseFloat($qty7.val()*$('#price7').val()).toFixed(2)); }},
        { button : "plus8", fn : function(evt){ $qty8.val(parseInt($qty8.val())+1);$subTotal8.val(parseFloat($qty8.val()*$('#price8').val()).toFixed(2)); }},
        { button : "plus9", fn : function(evt){ $qty9.val(parseInt($qty9.val())+1);$subTotal9.val(parseFloat($qty9.val()*$('#price9').val()).toFixed(2)); }},
        { button : "plus10", fn : function(evt){ $qty10.val(parseInt($qty10.val())+1);$subTotal10.val(parseFloat($qty10.val()*$('#price10').val()).toFixed(2)); }},
       

        // minus buttons
        { button : "minus1", fn : function(evt){ $qty1.val(parseInt($qty1.val())-1); $subTotal1.val(parseFloat($subTotal1.val()- $('#price1').val()).toFixed(2)); }},
        { button : "minus2", fn : function(evt){ $qty2.val(parseInt($qty2.val())-1); $subTotal2.val(parseFloat($subTotal2.val()- $('#price2').val()).toFixed(2)); }},
        { button : "minus3", fn : function(evt){ $qty3.val(parseInt($qty3.val())-1);$subTotal3.val(parseFloat($subTotal3.val()-$('#price3').val()).toFixed(2)); }},
        { button : "minus4", fn : function(evt){ $qty4.val(parseInt($qty4.val())-1);$subTotal4.val(parseFloat($subTotal4.val()-$('#price4').val()).toFixed(2)); }},
        { button : "minus5", fn : function(evt){ $qty5.val(parseInt($qty5.val())-1);$subTotal5.val(parseFloat($subTotal5.val()-$('#price5').val()).toFixed(2)); }},
        { button : "minus6", fn : function(evt){ $qty6.val(parseInt($qty6.val())-1);$subTotal6.val(parseFloat($subTotal6.val()-$('#price6').val()).toFixed(2)); }},
        { button : "minus7", fn : function(evt){ $qty7.val(parseInt($qty7.val())-1);$subTotal7.val(parseFloat($subTotal7.val()-$('#price7').val()).toFixed(2)); }},
        { button : "minus8", fn : function(evt){ $qty8.val(parseInt($qty8.val())-1);$subTotal8.val(parseFloat($subTotal8.val()-$('#price8').val()).toFixed(2)); }},
        { button : "minus9", fn : function(evt){ $qty9.val(parseInt($qty9.val())-1);$subTotal9.val(parseFloat($subTotal9.val()-$('#price9').val()).toFixed(2)); }},
        { button : "minus10", fn : function(evt){ $qty10.val(parseInt($qty10.val())-1);$subTotal10.val(parseFloat($subTotal10.val()-$('#price10').val()).toFixed(2)); }},
     
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
        ]
})