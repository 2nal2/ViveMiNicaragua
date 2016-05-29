(function() {

    var focusInput = function() {
      $(this).parent().find('label').attr('class', "label active");
      $(this).parent().find('input').removeClass("error");
    };

    var blurInput = function() {
      if (this.value <= 0) {
        $(this).parent().find('label').attr('class', "label");
        $(this).parent().find('input').addClass("error");
      }
    };

    $inputs = $('input');

    for (var i = 0; i < $inputs.length; i++) {
      if ($inputs.eq(i).attr('type') == 'text' || $inputs.eq(i).attr('type') == 'email' || $inputs.eq(i).attr('type') == 'password') {
        $inputs.eq(i).focus(focusInput);
        $inputs.eq(i).blur(blurInput);
      }
    }

    //Validacion de formularios especificos------------------

    var validarInputs = function(elementos) {
      for (var i = 0; i <= elementos.length; i++) {
        if (elementos.eq(i).attr('type') == "text" ||
          elementos.eq(i).attr('type') == "email") {
          console.log('entre aqui');
          if (elementos.eq(i).val() == 0) {
            console.log('El campo ' + elementos.eq(i).attr('name') + ' esta vacio');
            elementos.eq(i).addClass(" error");
            return false;
          } else {
            elementos.eq(i).removeClass("error");
          }
        }
      }
      return true;

    };

    var validarRadio = function(elementos) {
      var resultado = false;

      for (var i = 0; i < elementos.length; i++) {
        if (elementos.eq(i).is(':checked')) {
          console.log('hay un checked');
          resultado = true;
          break;
        }
      }

      if (resultado == false) {
        elementos.eq(0).parent().addClass('error');
        console.log('No se ha definido sexo');
        return false;
      } else {
        elementos.eq(0).parent().removeClass('error');
        return true;
      }

      return true; //agregado por mi
    };

    var comprobarPass = function(elementos){
      console.log('entre aqui');
      ;
      if (elementos[1].value != elementos[2].value) {
        console.log('validado');

        elementos[1].value = "";
        elementos[2].value = "";

        elementos[1].className = elementos[1].className + " error";
        elementos[2].className = elementos[2].className + " error";

        $('#pwdNotMatch').show(100);
        return false;
      } else {
        elementos[1].className = elementos[1].className.replace(" error", "");
        elementos[2].className = elementos[2].className.replace(" error", "");
        $('#pwdNotMatch').hide(100);
        return true;
      }
    }


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




    // $('#formulario_info input, #formId select').each(
    //   function(index) {
    //     var input = $(this);
    //     alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
    //   }
    // );


    $("#formulario_info").submit(
      function(event) {
        var elementos = $(this).find('input');
        console.log(elementos.length);
        if (!validarInputs(elementos)) {
          console.log("Falto validar Inputs");
          event.preventDefault();
        } else if (!validarRadio($(this).find('input[type=radio]'))) {
          console.log("Falto validar Radios");
          event.preventDefault();
        } else if (existeUsuario()) {
          event.preventDefault();
          // } else if (passwordLevel($(this).find('input[name=pass]').eq(0).val()) < 30) {
          //   event.preventDefault();
        } else {
          console.log("Enviado Correctamente");
        }
      }
    );

    $('#formulario_passwd').submit(

      function(event){
        var elementos = $(this).find('input[type=password]');
        console.log(elementos.length);
        if (!comprobarPass(elementos)) {
          console.log("Falto validar password");
          event.preventDefault();
        } else {
          console.log("Enviado Correctamente");
        }
      }
    );



  }

  ());
