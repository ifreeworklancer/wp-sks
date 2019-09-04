<?php /*
Template Name: Страница категорий
Template Post Type: page
*/
get_header();
$pageID = get_the_ID();
$page_subtitle = get_field('page_subtitle', $pageID);
?>

    <!-- Page Category -->
    <section class="page page-archive">
        <div class="page-header">
            <figure class="banner" style="background-image: url('<?= get_the_post_thumbnail_url($pageID); ?>');">
                <div class="page-description">
                    <div class="page-subtitle">
                        <?= $page_subtitle; ?>
                    </div>
                    <h1 class="title">
                        <?= get_the_title($pageID); ?>
                    </h1>
                </div>
            </figure>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active"><?= get_the_title($pageID); ?></li>
            </ol>
        </div>
        <div class="page-body">
            <?php if ($pageID === 100) : ?>
                <portfolios category="portfolio"></portfolios>
            <?php elseif ($pageID === 111) : ?>
                <posts category="post"></posts>
            <?php elseif ($pageID === 140) : ?>
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        $packages = new WP_Query([
                            'post_type' => 'packages',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'asc'
                        ]);
                        $count = 0;
                        if ($packages->have_posts()):
                            ?>
                            <?php while ($packages->have_posts()): $packages->the_post();
                            $price_project = get_field('price_project');
                            $packages_subtitle = get_field('packages_subtitle');
                            $packages_description = get_field('packages_description');
                            ?>
                            <div class="col-xxl-6 px-xxl-2 mb-3">
                                <a href="<?= get_the_permalink(); ?>" class="packages-card">
                                    <div class="packages-card-prev">
                                        <figure style="background-image: url('<?= get_the_post_thumbnail_url(); ?>');"></figure>
                                    </div>
                                    <div class="packages-card-content">
                                        <div class="packages-card-content-header">
                                            <div class="subtitle">
                                                <?= $packages_subtitle; ?>
                                            </div>
                                            <h4 class="title">
                                                <?= get_the_title(); ?>
                                            </h4>
                                            <div class="price">
                                                <div class="price__text">
                                                    Цена
                                                </div>
                                                <div class="price__value">
                                                    $ <span><?= $price_project; ?></span> за м<sup>2</sup>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="packages-card-content-body">
                                            <div class="description">
                                                <?= $packages_description; ?>
                                            </div>
                                            <div class="more-details">
                                                Подробнее
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata();
                        ?>
                        <div class="col-12 text-center mt-5">
                            <a href="<?= get_the_permalink(100); ?>" class="btn btn-outline-primary">
                                посмотреть наши работы
                            </a>
                        </div>
                    </div>
                </div>
            <?php elseif ($pageID === 133) : ?>
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        $command = new WP_Query([
                            'post_type' => 'command',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'asc'
                        ]);
                        $count = 0;
                        if ($command->have_posts()):
                            ?>
                            <?php while ($command->have_posts()): $command->the_post();
                            $position = get_field('command_position');
                            ?>
                            <div class="col-sm-10 col-md-6 col-xxl-4 px-1">
                                <div class="command-card">
                                    <figure class="image"
                                            style="background-image: url('<?= get_the_post_thumbnail_url(); ?>');"></figure>
                                    <div class="content">
                                        <h4 class="name">
                                            <?= get_the_title(); ?>
                                        </h4>
                                        <div class="position">
                                            <?= $position; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata();
                        ?>
                        <div class="col-12 text-center mt-5">
                            <a href="<?= get_the_permalink(100); ?>" class="btn btn-outline-primary">
                                посмотреть наши работы
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php
wp_reset_postdata();
get_footer();