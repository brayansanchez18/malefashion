<?php

if (isset($rutas[1])) {
  if (isset($rutas[2])) {
    if ($rutas[2] == 'antiguos') {
      $modo = 'ASC';
      $_SESSION['ordenar'] = 'ASC';
    } else {
      $modo = 'DESC';
      $_SESSION['ordenar'] = 'DESC';
    }
  } else {
    $modo = $_SESSION['ordenar'];
  }

  $base = ($rutas[1] - 1) * 12;
  $tope = 12;
} else {
  $rutas[1] = 1;
  $base = 0;
  $tope = 12;
  $modo = 'DESC';
}

$productos = null;
$listaProductos = null;

$ordenar = 'id';

if (isset($rutas[2])) {

  $busqueda = $rutas[2];
  $productos = ControladorProductos::ctrBuscarProductos($busqueda, $ordenar, $modo, $base, $tope);
  $listaProductos = ControladorProductos::ctrListarProductosBusqueda($busqueda);
}

$estado = 0;
$item = null;
$valor = null;
$categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__text">
          <h4><span class="pagActiva text-capitalize">Resultados de: <?= $rutas[2] ?></span></h4>
          <div class="breadcrumb__links">
            <a href="<?= $frontend ?>">Inicio</a>
            <span class="pagActiva text-capitalize"><?= $rutas[0] ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<?php if (!$productos) : ?>
  <section class="shop spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="shop__sidebar">
            <div class="shop__sidebar__accordion">
              <div class="accordion" id="accordionExample">

                <?php foreach ($categorias as $key => $value) : ?>
                  <?php if ($value['estado'] != 0) : ?>
                    <div class="card">
                      <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapse<?= $value['id'] ?>"><?= $value['categoria'] ?></a>
                      </div>
                      <div id="collapse<?= $value['id'] ?>" class="collapse" data-parent="#accordionExample">
                        <div class="card-body">
                          <div class="shop__sidebar__categories">

                            <?php
                            $item = 'id_categoria';
                            $valor = $value['id'];
                            $subCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
                            ?>

                            <ul class="nice-scroll">
                              <?php foreach ($subCategorias as $key => $value) : ?>
                                <?php if ($value['estado'] != 0) : ?>
                                  <li><a href="<?= $frontend . $value['ruta'] ?>"><?= $value['subcategoria'] ?></a></li>
                                <?php endif ?>
                              <?php endforeach ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 error404 text-center">
          <h1><small>¡Oops!</small></h1>
          <h2>No se encontraron productos <br> relacionados con tu busqueda</h2>
        </div>
      </div>
    </div>
  </section>
