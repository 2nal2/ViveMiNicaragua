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

<section class="fullScreen" id="index">
    <div class="mensajePrincipal roboto">
        <h2>Conoce un nuevo modo de vivir Nicaragua</h2>
        <div>
            <?php if(!isset($_SESSION['id_user'])): ?>
              <a data-fancybox-type="iframe" href="singup.php" class="fancybox" id="registrate">Registrate</a>
            <?php endif; ?>
            <a id="vive" href="#">Vive</a>
        </div>
    </div>
</section>

<section id="ciudades" class="fullScreen">
    <div class="tercio terCiud">
        <a href="#"><img src="img/ciudades/tercio1.JPG" alt="Leon" /></a>
    </div>
    <div class="tercio terCiud">
        <a href="#"><img src="img/ciudades/tercio2.JPG" alt="Masaya" /></a>
    </div>
    <div class="tercio terCiud">
        <a href="#"><img src="img/ciudades/tercio3.jpg" alt="Matagalpa" /></a>
    </div>
</section>


    <script type="text/x-jquery-tmpl" id="servicioTemplate">
            <div>
                <div class="ribbon"></div>
                <h3>${nombre}</h3>
                <p>
                    <strong>Que es esto?</strong>
                </p>
                <p>
                    ${informacion}
                </p>

                <a class="ver-mas" id="regresar">Regresar</a>
            </div>
        </script>


<section id="servicios" class="fullScreen roboto">
    <div class="marginTop">
        <div class="servicio">
            <div class="ribbon"></div>
            <h3>A donde y por que ir?</h3>
            <p>
                <img src="img/flat/donde.png" alt="" />
            </p>
            <a href="#" class="ver-mas" data-number='0'>Saber mas</a>
        </div>

        <div class="servicio">
            <div class="ribbon"></div>
            <h3>Como llegar?</h3>
            <p>
                <img src="img/flat/como.png" alt="" />
            </p>
            <a href="#" class="ver-mas" data-number='1'>Saber mas</a>
        </div>

        <div class="servicio">
            <div class="ribbon"></div>
            <h3>Galer'ia</h3>
            <p>
                <img src="img/flat/galeria.png" alt="" />
            </p>
            <a href="#" class="ver-mas" data-number='2'>Saber mas</a>
        </div>
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

</body>

</html>
