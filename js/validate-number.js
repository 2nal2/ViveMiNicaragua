$('.number').keydown(

    function(event) {
        var val = $(event.target).val().trim();
        var permitidos = [8, 9, 13, 37, 39, 46, 86, 173, 189];
        // console.log(event.which);
        if (!val.includes(".")) {
            permitidos.push(190);
            permitidos.push(110);
        }

        if (!esNumerico(event.which, permitidos))
            event.preventDefault();
    }
);


function esNumerico(pulsada, permitidos) {
    for (var i = 0; i < permitidos.length; i++) {
        if (permitidos[i] == pulsada) {
            return true;
        }
    }
    if (pulsada >= 48 && pulsada <= 57) {
        return true;
    }
    if (pulsada >= 96 && pulsada <= 105) {
        return true;
    }
    return false;
}


$(".number").focusout(function() {
    if ($.isNumeric($(this).val())) {

    } else {
        $("#error").text("Los campos longitud y latitud solo aceptan numeros(decimales)");
        $(this).val("");
    }
});