<?php else : ?>
  <?php $estado = 1; ?>
  <section class="shop spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="shop__sidebar">
            <div class="shop__sidebar__accordion">
              <div class="accordion" id="accordionExample">

                <?php foreach ($categorias as $key => $value) : ?>
                  <?php if ($value['estado'] != 0) : ?>
                    <div class="card">
                      <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapse<?= $value['id'] ?>"><?= $value['categoria'] ?></a>
                      </div>
                      <div id="collapse<?= $value['id'] ?>" class="collapse" data-parent="#accordionExample">
                        <div class="card-body">
                          <div class="shop__sidebar__categories">

                            <?php
                            $item = 'id_categoria';
                            $valor = $value['id'];
                            $subCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
                            ?>

                            <ul class="nice-scroll">
                              <?php foreach ($subCategorias as $key => $value) : ?>
                                <?php if ($value['estado'] != 0) : ?>
                                  <li><a href="<?= $frontend . $value['ruta'] ?>"><?= $value['subcategoria'] ?></a></li>
                                <?php endif ?>
                              <?php endforeach ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="row">
            <?php foreach ($productos as $key => $value) : ?>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item <?= ($value['oferta'] != 0) ? 'sale' : '' ?>">
                  <div class="product__item__pic set-bg" data-setbg="<?= $backend . $value['portada'] ?>">
                    <?= ($value['oferta'] != 0) ? '<span class="label">Oferta</span>' : '' ?>
                    <ul class="product__hover">
                      <li>
                        <a href="#"><img src="<?= $backend ?>vistas/img/icon/heart.png" alt="" /></a>
                      </li>
                    </ul>
                  </div>
                  <div class="product__item__text">
                    <h6><?= $value['titulo'] ?></h6>
                    <a href="<?= $frontend . $value['ruta'] ?>" class="add-cart">Ver Producto</a>
                    <?php if ($value['precio'] == 0) : ?>
                      <h5>GRATIS</h5>
                    <?php else : ?>
                      <h5>$<?= ($value['oferta'] != 0) ? number_format($value['precioOferta'], 2) : number_format($value['precio'], 2) ?> <?= $divisa ?></h5>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="product__pagination">
                <?php if (count($listaProductos) != 0) : ?>
                  <?php $pagProductos = ceil(count($listaProductos) / 12); ?>
                  <?php if ($pagProductos > 4) : ?>
                    <?php if ($rutas[1] == 1) : ?>
                      <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <a id="item<?= $i ?>" href="<?= $frontend . $rutas[0] ?>/<?= $i ?>"><?= $i ?></a>
                      <?php endfor ?>
                      <a>...</a>
                      <a id="item<?= $pagProductos ?>" href="<?= $frontend . $rutas[0] ?>/<?= $pagProductos ?>"><?= $pagProductos ?></a>
                      <a href="<?= $frontend . $rutas[0] ?>/2"><i class="fa fa fa-angle-right"></i></a>
                    <?php elseif ($rutas[1] != $pagProductos && $rutas[1] != 1 && $rutas[1] <  ($pagProductos / 2) && $rutas[1] < ($pagProductos - 3)) : ?>
                      <?php $numPagActual = $rutas[1]; ?>
                      <a href="<?= $frontend . $rutas[0] ?>/<?= ($numPagActual - 1) ?>"><i class="fa fa-angle-left"></i></a>

                      <?php for ($i = $numPagActual; $i <= ($numPagActual + 3); $i++) : ?>
                        <a id="item<?= $i ?>" href="<?= $frontend . $rutas[0] ?>/<?= $i ?>"><?= $i ?></a>
                      <?php endfor ?>
                      <a>...</a>
                      <a id="item<?= $pagProductos ?>" href="<?= $frontend . $rutas[0] ?>/<?= $pagProductos ?>"><?= $pagProductos ?></a>
                      <a href="<?= $frontend . $rutas[0] ?>/<?= ($numPagActual + 1) ?>"><i class="fa fa-angle-right"></i></a>
                    <?php elseif ($rutas[1] != $pagProductos && $rutas[1] != 1 && $rutas[1] >=  ($pagProductos / 2) && $rutas[1] < ($pagProductos - 3)) : ?>
                      <?php $numPagActual = $rutas[1]; ?>
                      <a href="<?= $frontend . $rutas[0] ?>/<?= ($numPagActual - 1) ?>"><i class="fa fa-angle-left"></i></a>
                      <a id="item1" href="<?= $frontend . $rutas[0] ?>/1">1</a>
                      <a>...</a>

                      <?php for ($i = $numPagActual; $i <= ($numPagActual + 3); $i++) : ?>
                        <a id="item<?= $i ?>" href="<?= $frontend . $rutas[0] ?>/<?= $i ?>"><?= $i ?></a>
                      <?php endfor ?>
                      <a href="<?= $frontend . $rutas[0] ?>/<?= ($numPagActual + 1) ?>"><i class="fa fa-angle-right"></i></a>
                    <?php else : ?>
                      <?php $numPagActual = $rutas[1]; ?>
                      <a href="<?= $frontend . $rutas[0] ?>/<?= ($numPagActual - 1) ?>"><i class="fa fa-angle-left"></i></a>
                      <a href="<?= $frontend . $rutas[0] ?>/1">1</a>
                      <a>...</a>

                      <?php for ($i = ($pagProductos - 3); $i <= $pagProductos; $i++) : ?>
                        <a id="item<?= $i ?>" href="<?= $frontend . $rutas[0] ?>/<?= $i ?>"><?= $i ?></a>
                      <?php endfor ?>
                    <?php endif ?>
                  <?php else : ?>
                    <?php for ($i = 1; $i <= $pagProductos; $i++) : ?>
                      <a id="item<?= $i ?>" href="<?= $frontend . $rutas[0] ?>/<?= $i ?>"><?= $i ?></a>
                    <?php endfor ?>
                  <?php endif ?>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>