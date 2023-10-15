<?php

$item = null;
$valor = null;
$categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

$base = 0;
$tope = 12;

$ordenar = 'id';
$item = 'estado';
$valor = 1;
$modo = 'DESC';
$productos_tienda = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__text">
          <h4><span class="pagActiva text-capitalize"><?= $rutas[0] ?></span></h4>
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

<!-- Shop Section Begin -->
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
          <?php foreach ($productos_tienda as $key => $value) : ?>
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
      </div>
    </div>
  </div>
</section>
<!-- Shop Section End -->