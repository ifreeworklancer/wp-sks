<!-- Packages -->
<section id="packages">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="section-title text-center mb-4 mb-sm-5">
                    Готовые решения
                </h2>
            </div>
            <?php
            $packages = new WP_Query([
                'post_type' => 'packages',
                'posts_per_page' => 2,
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
        </div>
    </div>
</section>