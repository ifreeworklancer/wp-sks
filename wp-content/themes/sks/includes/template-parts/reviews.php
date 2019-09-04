<?php
$pageID = '79';
$reviews = get_field('reviews', $pageID);
?>
<!-- Reviews -->
<section id="reviews" style="background-image: url('<?= get_the_post_thumbnail_url($pageID); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title text-center mb-5">
                    <?= get_the_title($pageID); ?>
                </h2>
                <div class="reviews-slider simple-slider">
                    <?php foreach ($reviews as $item) : ?>
                        <div class="reviews-slider-item">
                            <div class="reviews-item">
                                <div class="reviews-item-header">
                                    <figure class="image">
                                        <figure style="background-image: url('<?= $item['reviews_item']['reviews_item_image']['url']; ?>');"></figure>
                                    </figure>
                                </div>
                                <div class="reviews-item-body">
                                    <div class="decor-block">
                                        <svg width="75" height="50">
                                            <use xlink:href="#quote-icon"></use>
                                        </svg>
                                        <div class="line"></div>
                                    </div>
                                    <div class="description">
                                        <p>
                                            <?= $item['reviews_item']['reviews_item_description']; ?>
                                        </p>
                                    </div>
                                    <div class="name">
                                        <?= $item['reviews_item']['reviews_item_name']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="slider-arrow slider-arrow--reviews">
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
        </div>
    </div>
</section>