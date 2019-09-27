<?php
get_header();
$price_project = get_field('price_project');
if (have_posts()) :
    while (have_posts()) : the_post();
        $post_id = $post->ID;
        $post_type = $post->post_type;
        $gallery = get_field('images_gallery', $post_id);
        ?>

        <!-- Single -->
        <section class="page page-single">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><?= __('[:ru]Главная[:en]Home[:]'); ?></a></li>
                    <?php if ($post_type === 'portfolio') : ?>
                        <li class="breadcrumb-item"><a
                                    href="<?= get_the_permalink(100); ?>"><?= get_the_title(100) ?></a></li>
                    <?php elseif ($post_type === 'packages') : ?>
                        <li class="breadcrumb-item"><a
                                    href="<?= get_the_permalink(140); ?>"><?= get_the_title(140) ?></a></li>
                    <?php elseif ($post_type === 'post') : ?>
                        <li class="breadcrumb-item"><a
                                    href="<?= get_the_permalink(111); ?>"><?= get_the_title(111) ?></a></li>
                    <?php endif; ?>
                    <li class="breadcrumb-item active"><?= get_the_title(); ?></li>
                </ol>
            </div>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-sm-10">
                            <div class="article-wrapper">
                                <div class="article-content">
                                    <?php
                                    if ($gallery) : ?>
                                        <div class="article-slider-wrapper">
                                            <div class="article-slider article-slider--main">
                                                <?php
                                                foreach ($gallery as $item) :
                                                    ?>
                                                    <div class="article-slider-item">
                                                        <figure style="background-image: url('<?= $item['url']; ?>');"></figure>
                                                    </div>
                                                <?php endforeach; ?>
                                                <div class="slider-arrow slider-arrow--article">
                                                    <div class="slider-arrow-item slider-arrow-item--prev">
                                                        <svg width="10" height="15">
                                                            <use xlink:href="#arrow-prev"></use>
                                                        </svg>
                                                    </div>
                                                    <div class="slider-arrow-item slider-arrow-item--next">
                                                        <svg width="10" height="15">
                                                            <use xlink:href="#arrow-next"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="article-slider article-slider--navFor">
                                                <?php
                                                foreach ($gallery as $item) :
                                                    ?>
                                                    <div class="article-slider-item">
                                                        <figure style="background-image: url('<?= $item['url']; ?>');"></figure>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <h1>
                                        <?= get_the_title(); ?>
                                    </h1>
                                    <?= get_the_content(); ?>
                                </div>
                                <div class="article-footer">
                                    <?php if ($post_type !== 'post') : ?>
                                        <div class="price">
                                            <div class="price__text">
                                                <?= __('[:ru]Цена[:en]Price[:]'); ?>
                                            </div>
                                            <div class="price__value">
                                                $ <span><?= $price_project; ?></span> <?= __('[:ru]за м[:en]per m[:]'); ?><sup>2</sup>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <!--                                    <div class="author mb-3 mb-xl-0">-->
                                    <!--                                        --><?//= $single_article['author']; ?>
                                    <!--                                    </div>-->
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
                            <?php if ($post_type === 'portfolio') : ?>
                                <a href="<?= get_the_permalink(100); ?>" class="btn btn-outline-primary">
                                    <?= __('[:ru]вернуться в[:en]return to[:]'); ?> <?= get_the_title(100) ?>
                                </a>
                            <?php elseif ($post_type === 'packages') : ?>
                                <a href="<?= get_the_permalink(140); ?>" class="btn btn-outline-primary">
                                    <?= get_the_title(140) ?>
                                </a>
                            <?php elseif ($post_type === 'post') : ?>
                                <a href="<?= get_the_permalink(111); ?>" class="btn btn-outline-primary">
                                    <?= __('[:ru]вернуться в[:en]return to[:]'); ?> <?= get_the_title(111) ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php
    endwhile; endif;
wp_reset_postdata();
get_footer();