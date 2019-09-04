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
                            Спасибо!
                        </h1>
                        <div class="page-subtitle">
                            наш менеджер с вами свяжеться
                        </div>
                        <a href="/" class="btn btn-outline-primary">
                            На главную
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="decor-bg"></div>
    </section>
<?php
get_footer('secondary');