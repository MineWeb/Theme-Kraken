

<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
          <h1 class="points-banner"> <?= $Lang->get("FAQ") ?> </h1>
      </div>
    </div>
  </div>
</div>
<div class="container">

    <div class="panel">
        <div class="panel-body">

                <?= (empty($faqs)) ? "<p>Aucune FAQ pour le moment</p>" : ""?>
                


                <?php foreach($faqs as $k=>$v): $v = current($v); ?>


                <div class="tab-pane active in fade content-faq" id="faq1-cat-<?= $v['id'] ?>">

                    <div class="panel-group" id="accordion-cat-<?= $v['id'] ?>">




                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#collapse-<?= $v['id'] ?>">

                                    <h4 class="panel-title title-faq">

                                        <?= $v['question'] ?>

                                        <span style="color: black;" class="pull-right"><i class="fa fa-faq fa-eye"></i></span>

                                    </h4>

                                </a>


                            <div id="collapse-<?= $v['id'] ?>" class="panel-collapse collapse">

                                <div class="response-faq panel-body">
                                    <?= $v['answer'] ?>
                                </div>

                            </div>


 
                        </div>
        </div>    

                <?php endforeach; ?>



</div>
</div>
</div>
