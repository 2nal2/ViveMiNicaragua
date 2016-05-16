(function() {
    var formulario = document.formulario_registro,
        elementos = formulario.elements;

    //Funciones
    var validarInputs = function() {
        for (var i = 0; i < elementos.length; i++) {
            if (elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "password") {
                if (elementos[i].value == 0) {
                    console.log('El campo ' + elementos[i].name + ' esta vacio');
                    elementos[i].className = elementos[i].className + " error";
                    return false;
                } else {
                    elementos[i].className = elementos[i].className.replace("error", "");
                }
            }
        }

        if (elementos.pass.value != elementos.pass2.value) {
            elementos.pass.value = "";
            elementos.pass2.value = "";

            elementos.pass.className = elementos.pass.className + " error";
            elementos.pass2.className = elementos.pass2.className + " error";
        } else {
            elementos.pass.className = elementos.pass.className.replace(" error", "");
            elementos.pass2.className = elementos.pass2.className.replace(" error", "");
        }

        return true;
    };

    var validarRadio = function() {
        var opciones = document.getElementsByName('sexo'),
            resultado = false;

        for (var i = 0; i < elementos.length; i++) {
            if (elementos[i].type == "radio" && elementos[i].name == "sexo") {
                for (var j = 0; j < opciones.length; j++) {
                    if (opciones[j].checked) {
                        resultado = true;
                        break;
                    }
                }
                if (resultado == false) {
                    elementos[i].parentNode.className = elementos[i].parentNode.className + " error";
                    console.log('No se ha definido sexo');
                    return false;
                } else {
                    elementos[i].parentNode.className = elementos[i].parentNode.className.replace(" error", "");
                    return true;
                }
            }
        }

    };

    var validarCheckbox = function(){
        var opciones = document.getElementsByName('terminos'),
            resultado = false;

        for (var i = 0; i < elementos.length; i++) {
            if (elementos[i].type == "checkbox") {
                for (var j = 0; j < opciones.length; j++) {
                    if (opciones[j].checked) {
                        resultado = true;
                        break;
                    }
                }
                if (resultado == false) {
                    elementos[i].parentNode.className = elementos[i].parentNode.className + " error";
                    console.log('No se han acetado los terminos y condiciones');
                    return false;
                } else {
                    elementos[i].parentNode.className = elementos[i].parentNode.className.replace(" error", "");
                    return true;
                }
            }
        }


    };

    var enviar = function(e) {
        if (!validarInputs()) {
            console.log("Falto validar Inputs");
            e.preventDefault();
        } else if (!validarRadio()) {
            console.log("Falto validar Radios");
            e.preventDefault();
        } else if (!validarCheckbox()) {
            console.log("Falto validar Checkbox");
            e.preventDefault();
        } else {
            console.log("Enviado Correctamente");
            //Quitar la siguiente linea una vez terminado :v porque soy batman
            //e.preventDefault();
        }
    };

    var focusInput = function() {
        this.parentElement.children[1].className = "label active";
        this.parentElement.children[0].className = this.parentElement.children[0].className.replace("error", "");
    };

    var blurInput = function() {
        if (this.value <= 0) {
            this.parentElement.children[1].className = "label";
            this.parentElement.children[0].className = this.parentElement.children[0].className + " error";
        }
    };

    //Eventos
    formulario.addEventListener("submit", enviar);

    for (var i = 0; i < elementos.length; i++) {
        if (elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "password") {
            elementos[i].addEventListener("focus", focusInput);
            elementos[i].addEventListener("blur", blurInput);
        }
    }
}())
