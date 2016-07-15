<?php
require_once 'constants.php';
require_once _dependencia_.'Objects/Usuario.php';
require_once _dependencia_.'Model/UsuarioModel.php';
session_start();
$url = _ROOT_;



$usuarioModel = new UsuarioModel();
$CanEdit = false;
if(isset($_SESSION['id_user'])){
  $u = $usuarioModel->getById($_SESSION['id_user']);
  $CanEdit = $u->Rol=='Administrador' or $u->Rol=="Editor";
}

?>
<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Vive mi Nicaragua</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="<?php echo $url ?>css/contenido.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/articulo.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/comment.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/main.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/galerias.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/formulario.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/comentario.css">

    <link rel="stylesheet" href="<?php echo $url ?>util/Iconos/fonts.css">
    <link rel="stylesheet" href="<?php echo $url ?>util/fancybox/source/jquery.fancybox.css" media="screen">
    <link rel="stylesheet" href="<?php echo $url ?>css/formulario.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/etc.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/table.css">
    <link rel="stylesheet" href="<?php echo $url ?>util/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $url ?>util/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
     <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')
    </script>



    <script type="text/javascript" src="<?php echo $url ?>util/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo $url ?>util/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="<?php echo $url ?>util/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="<?php echo $url ?>util/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript" src="<?php echo $url ?>util/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo $url ?>util/tinymce/js/tinymce/langs/es.js">

    </script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/bs-3.3.6/dt-1.10.11,r-2.0.2/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/t/bs-3.3.6/dt-1.10.11,r-2.0.2/datatables.min.js"></script> -->
    <script src="<?php echo $url ?>js/plugins.js"></script>
    <script src="<?php echo $url ?>js/main.js"></script>


</head>

<body>

    <!--[if lt IE 9]>
            <p class="browserupgrade">Estas usando un navegador <strong>obsoleto</strong>. Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> para optimizar tu experiencia</p>
        <![endif]-->

<header>
    <div class="menu_bar">
        <a href="<?php echo $url ?>index.php" class="logo-menu"><img src="<?php echo $url ?>img/text43.png" alt="Vive mi Nicaragua" /></a>

        <a href="#" class="bt-menu"><span class="icon-menu"></span></a>
    </div>



    <nav>
        <div id="logo">
            <a href="<?php echo $url ?>index.php"><img src="<?php echo $url ?>img/text43.png" alt="Vive mi Nicaragua" /></a>
        </div>
        <ul>
            <li><a href="<?php echo $url ?>index.php"><span class="icon-home3"></span>Inicio</a></li>

            <li class="submenu">
                <a href="#"><span class="icon-library"></span>Ciudades <span class="caret icon-circle-down"></span></a>

                <ul class="children">
                    <li><a href="<?php echo $url ?>view/ciudades/leon.php">León <span class="icon-pushpin"></span></a></li>
                    <li><a href="<?php echo $url ?>view/ciudades/matagalpa.php">Matagalpa <span class="icon-pushpin"></span></a></li>
                    <li><a href="<?php echo $url ?>view/ciudades/masaya.php">Masaya <span class="icon-pushpin"></span></a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#"><span class="icon-images"></span>Galeria <span class="caret icon-circle-down"></a>

                <ul class="children">
                    <li><a href="<?php echo $url ?>view/galeria/galeria_img.php">Imágenes <span class="icon-camera"></span></a></li>
                    <li><a href="<?php echo $url ?>view/galeria/galeria_vid.php">Videos <span class="icon-video-camera"></span></a></li>
                </ul>
            </li>

            <li><a href="#"><span class="icon-pacman"></span>Nosotros</a></li>

            <?php if (!isset($_SESSION['id_user'])): ?>
              <li id="registrate"><a data-fancybox-type="iframe" href="<?php echo $url ?>view/usuario/singup.php" class="fancybox">Regístrate</a></li>
              <li id="ya-tengo"><a  href="<?php echo $url ?>view/usuario/singin.php">Ya tengo una cuenta</a></li>
            <?php endif; ?>


            <?php if ($CanEdit): ?>
              <li>
                <a href="<?php echo $url ?>view/contenido">
                    <i class="fa fa-glide" aria-hidden="true"></i>
                    Admin Contenido
                </a>
              </li>
            <?php endif; ?>

            <?php if (isset($_SESSION['id_user'])): ?>
            <li class="submenu" id="usuario">
                <a href="#">

                    <img src="<?php echo $url ?><?php echo $_SESSION['foto'] ?>" alt="" style="width: 1.2em; height: 1.2em; background-repeat: no-repeat;
                    background-position: 50%;
                    border-radius: 50%;
                    background-size: 100% auto;
                    float: left;
                    top: 0px;"
                     />

                    <?php echo $_SESSION['nombre']?>

                    <span class="caret icon-circle-down"></span>
                  </a>

                <ul class="children">
                    <li><a href="<?php echo $url ?>view/usuario/edit-profile.php">Editar <span class="icon-cog"></span></a></li>
                    <li><a href="<?php echo $url ?>Controller/Usuario/logout.php">Cerrar Sesion <span class="icon-switch"></span></a></li>
                </ul>

            </li>

          <?php endif; ?>
        </ul>
    </nav>
</header>
