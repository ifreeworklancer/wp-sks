<!-- Intro -->
<section id="intro">
    <div class="intro-slider">
        <?php
        $portfolio = new WP_Query([
            'post_type' => 'packages',
        ]);
        if ($portfolio->have_posts()):
            ?>
            <?php while ($portfolio->have_posts()): $portfolio->the_post();
            $show_project = get_field('show_project_intro');
            ?>
            <div class="intro-slider-item"
                 style="background-image:url('<?= get_the_post_thumbnail_url(); ?>');"></div>
        <?php endwhile; ?>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
    <div class="intro-slider-description">
        <?php $portfolio = new WP_Query([
            'post_type' => 'packages',
        ]);
        if ($portfolio->have_posts()):
            ?>
            <?php while ($portfolio->have_posts()): $portfolio->the_post();
            $price_project = get_field('price_project');
            ?>
            <div class="intro-slider-description-item">
                <div class="content">
                    <h3 class="title">
                        <?= get_the_title(); ?>
                    </h3>
                    <div class="description">
                        <p>
                            <?= get_the_excerpt(); ?>
                        </p>
                    </div>
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                        <div class="price">
                            <div class="price__text">
                                Цена
                            </div>
                            <div class="price__value">
                                $ <span><?= $price_project; ?></span> за м<sup>2</sup>
                            </div>
                        </div>
                        <a href="<?= get_the_permalink(); ?>" class="btn btn-outline-primary">
                            подробнее
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php endif;
        wp_reset_postdata();
        ?>
        <div class="slider-arrow slider-arrow--intro">
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
</section>
