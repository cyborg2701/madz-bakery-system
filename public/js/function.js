function firstProduct(){
    $('body').on('click', '.first-trash', function(){
    $('.first-number').val(0);
    $('#six').val(0);
    });

    $('body').on('click', '.first-plus', function(){
    result = $('.first-number').val() * 6;
    $('#six').val(parseFloat(result).toFixed(2));
    });
    $('body').on('click', '.first-minus', function(){
    result = $('#six').val() - 6;
    $('#six').val(parseFloat(result).toFixed(2));
    });
}

function secondProduct(){
    $('body').on('click', '.second-trash', function(){
        $('.second-number').val(0);
        $('#two').val(0);
    });
    
    $('body').on('click', '.second-plus', function(){
        result = $('.second-number').val() * 2.5;
        $('#two').val(parseFloat(result).toFixed(2));
    });

    $('body').on('click', '.second-minus', function(){
        result = $('#two').val() - 2.5;
        $('#two').val(parseFloat(result).toFixed(2));
    });
}

function thirdProduct() {
    $('body').on('click', '.third-trash', function(){
        $('.third-number').val(0);
        $('#three').val(0);
    });
    
    $('body').on('click', '.third-plus', function(){
        result = $('.third-number').val() * 10;
        $('#three').val(parseFloat(result).toFixed(2));
    });

    $('body').on('click', '.third-minus', function(){
        result = $('#three').val() - 10;
        $('#three').val(parseFloat(result).toFixed(2));
    });
}

$(document).ready(function(){;

firstProduct();
secondProduct();
thirdProduct();

// $('.first-qty').on('keypress', function(){
//     if(e.which ==13){
//         category1 = $('.first-number').val() * 6;
//         $('#six').val(parseFloat(category1).toFixed(2));
//     }
// })
$(document).on('keypress',function(e) {
    if(e.which == 13) 
        {
            
            category1 = $('.first-number').val() * 6;
            $('#six').val(parseFloat(category1).toFixed(2));

            category2 = $('.second-number').val() * 2.5;
            $('#two').val(parseFloat(category2).toFixed(2));

            category3 = $('.third-number').val() * 10;
            $('#three').val(parseFloat(category3).toFixed(2));
        }
    });

$('.btn-number').click(function(e){
e.preventDefault();

fieldName = $(this).attr('data-field');
type      = $(this).attr('data-type');
var input = $("input[id='"+fieldName+"']");
var currentVal = parseInt(input.val());
if (!isNaN(currentVal)) {
    if(type == 'first-minus') {
        
        if(currentVal > input.attr('min')) {
            input.val(currentVal - 1).change();
        } 
        if(parseInt(input.val()) == input.attr('min')) {
            $(this).attr('disabled', true);
        }

    } else if(type == 'first-plus') {

        if(currentVal < input.attr('max')) {
            input.val(currentVal + 1).change();
        }
        if(parseInt(input.val()) == input.attr('max')) {
            $(this).attr('disabled', true);
        }

    }
} else {
    input.val(0);
}
});


$('.first-number').focusin(function(){
$(this).data('oldValue', $(this).val());
});
$('.first-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    first_id = $(this).attr('id');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='first-minus'][data-field='"+first_id+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='first-plus'][data-field='"+first_id+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
});

$(".first-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
        // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) || 
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});  // end of 1st function


$('.btn-number').click(function(e){
e.preventDefault();

fieldName = $(this).attr('data-field');
type      = $(this).attr('data-type');
var input = $("input[id='"+fieldName+"']");
var currentVal = parseInt(input.val());
if (!isNaN(currentVal)) {
    if(type == 'second-minus') {
        
        if(currentVal > input.attr('min')) {
            input.val(currentVal - 1).change();
        } 
        if(parseInt(input.val()) == input.attr('min')) {
            $(this).attr('disabled', true);
        }

    } else if(type == 'second-plus') {

        if(currentVal < input.attr('max')) {
            input.val(currentVal + 1).change();
        }
        if(parseInt(input.val()) == input.attr('max')) {
            $(this).attr('disabled', true);
        }

    }
} else {
    input.val(0);
}
});

$('.second-number').focusin(function(){
$(this).data('oldValue', $(this).val());
});
$('.second-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    second_id = $(this).attr('id');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='second-minus'][data-field='"+second_id+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='second-plus'][data-field='"+second_id+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
});

$(".second-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
        // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) || 
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
}); //end of second function



$('.btn-number').click(function(e){
e.preventDefault();

fieldName = $(this).attr('data-field');
type      = $(this).attr('data-type');
var input = $("input[id='"+fieldName+"']");
var currentVal = parseInt(input.val());
if (!isNaN(currentVal)) {
    if(type == 'third-minus') {
        
        if(currentVal > input.attr('min')) {
            input.val(currentVal - 1).change();
        } 
        if(parseInt(input.val()) == input.attr('min')) {
            $(this).attr('disabled', true);
        }

    } else if(type == 'third-plus') {

        if(currentVal < input.attr('max')) {
            input.val(currentVal + 1).change();
        }
        if(parseInt(input.val()) == input.attr('max')) {
            $(this).attr('disabled', true);
        }

    }
} else {
    input.val(0);
}
});

$('.third-number').focusin(function(){
$(this).data('oldValue', $(this).val());
});
$('.third-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    third_id = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='third-minus'][data-field='"+third_id+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='third-plus'][data-field='"+third_id+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
});

$(".third-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
        // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) || 
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
}); //end of third function



})