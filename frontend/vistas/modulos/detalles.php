<?php

$item = 'ruta';
$valor = $rutas[0];
$infoproducto = ControladorProductos::ctrMostrarInfoproducto($item, $valor);
$multimedia = json_decode($infoproducto['multimedia'], true);

$item = 'id';
$valor = $infoproducto['id_subcategoria'];
$rutaDestacados = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

$item = 'id';
$valor = $infoproducto['id_categoria'];
$rutaCategoria = ControladorProductos::ctrMostrarCategorias($item, $valor);

$ordenar = '';
$item = 'id_subcategoria';
$valor = $infoproducto['id_subcategoria'];
$base = 0;
$tope = 4;
$modo = 'Rand()';

$relacionados = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

?>
<!-- Shop Details Section Begin -->
<section class="shop-details">
  <div class="product__details__pic">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="product__details__breadcrumb">
            <a href="<?= $frontend ?>">Inicio</a>
            <a href="<?= $frontend . $rutaDestacados[0]['ruta'] ?>"><?= $rutaDestacados[0]['subcategoria'] ?></a>
            <span class="pagActiva"><?= $infoproducto['titulo'] ?></span>
          </div>
        </div>
      </div>
      <div class="row">
        <?php if ($multimedia != null) : ?>
          <div class="col-lg-3 col-md-3">
            <ul class="nav nav-tabs" role="tablist">
              <?php for ($i = 0; $i < count($multimedia); $i++) : ?>
                <li class="nav-item <?= ($i == 0) ? 'active' : '' ?>">
                  <a class="nav-link <?= ($i == 0) ? 'active' : '' ?>" data-toggle="tab" href="#tabs-<?= ($i + 1) ?>" role="tab">
                    <div class="product__thumb__pic set-bg" data-setbg="<?= $backend . $multimedia[$i]['foto'] ?>"></div>
                  </a>
                </li>
              <?php endfor ?>
            </ul>
          </div>
          <div class="col-lg-6 col-md-9">
            <div class="tab-content">
              <?php for ($i = 0; $i < count($multimedia); $i++) : ?>
                <div class="tab-pane <?= ($i == 0) ? 'active' : '' ?>" id="tabs-<?= ($i + 1) ?>" role="tabpanel">
                  <div class="product__details__pic__item">
                    <img src="<?= $backend . $multimedia[$i]['foto'] ?>" alt="<? $infoproducto['titulo'] ?>" />
                  </div>
                </div>
              <?php endfor ?>
            </div>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
  <div class="product__details__content">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <div class="product__details__text">
            <?php echo '<div class="comprarAhora" style="display:none">


						<button class="btn btn-default backColor quitarItemCarrito" idProducto="' . $infoproducto["id"] . '" peso="' . $infoproducto["peso"] . '"></button>

						<p class="tituloCarritoCompra text-left">' . $infoproducto["titulo"] . '</p>';

            if ($infoproducto["oferta"] == 0) {

              echo '<input class="cantidadItem" value="1" tipo="' . $infoproducto["tipo"] . '" precio="' . $infoproducto["precio"] . '" idProducto="' . $infoproducto["id"] . '">

							<p class="subTotal' . $infoproducto["id"] . ' subTotales">
						
								<strong>' . $divisa . ' $<span>' . $infoproducto["precio"] . '</span></strong>

							</p>

							<div class="sumaSubTotal"><span>' . $infoproducto["precio"] . '</span></div>';
            } else {

              echo '<input class="cantidadItem" value="1" tipo="' . $infoproducto["tipo"] . '" precio="' . $infoproducto["precioOferta"] . '" idProducto="' . $infoproducto["id"] . '">

							<p class="subTotal' . $infoproducto["id"] . ' subTotales">
						
								<strong>' . $divisa . ' $<span>' . $infoproducto["precioOferta"] . '</span></strong>

							</p>

							<div class="sumaSubTotal"><span>' . $infoproducto["precioOferta"] . '</span></div>';
            }

            echo '</div>';
            ?>
            <h4><?= $infoproducto['titulo'] . $infoproducto['id'] ?></h4>
            <?php if ($infoproducto['precio'] == 0) : ?>
              <h3>GRATIS</h3>
            <?php else : ?>
              <?php if ($infoproducto['oferta'] == 0) : ?>
                <h3>$<?= number_format($infoproducto['precio'], 2) ?> <?= $divisa ?></h3>
              <?php else : ?>
                <h3>$<?= number_format($infoproducto['precioOferta'], 2) ?> <span><?= number_format($infoproducto['precio'], 2) ?> <?= $divisa ?></span></h3>
              <?php endif ?>
            <?php endif ?>

            <p><?= $infoproducto['descripcion'] ?></p>

            <?php if ($infoproducto['stock'] != 0) : ?>
              <?php if ($infoproducto['tipo'] == 'fisico') : ?>
                <?php if ($infoproducto['detalles'] != null) : ?>
                  <?php $detalles = json_decode($infoproducto['detalles'], true); ?>

                  <div class="product__details__option container">
                    <div class="row">
                      <!-- //TODO: AGREGAR LISTA DE OPCIONES PARA COLOR Y TALLA -->
                      <?php if ($detalles['Talla'] != null) : ?>
                        <select class="col-sm m-auto form-control seleccionarDetalle" id="seleccionarTalla">
                          <option value="">Talla</option>
                          <?php for ($i = 0; $i < count($detalles['Talla']); $i++) : ?>
                            <option value="<?= $detalles['Talla'][$i] ?>"><?= $detalles['Talla'][$i] ?></option>
                          <?php endfor ?>
                        </select>
                      <?php endif ?>

                      <?php if ($detalles['Color'] != null) : ?>
                        <select class="col-sm m-auto form-control" id="exampleFormControlSelect1">
                          <option value="">Color</option>
                          <?php for ($i = 0; $i < count($detalles['Color']); $i++) : ?>
                            <option value="<?= $detalles['Color'][$i] ?>"><?= $detalles['Color'][$i] ?></option>
                          <?php endfor ?>
                        </select>
                      <?php endif ?>
                    </div>
                  </div>
                <?php endif ?>
              <?php endif ?>

              <?php if ($infoproducto["precio"] == 0) : ?>
                <?php if (isset($_SESSION['validarSesion']) && $_SESSION['validarSesion'] == 'ok') : ?>
                  <?php if ($infoproducto['stock'] != 0) : ?>
                    <div class="product__details__cart__option">
                      <a class="primary-btn agregarCarrito agregarFisicosGratis text-light c-pointer" idProducto="<?= $infoproducto['id'] ?>" imagen="<?= $backend . $infoproducto['portada'] ?>" titulo="<?= $infoproducto['titulo'] ?>" precio="<?= $infoproducto['precioOferta'] ?>" peso="<?= $infoproducto['peso'] ?>" idUsuario="<?= $_SESSION['id'] ?>">SOLICITAR PRODUCTO</a>
                    </div>
                  <?php endif ?>
                <?php else : ?>
                  <div class="product__details__cart__option">
                    <a href="<?= $frontend ?>login" class="primary-btn">SOLICITAR PRODUCTO</a>
                  </div>
                <?php endif ?>
              <?php else : ?>
                <?php if ($infoproducto['stock'] != 0) : ?>
                  <?php if ($infoproducto['oferta'] != 0) : ?>
                    <div class="product__details__cart__option">
                      <a class="primary-btn agregarCarrito text-light c-pointer" idProducto="<?= $infoproducto['id'] ?>" imagen="<?= $backend . $infoproducto['portada'] ?>" titulo="<?= $infoproducto['titulo'] ?>" precio="<?= $infoproducto['precioOferta'] ?>" peso="<?= $infoproducto['peso'] ?>">AGREGAR AL CARRITO</a>
                    </div>
                  <?php else : ?>
                    <div class="product__details__cart__option">
                      <a class="primary-btn agregarCarrito text-light c-pointer" idProducto="<?= $infoproducto['id'] ?>" imagen="<?= $backend . $infoproducto['portada'] ?>" titulo="<?= $infoproducto['titulo'] ?>" precio="<?= $infoproducto['precio'] ?>" peso="<?= $infoproducto['peso'] ?>">AGREGAR AL CARRITO</a>
                    </div>
                  <?php endif ?>
                <?php endif ?>
              <?php endif ?>
            <?php endif ?>

            <div class="product__details__btns__option">
              <a href="#"><i class="fa fa-heart"></i> AGREGAR A DESEADOS</a>
            </div>
            <div class="product__details__last__option">
              <h5><span class="text-capitalize">Pago seguro garantizado</span></h5>
              <!-- TODO: EDITAR IMAGEN PARA QUITAR STRIPE, SHOPIFY Y DESCOVER -->
              <img src="<?= $backend ?>vistas/img/shop-details/details-payment.png" alt="" />
              <ul>
                <li class="text-capitalize"><span>Stock:</span> <?= ($infoproducto['stock'] != 0) ? $infoproducto['stock'] : 'NO DISPONIBLE' ?></li>
                <li class="text-capitalize"><span>Categories:</span> <?= $rutaCategoria['categoria'] ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="related-title">Productos Relacionados</h3>
      </div>
    </div>
    <div class="row">

      <?php if (!$relacionados) : ?>
        <div class="col-12 text-center">
          <h1><small>¡Oops!</small></h1>
          <h2>No hay productos relacionados</h2>
        </div>
      <?php else : ?>
        <?php foreach ($relacionados as $key => $value) : ?>
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
      <?php endif ?>
    </div>
  </div>
</section>
<!-- Related Section End -->