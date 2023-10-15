<?php
$base = 0;
$tope = 8;

$ordenar = 'Rand()';
$item = 'estado';
$valor = 1;
$modo = 'DESC';

$destacados = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);
?>
<!-- Product Section Begin -->
<section class="product spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="instagram__text">
          <h2 class="text-center">Productos Destacados</h2>
        </ul>
      </div>
    </div>
    <div class="row product__filter">

      <?php foreach ($destacados as $key => $value) : ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
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

      <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
        <div class="product__item">
          <div class="product__item__pic set-bg" data-setbg="<?= $backend ?>vistas/img/product/product-2.jpg">
            <ul class="product__hover">
              <li>
                <a href="#"><img src="<?= $backend ?>vistas/img/icon/heart.png" alt="" /></a>
              </li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6>Piqué Biker Jacket</h6>
            <a href="#" class="add-cart">Ver Producto</a>
            <h5>$67.24 MXN</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
        <div class="product__item sale">
          <div class="product__item__pic set-bg" data-setbg="<?= $backend ?>vistas/img/product/product-3.jpg">
            <span class="label">Sale</span>
            <ul class="product__hover">
              <li>
                <a href="#"><img src="<?= $backend ?>vistas/img/icon/heart.png" alt="" /></a>
              </li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6>Multi-pocket Chest Bag</h6>
            <a href="#" class="add-cart">Ver Producto</a>
            <h5>$43.48 MXN</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
        <div class="product__item">
          <div class="product__item__pic set-bg" data-setbg="<?= $backend ?>vistas/img/product/product-4.jpg">
            <ul class="product__hover">
              <li>
                <a href="#"><img src="<?= $backend ?>vistas/img/icon/heart.png" alt="" /></a>
              </li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6>Diagonal Textured Cap</h6>
            <a href="#" class="add-cart">Ver Producto</a>
            <h5>$60.9 MXN</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
        <div class="product__item">
          <div class="product__item__pic set-bg" data-setbg="<?= $backend ?>vistas/img/product/product-5.jpg">
            <ul class="product__hover">
              <li>
                <a href="#"><img src="<?= $backend ?>vistas/img/icon/heart.png" alt="" /></a>
              </li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6>Lether Backpack</h6>
            <a href="#" class="add-cart">Ver Producto</a>
            <h5>$31.37 MXN</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
        <div class="product__item sale">
          <div class="product__item__pic set-bg" data-setbg="<?= $backend ?>vistas/img/product/product-6.jpg">
            <span class="label">Sale</span>
            <ul class="product__hover">
              <li>
                <a href="#"><img src="<?= $backend ?>vistas/img/icon/heart.png" alt="" /></a>
              </li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6>Ankle Boots</h6>
            <a href="#" class="add-cart">Ver Producto</a>
            <h5>$98.49 MXN</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
        <div class="product__item">
          <div class="product__item__pic set-bg" data-setbg="<?= $backend ?>vistas/img/product/product-7.jpg">
            <ul class="product__hover">
              <li>
                <a href="#"><img src="<?= $backend ?>vistas/img/icon/heart.png" alt="" /></a>
              </li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6>T-shirt Contrast Pocket</h6>
            <a href="#" class="add-cart">Ver Producto</a>
            <h5>$49.66 MXN</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
        <div class="product__item">
          <div class="product__item__pic set-bg" data-setbg="<?= $backend ?>vistas/img/product/product-8.jpg">
            <ul class="product__hover">
              <li>
                <a href="#"><img src="<?= $backend ?>vistas/img/icon/heart.png" alt="" /></a>
              </li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6>Basic Flowing Scarf</h6>
            <a href="#" class="add-cart">Ver Producto</a>
            <h5>$26.28 MXN</h5>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>
<!-- Product Section End -->