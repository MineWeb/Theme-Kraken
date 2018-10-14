
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
          <h1 class="points-banner"> <?= $news['News']['title'] ?></h1>
      </div>
      <div class="col-md-5">
        <ul style="margin-top: 18px;text-align: right;">
          <a href="/" class="btn-banner btn"> Retour</a>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="content">
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-9" id="blog-post">

          <div style="font-family: 'Oxygen', sans-serif;" id="post-content">
            <?= $news['News']['content'] ?>
          </div>
          <p class="author-page-news text-muted text-uppercase mb-small text-right"><?= $Lang->get('GLOBAL__BY') ?> <a href="#" style="color: black!important;"><?= $news['News']['author'] ?></a> | <?= $Lang->get('NEWS__POSTED_ON') . ' ' . $Lang->date($news['News']['created']); ?></p>
            <button style="background: transparent;color: green;" id="<?= $news['News']['id'] ?>" type="button" class="btn-like-news btn btn-template-main pull-right like<?= ($news['News']['liked']) ? ' active' : '' ?>"<?= (!$Permissions->can('LIKE_NEWS')) ? ' disabled' : '' ?>><?= $news['News']['count_likes'] ?> <i class="fa fa-like-news fa-thumbs-up"></i></button><br>
          <div style="margin-bottom: 60px;" id="comments">
            <h4 style="margin-bottom: 50px;" class="text-uppercase"> <?= count($news['Comment']).' '.$Lang->get('NEWS__COMMENTS_TITLE') ?></h4>
            <div class="add-comment"></div>
            <?php
            $i = 0;
            $count = $news['Comment'];
            if($count > 0) {
              foreach ($news['Comment'] as $comment) {
                $i++;
                echo '<div style="border-bottom: 2px solid #901b13;padding: 2%;margin-bottom:20px;" class="row comment';
                  echo ($i == $count) ? ' last' : '';
                    echo '" id="comment-'.$comment['id'].'">';
                      echo '<div class="col-sm-3 col-md-2 text-center-xs">';
                        echo '<p>';
                          echo '<img src="'.$this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', $comment['author'], '150')).'" class="img-responsive" alt="">';
                          echo '</p>';
                        echo '</div>';
                      echo '<div class="col-sm-9 col-md-10">';
                    echo '<h5 class="text-uppercase">'.$comment['author'].'</h5>';
                  echo '<p class="posted"><i class="fa fa-clock-o"></i> '.$Lang->date($comment['created']).'</p>';
                echo '<p>'.before_display($comment['content']).'</p>';
                    if($Permissions->can('DELETE_COMMENT') OR $Permissions->can('DELETE_HIS_COMMENT') AND $user['pseudo'] == $v['author']) {
                      echo '<p class="reply"><a id="'.$comment['id'].'" class="text-danger comment-delete" href="#"><i class="fa fa-times"></i> '.$Lang->get('GLOBAL__DELETE').'</a></p>';
                    }
                  echo '</div>';
                echo '</div>';
              }
            }
            ?>
          </div>
          <?php if($Permissions->can('COMMENT_NEWS')) { ?>
            <div id="comment-form">
              <div id="form-comment-fade-out">
                <h4 style="font-family: 'Source Sans Pro', sans-serif;text-transform: uppercase;"><?= $Lang->get('NEWS__COMMENT_TITLE') ?> :</h4>
                <form method="POST" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'news', 'action' => 'add_comment')) ?>" data-callback-function="addcomment" data-success-msg="false">
                  <input name="news_id" value="<?= $news['News']['id'] ?>" type="hidden">
                  <div class="com-box form-group">
                      <textarea name="content" class="com-box form-control" rows="3"></textarea>
                  </div>
                  <div class="col-sm-12 text-right">
                    <button type="submit" style="margin-bottom: 50px;background: #901b13;color: white;" class="btn-send-news btn btn-template-main"><i class="fa fa-comment-o"></i> <?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                  </div>
                </form>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="col-md-3">
          <div style="border:none;" class="panel panel-default sidebar-menu">
            <div class="panel-heading panel-share">
              <h3 style="font-size:16px;font-family: 'Open Sans', sans-serif;text-transform: uppercase;text-align: center;" class="panel-title">Partagez la new</h3>
            </div>
            <div class="panel-body">
              <ul class="nav nav-pills nav-stacked">
                  <li><a class="btn-share-facebook" href="https://www.facebook.com/sharer/sharer.php?" target="blank">Facebook</a></li>
                  <li><a class="btn-share-twitter" href="https://twitter.com/share?" target="blank">Twitter</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?= $Module->loadModules('news') ?>
<script>
    function addcomment(data) {
        var d = new Date();
        var comment = '';
        comment += '<div class="row comment">';
          comment += '<div class="col-sm-3 col-md-2 text-center-xs">';
            comment += '<p>';
              comment += '<img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', $user['pseudo'], '150')) ?>" class="img-responsive img-circle" alt="">';
            comment += '</p>';
          comment += '</div>';
          comment += '<div class="col-sm-9 col-md-10">';
            comment += '<h5 class="text-uppercase"><?= $user['pseudo'] ?></h5>';
            comment += '<p class="posted"><i class="fa fa-clock-o"></i> '+d.getHours()+'h'+d.getMinutes()+'</p>';
            comment += '<p>'+data['content']+'</p>';
          comment += '</div>';
        comment += '</div>';
        $('.add-comment').hide().html(comment).fadeIn(1500);
        $('#form-comment-fade-out').slideUp(1500);
    }
     $(".comment-delete").click(function(e) {
       e.preventDefault();
        comment_delete(this);
    });

    function comment_delete(e) {
        var inputs = {};
        var id = $(e).attr("id");
        inputs["id"] = id;
        inputs["data[_Token][key]"] = '<?= $csrfToken ?>';
        $.post("<?= $this->Html->url(array('controller' => 'news', 'action' => 'ajax_comment_delete')) ?>", inputs, function(data) {
          if(data == 'true') {
            $('#comment-'+id).slideUp(500);
          } else {
            console.log(data);
          }
        });
    }
</script>
