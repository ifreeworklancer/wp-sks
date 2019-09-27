<?php
$pageID = '33';
$about_excerpt = get_field('about_excerpt', $pageID);
$about_video_link = get_field('about_video_link', $pageID);
?>
<!-- About -->
<section id="about">
    <div class="container">
        <div class="row justify-content-center no-gutters">
            <div class="col-xxl-6 order-2 order-xxl-1">
                <div class="about-item">
                    <h2 class="title">
                        <?= get_the_title($pageID); ?>
                    </h2>
                    <div class="description">
                        <p>
                            <?= $about_excerpt; ?>
                        </p>
                    </div>
                    <div class="subtitle">
                        <?= __('[:ru]как мы работаем[:en]how we are working[:]'); ?>
                    </div>
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                        <a href="<?= get_the_permalink($pageID) ?>" class="link-more mb-4 mb-sm-0 mr-sm-4">
                            <?= __('[:ru]Узнать больше[:en]To learn more[:]'); ?>
                        </a>
                        <a href="#" class="btn btn-outline-primary btn-watch"
                           data-src="<?= getVideoLinkAttribute($about_video_link); ?>">
                            <div class="icon"></div>
                            <?= __('[:ru]смотреть видео[:en]watch the video[:]'); ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 order-1 order-xxl-2">
                <figure class="about-image"
                        style="background-image: url('<?= get_the_post_thumbnail_url($pageID); ?>');"></figure>
            </div>
        </div>
    </div>
</section>