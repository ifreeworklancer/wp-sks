<?php /*
Template Name: Страница "О нас"
Template Post Type: page
*/
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>

        <!-- Single -->
        <section class="page page-single">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><?= __('[:ru]Главная[:en]Home[:]'); ?></a></li>
                    <li class="breadcrumb-item active"><?= get_the_title(); ?></li>
                </ol>
            </div>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-sm-10">
                            <div class="article-wrapper">
                                <div class="article-content">
                                    <h1>
                                        <?= get_the_title(); ?>
                                    </h1>
                                    <?= get_the_content(); ?>
                                </div>
                                <div class="article-footer">
                                    <ul class="share-list">
                                        <li>
                                            <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"
                                               class="btn btn-outline-secondary">
                                                <?= __('[:ru]поделиться в[:en]share in[:]'); ?>
                                                <svg width="20" height="20">
                                                    <use xlink:href="#facebook-icon"></use>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <a href="/" class="btn btn-outline-primary">
                                <?= __('[:ru]вернуться на главную[:en]back to the main page[:]'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php
    endwhile; endif;
wp_reset_postdata();
get_footer();