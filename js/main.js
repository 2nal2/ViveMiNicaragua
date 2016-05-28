$(document).ready(main);

var contador = 1;
var pos = 0;
var intv;
var flippedElement;


var opcionesServicio = [

    {
        nombre: 'A donde ir?',
        informacion: 'Te brindamos las mejores opciones para pasar un buen momento, lugares hermosos que conocer, lugares para crear momorias y enamorarte cada vez mas de Nicaragua',
        link: '#'
    },

    {
        nombre: 'Como llegar?',
        informacion: 'No te dejaremos solo en este viaje, aunque perderse en Nicaragua es una dicha, queremos que regreses bien a casa; asi que que mostraremos como llegar a esos lugares que te haran vivir Nicaragua, contandote que medios puedes usar para ello',
        link: '#'
    },

    {
        nombre: 'Galería',
        informacion: 'No hablamos solo por hablar, si te decimos que estos son sitios magicos es porque ya lo vivimos en carne propia, te mostraremos todo loq ue tuvimos la dicha de ver, para que tu tambien nos cuentes tu experiencia',
        link: '#'
    }
];

function main() {
    $('.bt-menu').click(function() {
        if (contador == 1) {
            $('nav').animate({
                left: '0'
            });
            contador = 0;
        } else {
            contador = 1;
            $('nav').animate({
                left: '-100%'
            });

        }
    });

    $('.submenu').click(function() {
        $(this).children('.children').slideToggle();
    });

    $.stellar({
        'horizontalScrolling': false,
        hideDistantElements: false
    });

    var sc = $.scrollorama({
        blocks: '.fullScreen',
        enablePin: false
    });
    sc.animate('.mensajePrincipal', {
        delay: 1000,
        duration: 700,
        property: 'top',
        end: 500
    });
    sc.animate('.servicio', {
        delay: 400,
        duration: 500,
        property: 'zoom',
        start: 0.5,
        end: 1
    });

    $('#inicios').localScroll();

    $(".fancybox").fancybox({
        width: '70%',
        //height: '70%',
        maxWidth: 800,
        //maxHeight: 600,
        fitToView: false,
        autoSize: true,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
    });

    $('.slider_controls li').on('click', handleClick);
    var width = $('.slider_container').width();
    $('.slide').each(function(i, e) {
        var url = $(e).data('background');
        $(e).css('width', width + 'px');
        $(e).css('background-image', "url(" + url + ")");
    });

    $(document).on('click', '.ver-mas', flipElement);

    //clearInterval(intv);
    intv = setInterval(handleClick, 7000)
}

function flipElement() {
    if (flippedElement != null) {
        $(flippedElement).revertFlip();
        flippedElement = null;
    }
    $(flippedElement).remove();
    var padre = $(this).parent();
    flippedElement = padre;
    $('#servicioTemplate').template("CompiledTemplate");
    $(padre).flip({
        direction: 'rl',
        speed: 500,
        content: $('#servicioTemplate').tmpl(opcionesServicio[$(this).data('number')]).html(),
        color: '#fff',
        onEnd: function() {
            $('#regresar').on('click', function() {
                $(flippedElement).revertFlip();
                flippedElement = null;
            })
        }
    });
}

function handleClick() {
    var slide_target = 0;
    if ($(this).parent().hasClass('slider_controls')) {
        slide_target = $(this).index();
        pos = slide_target;
        clearInterval(intv);
        intv = setInterval(handleClick, 7000)
    } else {
        pos++;
        if (pos >= $('.slide').length) {
            pos = 0;
        }
        slide_target = pos;
    }

    $('.slideContainer').fadeOut('slow', function() {
        $(this).animate({
            'margin-left': -(slide_target * $('.slider_container').width()) + 'px'
        }, 'slow', function() {
            $(this).fadeIn();
        });
    });
}
