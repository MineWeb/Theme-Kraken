<?php
	$form_input = array('title' => $Lang->get('THEME__UPLOAD_LOGO'));
	
	if (isset($config['logo']) && $config['logo']) {
		$form_input['img'] = $config['logo'];
		$form_input['filename'] = 'theme_logo.png';
	}
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $Lang->get('THEME__CUSTOMIZATION') ?></h3>
                </div>

                <div class="box-body">
                    <form method="post" enctype="multipart/form-data" data-ajax="false">
                        <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Parametres Généraux</h2>

                                <div class="form-group">
                                    <label><?= $Lang->get('THEME__FAVICON_URL') ?></label>
                                    <input type="text" class="form-control" name="favicon_url"
                                           value="<?= $config['favicon_url'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Nom de votre serveur</label>
                                    <input type="text" class="form-control" name="name_server"
                                           value="<?= $config['name_server'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>IP de votre serveur</label>
                                    <input type="text" class="form-control" name="ip_server"
                                           value="<?= $config['ip_server'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Image d'accueil (Fond)
                                        <small>Mettre lien de votre img</small>
                                    </label>
                                    <input type="text" class="form-control" name="img_home"
                                           value="<?= $config['img_home'] ?>">
                                </div>


                                <h2>Parametres Particules</h2>

                                <div class="form-group">
                                    <label>Nombres de particules
                                        <small>0 pour les desactiver (Par default 150)</small>
                                    </label>
                                    <input type="text" class="form-control" name="particles_type"
                                           value="<?= $config['particles_type'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Couleur des particules</label>
                                    <small>Metter la couleur en hexadecimal (ex: #fff (blanc)</small>
                                    <input type="text" class="form-control" name="particles_color"
                                           value="<?= $config['particles_color'] ?>">
                                </div>

                                <h2>Parametres Banner</h2>

                                <div class="form-group">
                                    <label>Titre</label>
                                    <input type="text" class="form-control" name="title_banner"
                                           value="<?= $config['title_banner'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Texte bouton</label>
                                    <input type="text" class="form-control" name="name_button"
                                           value="<?= $config['name_button'] ?>">
                                    <label>Icone
                                        <small>(fa- ?)</small>
                                    </label>
                                    <input type="text" class="form-control" name="fa_banner"
                                           value="<?= $config['fa_banner'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Lien du bouton</label>
                                    <input type="text" class="form-control" name="link_banner"
                                           value="<?= $config['link_banner'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h2>Parametres Article</h2>

                                <div class="form-group">
                                    <label>Titre</label>
                                    <input type="text" class="form-control" name="titre_article"
                                           value="<?= $config['titre_article'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Texte</label>
                                    <textarea class="form-control" name="texte_article"
                                              rows="3"><?= $config['texte_article'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Image
                                        <small>Mettre le lien de l'image</small>
                                    </label>
                                    <input type="text" class="form-control" name="img_article"
                                           value="<?= $config['img_article'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Titre image</label>
                                    <input type="text" class="form-control" name="titre_img"
                                           value="<?= $config['titre_img'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Texte image</label>
                                    <input type="text" class="form-control" name="text_img"
                                           value="<?= $config['text_img'] ?>">
                                </div>
	
								<?= $this->element('form.input.upload.img', $form_input) ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>" type="button" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $('#addFeature').on('click', function (e) {
        e.preventDefault();

        var i = $(this).attr('data-i');
        i = parseInt(i) + 1;

        var append = '<hr>';

        append += '<div id="feature-' + i + '">';

        append += '<button style="color:#a94442;" type="button" class="btn btn-link pull-right delete-feature" data-id="' + i + '">Supprimer</button>';

        append += '<div class="form-group">';
        append += '<label>Titre</label>';
        append += '<input type="text" class="form-control" name="homepage_features[' + i + '][title]">';
        append += '</div>';

        append += '<div class="form-group">';
        append += '<label>Icône <small><a href="http://fontawesome.io/icons/">Liste des icônes disponibles</a></small></label>';
        append += '<div class="input-group">';
        append += '<span class="input-group-addon">fa fa-</span>';
        append += '<input type="text" class="form-control" name="homepage_features[' + i + '][icon]">';
        append += '</div>';
        append += '</div>';

        append += '<div class="form-group">';
        append += '<label>Message</label>';
        append += '<input type="text" class="form-control" name="homepage_features[' + i + '][message]">';
        append += '</div>';

        append += '</div>';

        $('#features').append(append);
        $(this).attr('data-i', i);

        deleteFeature();

    });

    function deleteFeature() {
        $('.delete-feature').unbind('click');
        $('.delete-feature').on('click', function (e) {
            e.preventDefault();

            var id = $(this).attr('data-id');
            var el = $('#feature-' + id);

            $(el).slideUp(150, function () {
                $(this).remove();
            });
        })
    }

    deleteFeature();
</script>
