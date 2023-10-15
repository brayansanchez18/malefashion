<?php
$frontend = Ruta::frontend();
$backend = Ruta::backend();
$comercio = ControladorPlantilla::ctrMostrarDivisa();
$divisa = $comercio['divisa'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Male_Fashion Template" />
  <meta name="keywords" content="Male_Fashion, unica, creative, html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <?php

  /*============================================
	=            MARCADO DE CABECERAS            =
	============================================*/

  $rutas = [];

  if (isset($_GET['ruta'])) {
    $rutas = explode('/', $_GET['ruta']);
    $ruta = $rutas[0];
  } else {
    $ruta = 'inicio';
  }

  $cabeceras = ControladorPlantilla::ctrTraerCabeceras($ruta);

  if (!is_array($cabeceras)) {
    $ruta = 'inicio';
    $cabeceras = ControladorPlantilla::ctrTraerCabeceras($ruta);
  }

  /*=====  End of MARCADO DE CABECERAS  ======*/

  ?>

  <!--===================================
	=            Marcado HTML5            =
	====================================-->
  <meta name="title" content="<?= $cabeceras['titulo'] ?>">
  <meta name="description" content="<?= $cabeceras['descripcion'] ?>">
  <meta name="keyword" content="<?= $cabeceras['palabrasClaves'] ?>">
  <title><?= $cabeceras['titulo']; ?></title>
  <!--====  End of Marcado HTML5  ====-->

  <!--====================================================
	=            Marcado de Open Graph FACEBOOK            =
	=====================================================-->

  <meta property="og:title" content="<?= $cabeceras['titulo']; ?>">
  <meta property="og:url" content="<?= $frontend . $cabeceras['ruta']; ?>">
  <meta property="og:description" content="<?= $cabeceras['descripcion']; ?>">
  <meta property="og:image" content="<?= $cabeceras['portada']; ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Tu logo">
  <meta property="og:locale" content="es_MX">

  <!--====  End of Marcado de Open Graph FACEBOOK  ====-->

  <!--========================================
	=            Marcado de TWITTER            =
	=========================================-->

  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?= $cabeceras['titulo']; ?>">
  <meta name="twitter:url" content="<?= $frontend . $cabeceras['ruta']; ?>">
  <meta name="twitter:description" content="<?= $cabeceras['descripcion']; ?>">
  <meta name="twitter:image" content="<?= $cabeceras['portada']; ?>">
  <meta name="twitter:site" content="@tu-usuario">

  <!--====  End of Marcado de TWITTER  ====-->

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- Css Styles -->
  <link rel="stylesheet" href="<?= $frontend ?>vistas/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= $frontend ?>vistas/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= $frontend ?>vistas/css/elegant-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?= $frontend ?>vistas/css/magnific-popup.css" type="text/css" />
  <link rel="stylesheet" href="<?= $frontend ?>vistas/css/nice-select.css" type="text/css" />
  <link rel="stylesheet" href="<?= $frontend ?>vistas/css/owl.carousel.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= $frontend ?>vistas/css/slicknav.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= $frontend ?>vistas/css/style.css" type="text/css" />
</head>

<body>
  <?php

  include_once 'modulos/header.php';

  /* -------------------------------------------------------------------------- */
  /*                             CONTENIDO DINAMICO                             */
  /* -------------------------------------------------------------------------- */

  $rutas = [];
  $ruta = null;
  $infoProductos = null;

  if (isset($_GET['ruta'])) {
    $rutas = explode('/', $_GET['ruta']);
    $item = 'ruta';
    $valor = $rutas[0];

    /* -------------------------------------------------------------------------- */
    /*                        URL'S AMIGABLES DE CATEGORIAS                       */
    /* -------------------------------------------------------------------------- */

    $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

    if (is_array($rutaCategorias) && $valor == $rutaCategorias['ruta'] && $rutaCategorias['estado'] == 1) {
      $ruta = $valor;
    }

    /* ---------------------- URL'S AMIGABLES DE CATEGORIAS --------------------- */

    /* -------------------------------------------------------------------------- */
    /*                      URL'S AMIGABLES DE SUB-CATEGORIAS                     */
    /* -------------------------------------------------------------------------- */

    $rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

    foreach ($rutaSubCategorias as $key => $value) {
      if (is_array($value) && $valor == $value['ruta'] && $value['estado'] == 1) {
        $ruta = $valor;
      }
    }

    /* -------------------- URL'S AMIGABLES DE SUB-CATEGORIAS ------------------- */

    /* -------------------------------------------------------------------------- */
    /*                        URL'S AMIGABLES DE PRODUCTOS                        */
    /* -------------------------------------------------------------------------- */

    $rutaProductos = ControladorProductos::ctrMostrarInfoproducto($item, $valor);

    if (is_array($rutaProductos) && $rutas[0] == $rutaProductos['ruta'] && $rutaProductos['estado'] == 1) {
      $infoProductos = $valor;
    }

    /* ---------------------- URL'S AMIGABLES DE PRODUCTOS ---------------------- */

    /* -------------------------------------------------------------------------- */
    /*                               URL'S AMIGABLES                              */
    /* -------------------------------------------------------------------------- */

    if (
      $ruta != null || $rutas[0] == 'articulos-recientes' || $rutas[0] == 'lo-mas-vendido' || $rutas[0] == 'lo-mas-visto'
    ) {

      include_once 'modulos/productos.php';
    } else if ($infoProductos != null) {

      include 'modulos/detalles.php';
    } else if (
      $rutas[0] == 'buscador' || $rutas[0] == 'verificar' || $rutas[0] == 'salir' || $rutas[0] == 'perfil' || $rutas[0] == 'carrito-compras' || $rutas[0] == 'error' || $rutas[0] == 'finalizar-compra' || $rutas[0] == 'ofertas' || $rutas[0] == 'cancelado' || $rutas[0] == 'soporte' || $rutas[0] == 'tienda' || $rutas[0] == 'sobre-nosotros'
    ) {

      include 'modulos/' . $rutas[0] . '.php';
    } else if ($rutas[0] == 'inicio') {

      include 'modulos/slide.php';
      include_once 'modulos/call-to-action.php';
      include 'modulos/destacados.php';
      include_once 'modulos/instagram-sec.php';
    } else {

      include 'modulos/error404.php';
    }

    /* ----------------------------- URL'S AMIGABLES ---------------------------- */
  } else {
    include 'modulos/slide.php';
    include_once 'modulos/call-to-action.php';
    include 'modulos/destacados.php';
    include_once 'modulos/instagram-sec.php';
  }

  include_once 'modulos/footer.php';

  /* --------------------------- CONTENIDO DINAMICO --------------------------- */

  ?>

  <input type="hidden" value="<?= $frontend ?>" id="rutaOculta">

  <!-- Js Plugins -->
  <script src="<?= $frontend ?>vistas/js/jquery-3.3.1.min.js"></script>
  <script src="<?= $frontend ?>vistas/js/bootstrap.min.js"></script>
  <script src="<?= $frontend ?>vistas/js/jquery.nice-select.min.js"></script>
  <script src="<?= $frontend ?>vistas/js/jquery.nicescroll.min.js"></script>
  <script src="<?= $frontend ?>vistas/js/jquery.magnific-popup.min.js"></script>
  <script src="<?= $frontend ?>vistas/js/jquery.countdown.min.js"></script>
  <script src="<?= $frontend ?>vistas/js/jquery.slicknav.js"></script>
  <script src="<?= $frontend ?>vistas/js/mixitup.min.js"></script>
  <script src="<?= $frontend ?>vistas/js/owl.carousel.min.js"></script>
  <script src="<?= $frontend ?>vistas/js/main.js"></script>
</body>

</html>