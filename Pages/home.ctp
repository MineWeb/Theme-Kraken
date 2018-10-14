<div class="container">
    <div class="content-home">
        <h1 class="server-ip"><?= $theme_config['ip_server'] ?></h1>
        <h1 class="brand-home">Il y a actuellement <span
                    class="span-home"><?= ($banner_server) ? $banner_server : '0' ?></span> joueurs en ligne sur <span
                    class="span-home"><?= $theme_config['name_server'] ?></span></h1>
    </div>
</div>
<div id="particles-js" style="position:absolute; width: 100%;height: 100%;"></div>
<img src="<?= $theme_config['img_home'] ?>" alt="" class="slided" style="width: 100%;">

<div class="container" style="margin-top: 40px;margin-bottom: 30px;">
    <div class="row">
        <div class="col-md-6">
            <div class="post" style="background:url(<?= $theme_config['img_article'] ?>);">
                <div class="image-title">
                    <h1 class="post-title"><?= $theme_config['titre_img'] ?></h1>
                    <p class="post-text"><?= $theme_config['text_img'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="title-home"><?= $theme_config['titre_article'] ?></h2>
            <p class="text-home"><?= $theme_config['texte_article'] ?></p>
        </div>
    </div>
</div>

<section class="small-section bg-dark">
    <div class="container relative">
        <div class="align-center">
            <h4 class="banner-heading font-alt"
                style="margin-top: 40px; margin-bottom: 40px;"><?= $theme_config['title_banner'] ?></h4>
            <div style="text-align: center;letter-spacing: 2px;">
                <a href="<?= $theme_config['link_banner'] ?>" class="btn-banner btn"><i
                            class="fa fa-<?= $theme_config['fa_banner'] ?>"></i> <?= $theme_config['name_button'] ?></a>
            </div>
        </div>
    </div>
</section>

<!-- ===== NEWS ===== -->

<section class="container" style="margin-top: 20px;margin-bottom: 50px;">

    <h2 style="text-transform: uppercase;" class="section-heading"><?= $Lang->get('NEWS__LAST_TITLE') ?></h2>
	
	<?php
		if (!empty($search_news)) {
			
			$i = 0;
			foreach ($search_news as $news) {
				
				$i++;
				
				if ($i > 4) {
					break;
				}
				
				echo '<div style="text-align:center;">';
				echo '<div class="col-md-4">';
				echo '<a href="' . $this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])) . '"<span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                      </span></a>';
				
				echo '<h4><a class="service-heading" style="color:#901b13;" href="' . $this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])) . '">' . cut($news['News']['title'], 15) . '</a></h4>';
				echo '<span class="author entry-author" style="text-transform:uppercase;"><i class="fa fa-pencil"></i>&nbsp;';
				echo $Lang->get('GLOBAL__BY') . ' <a style="color:#901b13!important;" href="#">' . $news['News']['author'] . '</a> ' . $Lang->get('NEWS__POSTED_ON') . ' ' . $Lang->date($news['News']['created']);;
				echo ' </span>';
				echo '<p class="intro">';
				echo $this->Text->truncate($news['News']['content'], 150, array('ellipsis' => '...', 'html' => true));
				echo '<p class="intro">';
				echo '<a style="color:black;" href="' . $this->Html->url(array('controller' => 'blog', 'action' => $news['News']['slug'])) . '" class="read-more">' . $Lang->get('NEWS__READ_MORE') . '</a>';
				echo '</p>';
				echo '</div>';
				echo '</div>';
			}
		} else {
			echo '<div class="alert alert-danger">' . $Lang->get('NEWS__NONE_PUBLISHED') . '</div>';
		}
	?>

</section>
<!--NEWS-->
<?= $Module->loadModules('home') ?>


<script type="text/javascript">
    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value":<?= $theme_config['particles_type'] ?>,
                "density": {"enable": true, "value_area": 800}
            },
            "color": {"value": "<?= $theme_config['particles_color'] ?>"},
            "shape": {
                "type": "circle",
                "stroke": {"width": 0, "color": "#000000"},
                "polygon": {"nb_sides": 5},
                "image": {"src": "img/github.svg", "width": 100, "height": 100}
            },
            "opacity": {
                "value": 1,
                "random": true,
                "anim": {"enable": false, "speed": 1, "opacity_min": 0.1, "sync": false}
            },
            "size": {
                "value": 5,
                "random": true,
                "anim": {"enable": false, "speed": 40, "size_min": 0.1, "sync": false}
            },
            "line_linked": {"enable": false, "distance": 500, "color": "#ffffff", "opacity": 0.4, "width": 2},
            "move": {
                "enable": true,
                "speed": 3,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {"enable": false, "rotateX": 600, "rotateY": 1200}
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {"enable": true, "mode": "bubble"},
                "onclick": {"enable": true, "mode": "repulse"},
                "resize": true
            },
            "modes": {
                "grab": {"distance": 400, "line_linked": {"opacity": 0.5}},
                "bubble": {"distance": 400, "size": 4, "duration": 0.3, "opacity": 1, "speed": 3},
                "repulse": {"distance": 200, "duration": 0.4},
                "push": {"particles_nb": 4},
                "remove": {"particles_nb": 2}
            }
        },
        "retina_detect": true
    });
</script>