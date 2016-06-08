<?php require_once 'header.php'; ?>

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
            <h3>¿Dónde ir?</h3>
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
            <h3>¿Cómo llegar?</h3>
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


<?php include_once 'footer.php'; ?>
