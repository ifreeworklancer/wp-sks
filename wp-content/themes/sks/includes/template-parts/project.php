<!-- Project -->
<section id="project">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title text-center mb-5">
                    Реализованные проекты
                </h2>
                <div class="project-slider simple-slider">
                    <?php
                    $project = new WP_Query([
                        'post_type' => 'portfolio',
                    ]);
                    $count = 0;
                    if ($project->have_posts()):
                        ?>
                        <?php while ($project->have_posts()): $project->the_post();
                        $show_project_implemented = get_field('show_project_implemented');
                        ?>
                        <?php if ($show_project_implemented) : $count++; ?>
                            <div class="project-slider-item">
                                <a href="<?= get_the_permalink(); ?>" class="project-card">
                                    <div class="decor-hover"></div>
                                    <div class="count">
                                        <?php if ($count < 10) : ?>
                                            0<?= $count; ?>
                                        <?php else : ?>
                                            <?= $count; ?>
                                        <?php endif; ?>
                                    </div>
                                    <figure class="image"
                                            style="background-image:url('<?= get_the_post_thumbnail_url() ?>');"></figure>
                                    <div class="content">
                                        <div class="hover-title">
                                            <?= the_title(); ?>
                                        </div>
                                        <div class="description">
                                            <h4 class="title">
                                                <?= the_title(); ?>
                                            </h4>
                                            <p>
                                                <?= get_the_excerpt(); ?>
                                            </p>
                                            <div class="link-more">
                                                Узнать больше
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif;
                    wp_reset_postdata();
                    ?>
                    <div class="slider-arrow slider-arrow--project">
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
            </div>
            <div class="col-12 text-center">
                <a href="<?= get_the_permalink(100); ?>" class="btn btn-outline-primary">
                    смотреть все
                </a>
            </div>
        </div>
    </div>
</section>