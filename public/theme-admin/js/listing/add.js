var BACKSPACE_KEY = 8;
var DELETE_KEY = 46;

$(document).ready(function() {


    var val = $('#price').val();
    val = Number(val.replace(/,/g, ""));
    $('#price').val(formatNumber(val, ""));

    var val = $('#area').val();
    val = Number(val.replace(/,/g, ""));
    $('#area').val(formatNumber(val, ""));

    $('#price').on("keydown",function(evt) {
        var charCode = charCode = (evt.which) ? evt.which : event.keyCode;
        if(charCode == BACKSPACE_KEY || charCode == DELETE_KEY ) {
            return true;
        }
        return isEnterNumber(charCode);
    });

    $('#price').keyup(function() {
        var val = $(this).val();
        val = Number(val.replace(/,/g, ""));
        $(this).val(formatNumber(val, ""));

    });

    $('#area').on("keydown",function(evt) {
        var charCode = charCode = (evt.which) ? evt.which : event.keyCode;
        if(charCode == BACKSPACE_KEY || charCode == DELETE_KEY ) {
            return true;
        }
        return isEnterNumber(charCode);
    });

    $('#area').keyup(function() {
        var val = $(this).val();
        val = Number(val.replace(/,/g, ""));
        $(this).val(formatNumber(val, ""));

    });


});





function isEnterNumber(keyCode) {
    if ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105)) {
        return true;
    }
    return false;
}

function formatNumber (num, strDollar) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}

