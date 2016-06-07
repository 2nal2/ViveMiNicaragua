<?php session_start(); ?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Vive mi Nicaragua</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="util/Iconos/fonts.css">
    <link rel="stylesheet" href="util/fancybox/source/jquery.fancybox.css" media="screen">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/etc.css">
    <!-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="util/fancybox/source/jquery.fancybox.pack.js"></script>

    <link rel="stylesheet" href="util/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <script type="text/javascript" src="util/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="util/fancybox/source/helpers/jquery.fancybox-media.js"></script>

    <link rel="stylesheet" href="util/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <script type="text/javascript" src="util/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>



</head>

<body>

    <!--[if lt IE 9]>
            <p class="browserupgrade">Estas usando un navegador <strong>obsoleto</strong>. Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> para optimizar tu experiencia</p>
        <![endif]-->

<header>
    <div class="menu_bar">
        <a href="index.php" class="logo-menu"><img src="img/text42.png" alt="Vive mi Nicaragua" /></a>

        <a href="#" class="bt-menu"><span class="icon-menu"></span></a>
    </div>



    <nav>
        <div id="logo">
            <a href="index.php"><img src="img/text42.png" alt="Vive mi Nicaragua" /></a>
        </div>
        <ul>
            <li><a href="#"><span class="icon-home3"></span>Inicio</a></li>

            <li class="submenu">
                <a href="#"><span class="icon-library"></span>Ciudades <span class="caret icon-circle-down"></span></a>

                <ul class="children">
                    <li><a href="#">Le'on <span class="icon-pushpin"></span></a></li>
                    <li><a href="#">Matagalpa <span class="icon-pushpin"></span></a></li>
                    <li><a href="#">Masaya <span class="icon-pushpin"></span></a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#"><span class="icon-images"></span>Galeria <span class="caret icon-circle-down"></a>

                <ul class="children">
                    <li><a href="#">Imagenes <span class="icon-camera"></span></a></li>
                    <li><a href="#">Videos <span class="icon-video-camera"></span></a></li>
                </ul>
            </li>

            <li><a href="#"><span class="icon-pacman"></span>Nosotros</a></li>

            <?php if (!isset($_SESSION['id_user'])): ?>
              <li id="registrate"><a data-fancybox-type="iframe" href="singup.php" class="fancybox">Registrate</a></li>
              <li class="submenu" id="ya-tengo"><a href="#">Ya tengo una cuenta</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['id_user'])): ?>
            <li class="submenu" id="usuario">
                <a href="#">

                    <img src="<?php echo $_SESSION['foto'] ?>" alt="" style="width: 2em; height: 2em; background-repeat: no-repeat;
                    background-position: 50%;
                    border-radius: 50%;
                    background-size: 100% auto;" />
                    <?php echo $_SESSION['nombre']?>

                    <span class="caret icon-circle-down"></a>

                <ul class="children">
                    <li><a href="edit-profile.php">Editar <span class="icon-cog"></span></a></li>
                    <!-- <li><a href="#">Dar de baja <span class="icon-user-minus"></span></a></li> -->
                    <li><a href="Controller/Usuario/logout.php">Cerrar Sesion <span class="icon-switch"></span></a></li>
                </ul>

            </li>

          <?php endif; ?>
        </ul>
    </nav>
</header>
