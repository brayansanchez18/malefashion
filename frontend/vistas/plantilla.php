<?php
$frontend = Ruta::frontend();
$backend = Ruta::backend();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Male_Fashion Template" />
    <meta name="keywords" content="Male_Fashion, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Male-Fashion | sistema ecommerce</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?=$frontend?>vistas/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=$frontend?>vistas/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=$frontend?>vistas/css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?=$frontend?>vistas/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="<?=$frontend?>vistas/css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="<?=$frontend?>vistas/css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=$frontend?>vistas/css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=$frontend?>vistas/css/style.css" type="text/css" />
  </head>

  <body>
    <?php include_once 'modulos/header.php'; ?>
    <?php // include_once 'modulos/slide.php'; ?>
    <?php // include_once 'modulos/call-to-action.php'; ?>
    <?php // include_once 'modulos/destacados.php'; ?>
    <?php // include_once 'modulos/instagram-sec.php'; ?> 
    <?php //include_once 'modulos/soporte.php'; ?>
    <?php // include_once 'modulos/shop.php'; ?>
    <?php // include_once 'modulos/detalles.php'; ?>
    <?php // include_once 'modulos/carrito-compras.php'; ?>
    <?php //include_once 'modulos/sobre-nosotros.php'; ?>
    <?php include_once 'modulos/footer.php'; ?>

    <!-- Js Plugins -->
    <script src="<?=$frontend?>vistas/js/jquery-3.3.1.min.js"></script>
    <script src="<?=$frontend?>vistas/js/bootstrap.min.js"></script>
    <script src="<?=$frontend?>vistas/js/jquery.nice-select.min.js"></script>
    <script src="<?=$frontend?>vistas/js/jquery.nicescroll.min.js"></script>
    <script src="<?=$frontend?>vistas/js/jquery.magnific-popup.min.js"></script>
    <script src="<?=$frontend?>vistas/js/jquery.countdown.min.js"></script>
    <script src="<?=$frontend?>vistas/js/jquery.slicknav.js"></script>
    <script src="<?=$frontend?>vistas/js/mixitup.min.js"></script>
    <script src="<?=$frontend?>vistas/js/owl.carousel.min.js"></script>
    <script src="<?=$frontend?>vistas/js/main.js"></script>
  </body>
</html>