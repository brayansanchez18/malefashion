<!-- Page Preloder -->
<!-- <div id="preloder">
    <div class="loader"></div>
  </div> -->

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
  <div class="offcanvas__option">
    <div class="offcanvas__links">
      <a href="#">Ingresar</a>
      <a href="#">Registrarte</a>
    </div>
  </div>
  <div class="offcanvas__nav__option">
    <a href="#" class="search-switch"><img src="<?= $backend ?>vistas/img/icon/search.png" alt="" /></a>
    <a href="#"><img src="<?= $backend ?>vistas/img/icon/heart.png" alt="" /></a>
    <a href="#"><img src="<?= $backend ?>vistas/img/icon/cart.png" alt="" /> <span>0</span></a>
    <div class="price">$0.00</div>
  </div>
  <div id="mobile-menu-wrap"></div>
  <div class="offcanvas__text">
    <p>Envio gratis, garantia de 30 dias</p>
  </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
  <div class="header__top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-7">
          <div class="header__top__left">
            <p>Envio gratis, garantia de 30 dias</p>
          </div>
        </div>
        <div class="col-lg-6 col-md-5">
          <div class="header__top__right">
            <div class="header__top__links">
              <a href="#">Ingresar</a>
              <a href="#">Registrarte</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="header__logo">
          <a href="<?= $frontend ?>"><img src="<?= $backend ?>vistas/img/logo.png" alt="" /></a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <nav class="header__menu mobile-menu">
          <ul>
            <li class="active"><a href="<?= $frontend ?>">Inicio</a></li>
            <li><a href="<?= $frontend ?>tienda">Tienda</a></li>
            <li><a href="./blog.html">Ofertas</a></li>
            <li><a href="./contact.html">Soporte</a></li>
          </ul>
        </nav>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="header__nav__option">
          <a href="#" class="search-switch"><img src="<?= $backend ?>vistas/img/icon/search.png" alt="" /></a>
          <a href="#"><img src="<?= $backend ?>vistas/img/icon/heart.png" alt="" /></a>
          <a href="#"><img src="<?= $backend ?>vistas/img/icon/cart.png" alt="" /> <span>0</span></a>
          <div class="price">$0.00</div>
        </div>
      </div>
    </div>
    <div class="canvas__open"><i class="fa fa-bars"></i></div>
  </div>
</header>
<!-- Header Section End -->