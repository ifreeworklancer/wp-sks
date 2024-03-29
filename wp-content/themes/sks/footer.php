<?php
$phone1 = get_theme_mod('phone1');
$phone2 = get_theme_mod('phone2');
$phone3 = get_theme_mod('phone3');
$email = get_theme_mod('email');
$facebook = get_theme_mod('facebook');
$instagram = get_theme_mod('instagram');
$behance = get_theme_mod('behance');
$pinterest = get_theme_mod('pinterest');
$map_lat = get_theme_mod('map_lat');
$map_long = get_theme_mod('map_long');
$map_icon = get_theme_mod('map_icon');
$address_link = get_theme_mod('address_link');
$address = get_theme_mod('address');
?>
<!-- Contacts -->
<section id="contacts">
    <div class="container-fluid">
        <div class="row w-100 m-0 no-gutters">
            <div class="col-xl-4 order-2 order-xl-1">
                <div class="contacts-wrapper">
                    <h2 class="section-title mb-5">
                        <?= __('[:ru]Контакты[:en]Contacts[:]'); ?>
                    </h2>
                    <ul class="contacts-list">
                        <li class="contacts-list-item">
                            <div class="contacts-list-item__title">
                                <?= __('[:ru]телефоны[:en]telephones[:]'); ?>
                            </div>
                            <div>
                                <a href="tel:<?= phone_link($phone1); ?>">
                                    <?= $phone1; ?>
                                </a>
                            </div>
                            <div>
                                <a href="tel:<?= phone_link($phone2); ?>">
                                    <?= $phone2; ?>
                                </a>
                            </div>
                            <div>
                                <a href="tel:<?= phone_link($phone3); ?>">
                                    <?= $phone3; ?>
                                </a>
                            </div>
                        </li>
                        <li class="contacts-list-item">
                            <div class="contacts-list-item__title">
                                <?= __('[:ru]адрес[:en]address[:]'); ?>
                            </div>
                            <a href="<?= $address_link ?>">
                                <?= $address; ?>
                            </a>
                        </li>
                        <li class="contacts-list-item">
                            <div class="contacts-list-item__title">
                                email
                            </div>
                            <a href="mailto:<?= $email; ?>">
                                <?= $email; ?>
                            </a>
                        </li>
                        <li class="contacts-list-item">
                            <div class="contacts-list-item__title">
                                <?= __('[:ru]Мы в соц.сетях[:en]We are in social networks[:]'); ?>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="<?= $facebook; ?>" class="mr-3">
                                    <svg width="20" height="20">
                                        <use xlink:href="#facebook-icon"></use>
                                    </svg>
                                </a>
                                <a href="<?= $instagram; ?>" class="mr-3">
                                    <svg width="20" height="20">
                                        <use xlink:href="#instagram-icon"></use>
                                    </svg>
                                </a>
                                <a href="<?= $behance; ?>" class="mr-3">
                                    <svg width="20" height="20">
                                        <use xlink:href="#behance-icon"></use>
                                    </svg>
                                </a>
                                <a href="<?= $pinterest; ?>">
                                    <svg width="20" height="20">
                                        <use xlink:href="#pinterest-icon"></use>
                                    </svg>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8 order-1 order-xl-2">
                <div class="map-contacts">
                    <div class="map-mask">
                        <?= __('[:ru]Нажмите для использования карты[:en]Click to use map[:]'); ?>
                    </div>
                    <div id="contacts-map" data-long="<?= $map_long ?>" data-lat="<?= $map_lat; ?>"
                         data-icon="<?= $map_icon; ?>"></div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<!-- App-footer -->
<footer id="app-footer">
    <div class="container">
        <div class="row justify-content-center justify-content-sm-between">
            <div class="col-auto d-none d-sm-block">
            </div>
            <div class="col-auto">
                <div class="footer-item mb-2 mb-sm-0">
                    <div class="footer-copyright">
                        SKSDesign © <?= date('Y'); ?>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="footer-item">
                    <?= __('[:ru]Дизайн и вебразработка студией [:en]Design and web development by studio[:]'); ?> <a href="https://impressionbureau.pro/" target="_blank">Impression
                        Bureau</a> 2019
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Script -->
<?php wp_footer(); ?>
</body>

</html>