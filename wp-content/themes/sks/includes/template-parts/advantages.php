<?php
$pageID = '43';
$advantages = get_field('advantages', $pageID);
?>
<!-- Advantages -->
<section id="advantages" style="background-image: url('<?= get_the_post_thumbnail_url($pageID); ?>');">
    <div class="decor-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">
                    <?= get_the_title($pageID); ?>
                </h2>
            </div>
        </div>
        <div class="advantages-row">
            <?php
            foreach ($advantages as $item) :
                ?>
                <?php if (!$item['advantages_image']) : ?>
                <div class="advantages-item">
                    <div class="advantages-item-header">
                        <div class="icon"
                             style="background-image:url('<?= $item['advantages_item']['advantages_item_icon']['url']; ?>');"></div>
                        <h4 class="title">
                            <?= $item['advantages_item']['advantages_item_title']; ?>
                        </h4>
                    </div>
                    <div class="advantages-item-body">
                        <div class="description">
                            <p>
                                <?= $item['advantages_item']['advantages_item_description']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="advantages-item advantages-item--image">
                    <figure style="background-image: url('<?= $item['advantages_image']['url']; ?>');"></figure>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>