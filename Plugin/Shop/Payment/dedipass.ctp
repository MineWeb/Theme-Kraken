<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
          <h1 class="points-banner"><?= $Lang->get('SHOP__DEDIPASS_PAYMENT') ?></h1>
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
        <div data-dedipass="<?= $dedipassPublicKey ?>">
          <div class="alert alert-info"><?= $Lang->get('GLOBAL__LOADING') ?>...</div>
        </div>
        <script src="//api.dedipass.com/v1/pay.js"></script>
      </div>
    </div>
  </div>
</div>
