<?php
$slide = ControladorSlide::ctrMostrarSlide();
$social = ControladorPlantilla::ctrEstiloPlantilla();
$jsonRedesSociales = json_decode($social['redesSociales'], true);
?>

<!-- Hero Section Begin -->
<section class="hero">
  <div class="hero__slider owl-carousel">

    <?php foreach ($slide as $key => $value) : ?>
      <div class="hero__items set-bg" data-setbg="<?= $backend . $value['imgFondo'] ?>">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-7 col-md-8">
              <div class="hero__text">
                <h6><?= $value['titulo1'] ?></h6>
                <h2><?= $value['titulo2'] ?></h2>
                <p>
                  <?= $value['titulo3'] ?>
                </p>
                <a href="<?= $value['url'] ?>" class="primary-btn"><?= $value['boton'] ?><span class="arrow_right"></span></a>
                <div class="hero__social">

                  <?php foreach ($jsonRedesSociales as $key => $value2) : ?>
                    <?php if ($value2['activo'] != 0) : ?>
                      <a href="<?= $value2['url'] ?>"><i class="fa <?= $value2['red'] ?>"></i></a>
                    <?php endif ?>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</section>
<!-- Hero Section End -->