<?php
/*
Template Name: Страница "Спасибо"
Template Post Type: page
*/
get_header();
?>
    <section id="page-thanks" class="page page-secondary"
             style="background-image: url(<?= get_the_post_thumbnail_url(); ?>);">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="page-secondary-item">
                        <h1 class="title">
                            <?= __('[:ru]Спасибо![:en]Thank![:]'); ?>
                        </h1>
                        <div class="page-subtitle">
                            <?= __('[:ru]наш менеджер с вами свяжеться[:en]our manager will contact you[:]'); ?>
                        </div>
                        <a href="/" class="btn btn-outline-primary">
                            <?= __('[:ru]На главную[:en]To the main[:]'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="decor-bg"></div>
    </section>
<?php
get_footer('secondary');