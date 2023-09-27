<?php
$cta = ControladorSlide::ctrMostrarCTA();
if ($cta != null && is_array($cta)) {
  switch (count($cta)) {
    case 1:
      $clases = [
        ''
      ];
      $ancho = ['col-lg-7 offset-lg-4'];
      break;
    case 2:
      $clases = [
        '',
        'banner__item--middle',
      ];
      $ancho = [
        'col-lg-7 offset-lg-4',
        'col-lg-5'
      ];
      break;
    case 3:
      $clases = [
        '',
        'banner__item--middle',
        'banner__item--last'
      ];
      $ancho = [
        'col-lg-7 offset-lg-4',
        'col-lg-5',
        'col-lg-7',
      ];
      break;
    default:
      $clases = [];
      $ancho = [];
      break;
  }
}

?>
<!-- Banner Section Begin -->
<section class="banner spad">
  <div class="container">
    <div class="row">
      <?php if ($cta != null && is_array($cta)) : ?>
        <?php for ($i = 0; $i < count($cta); $i++) : ?>
          <div class="<?= $ancho[$i] ?>">
            <div class="banner__item <?= $clases[$i] ?>">
              <div class="banner__item__pic">
                <img src="<?= $backend . $cta[$i]['imagen'] ?>" alt="" />
              </div>
              <div class="banner__item__text">
                <h2><?= $cta[$i]['titulo'] ?></h2>
                <a href="<?= $cta[$i]['url'] ?>"><?= $cta[$i]['boton'] ?></a>
              </div>
            </div>
          </div>
        <?php endfor ?>
      <?php endif ?>
    </div>
  </div>
</section>
<!-- Banner Section End -->