<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
          <h1 class="points-banner"><?= $Lang->get('SHOP__STARPASS_PAYMENT') ?></h1>
      </div>
      <div class="col-md-5">
        <ul style="margin-top: 18px;text-align: right;">
          <a href="/shop" class="btn-panier btn"><i class="fa fa-ban"></i> Annuler</a>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?= $this->element('flash') ?>
        <div class="alert alert-info text-center">1 code = <?= $money ?> <?= $Configuration->getMoneyName() ?></div>

         <div id="starpass_<?= $idd ?>"></div>
          <script type="text/javascript" src="http://script.starpass.fr/script.php?idd=<?= $idd ?>&amp;verif_en_php=1&amp;datas=<?= $id ?>"></script>
          <noscript>Veuillez activer le Javascript de votre navigateur s'il vous pla&icirc;t.<br />
            <a href="http://www.starpass.fr/">Micro Paiement StarPass</a>
          </noscript>
        </div>
      </div>
    </div>
  </div>
</div>
