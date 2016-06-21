$('.respuesta').each(
  function(i,e){
    $(e).click(
      function(){
        $(this).next().toggleClass('mostrar');
      }
    );
  }

);
