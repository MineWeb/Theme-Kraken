<div id="content">
  <div class="container">

    <div style="margin-top: 80px;margin-bottom: 127px;" class="col-sm-6 col-sm-offset-3" id="error-page">

      <div style="padding:5%;background: rgba(255, 0, 0, 0.42);" class="box">

        <h3 style="text-transform: uppercase;"><?= $Lang->get('ERROR__404_LABEL') ?></h3>
        <h4 style="color:white;" class="text-muted"><?= $Lang->get('ERROR__404_CONTENT', array('{URL}' => $url)) ?></h4>

        <p class="buttons"><a href="<?= $this->Html->url('/') ?>" class="btn btn-template-main"><i class="fa fa-home"></i> <?= $Lang->get('GLOBAL__HOME') ?></a></p>

      </div>

    </div>
  </div>
</div>
