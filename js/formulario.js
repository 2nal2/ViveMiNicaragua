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

    if (document.getElementById("pass").value != document.getElementById("pass2").value) {
      console.log('validado');

      elementos.pass.value = "";
      elementos.pass2.value = "";

      elementos.pass.className = elementos.pass.className + " error";
      elementos.pass2.className = elementos.pass2.className + " error";
      return false;
    } else {
      elementos.pass.className = elementos.pass.className.replace(" error", "");
      elementos.pass2.className = elementos.pass2.className.replace(" error", "");
      return true;
    }

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

  var validarCheckbox = function() {
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

  var existeUsuario = function() {
    try {
      var Info = document.getElementById('Error');
      return Info.innerHTML.includes("existente");
    } catch (error) {

      return false;
    }
    //return true;
  };

  function passwordLevel(p) {
    //console.log('estoy llamando al metodo');
    l = 0;
    v1 = 'aeiou1234567890';
    v2 = 'AEIOUbcdfghjklmnpqrst';
    v3 = 'vxyzBCDFGHJKLMNPQRST';
    v4 = 'VXYZ$@#';
    for (i = 0; i < p.length; i++) {
      if (v1.indexOf(p[i]) != -1) l += 1;
      else if (v2.indexOf(p[i]) != -1) l += 2;
      else if (v3.indexOf(p[i]) != -1) l += 3;
      else if (v4.indexOf(p[i]) != -1) l += 4;
      else l += 5;
    }
    l *= 3;
    if (l > 100) l = 100;
    return l;
  }

  // var validarPass = function() {
  //
  //   if (passwordLevel(this.value) < 30) {
  //     console.log(this.value);
  //     $('#pwdInfo').show(100);
  //   } else {
  //     $('#pwdInfo').hide(100);
  //   }
  // }

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
    } else if (existeUsuario()) {
      e.preventDefault();
    } else if (passwordLevel(document.getElementById('pass').value) < 30) {
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
  // $('#pwdInfo').hide(0);
  // $('#pass').keyup(validarPass);

  for (var i = 0; i < elementos.length; i++) {
    if (elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "password") {
      elementos[i].addEventListener("focus", focusInput);
      elementos[i].addEventListener("blur", blurInput);
    }
  }

}())
