<?php include('header.php'); ?>

<div class="slider_container fullScreen">
    <div class="slideContainer">
        <div class="slide fullScreen" data-background="img/portadas/portada1.JPG"></div>
        <div class="slide fullScreen" data-background="img/portadas/portada2.JPG"></div>
        <div class="slide fullScreen" data-background="img/portadas/portada3.jpg"></div>
        <div class="slide fullScreen" data-background="img/portadas/portada4.JPG"></div>
        <div class="slide fullScreen" data-background="img/portadas/portada5.JPG"></div>
        <div class="slide fullScreen" data-background="img/portadas/portada6.jpg"></div>
    </div>
</div>

<section class="fullScreen" id="index" >
    <div class="mensajePrincipal roboto">
        <h2>Conoce un nuevo modo de vivir Nicaragua</h2>
        <div id="inicios">
            <?php if(!isset($_SESSION['id_user'])): ?>
              <a data-fancybox-type="iframe" href="singup.php" class="fancybox" id="registrate">Regístrate</a>
            <?php endif; ?>
            <a id="vive" href="#ciudades">Vive</a>
        </div>
    </div>
</section>

<section id="ciudades" class="fullScreen" data-stellar-background-ratio="0.4">
    <div class="tercio terCiud">
        <a href="#">
            <div class="filt" style="background-image: url(img/ciudades/tercio1.JPG)">
                <h2>León</h2>
            </div>
        </a>
    </div>

    <div class="tercio terCiud">
        <a href="#">
            <div class="filt" style="background-image: url(img/ciudades/tercio2.JPG)">
                <h2>Masaya</h2>
            </div>
        </a>
    </div>

    <div class="tercio terCiud">
        <a href="#">
            <div class="filt" style="background-image: url(img/ciudades/tercio3.jpg)">
                <h2>Matagalpa</h2>
            </div>
        </a>
    </div>
</section>


    <script type="text/x-jquery-tmpl" id="servicioTemplate">
            <div class=¨marginTop roboto¨>
                <div class="ribbon"></div>
                <h3>${nombre}</h3>
                <p class="parrafo">
                    ${informacion}
                </p>
                <p class="marginTop">
                  <a href="${link}" class="ir">Ir a ello</a>
                </p>
                <a id="regresar">Regresar</a>
            </div>
        </script>


<section id="servicios" class="fullScreen roboto">
    <div class="marginTop">
        <div class="servicio">
            <div class="ribbon"></div>
            <h3>¿A donde ir?</h3>
            <p>
                <img src="img/flat/donde.png" alt="" />
            </p>
            <p>
              <a href="#" class="ir">Ir a ello</a>
            </p>
            <a class="ver-mas" data-number='0'>Saber mas</a>
        </div>

        <div class="servicio">
            <div class="ribbon"></div>
            <h3>¿Como llegar?</h3>
            <p>
                <img src="img/flat/como.png" alt="" />
            </p>
            <p>
              <a href="#" class="ir">Ir a ello</a>
            </p>
            <a class="ver-mas" data-number='1'>Saber mas</a>
        </div>

        <div class="servicio">
            <div class="ribbon"></div>
            <h3>Galería</h3>
            <p>
                <img src="img/flat/galeria.png" alt="" />
            </p>
            <p>
              <a href="#" class="ir">Ir a ello</a>
            </p>
            <a class="ver-mas" data-number='2'>Saber mas</a>
        </div>
    </div>
</section>

<section id="foot" class="roboto">
    <div id="redes">
        <p>
            Siguenos en:
            <a href="#" target="_blank" id="fb"><span class="icon-facebook2"></span></a>
            <a href="#" target="_blank" id="tw"><span class="icon-twitter"></span></a>
            <a href="#" target="_blank" id="yt"><span class="icon-youtube"></span></a>
            <a href="#" target="_blank" id="pint"><span class="icon-pinterest"></span></a>
        </p>
    </div>
    <div class="tercio" id="inf">
        <h4>Información</h4>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
    <div class="tercio" id="recom">
        <h4>Paginas Recomendadas</h4>
        <ul>
            <li><a href="http://infonica.tk/">Infonica</a></li>
            <li><a href="http://www.bacanalnica.com/">Bacanalnica.com</a></li>
            <li><a href="http://www.visitanicaragua.com/">VisitaNicaragua</a></li>
            <li><a href="https://vianica.com/sp/">Vianica.com</a></li>
        </ul>
    </div>
    <div class="tercio" id="traducir">
        <h4>Traducir esta Página</h4>
    </div>
</section>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <!--<script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>-->

<script src="util/uiflip/jquery.ui.core.min.js"></script>
<script src="util/uiflip/jquery.ui.effect.min.js"></script>
<script src="util/uiflip/jquery.flip.min.js"></script>

<script src="js/jquery.tmpl.min.js"></script>

<script src="js/scrollto.min.js"></script>
<script src="js/localscroll.min.js"></script>
<script src="js/jquery.scrollorama.js"></script>
<script src="js/stellar.min.js"></script>

</body>

<footer>
    Copyright © 2016 WebDreamers Limited. Cardoza, Dominguez, Larios, Vargas. Todos los derechos reservados.
</footer>

</html>
