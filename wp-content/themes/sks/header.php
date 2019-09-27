<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<?php wp_head(); ?>
<body>

<?php include(__DIR__ . '/includes/partials/svgs.php') ?>

<?php
$phone1 = get_theme_mod('phone1');
$address_link = get_theme_mod('address_link');
$address = get_theme_mod('address');
?>

<!-- App-header -->
<header id="app-header">
    <ul class="contacts-list contacts-list--row">
        <li class="contacts-list-item">
            <div class="contacts-list-item__title">
                <?= __('[:ru]телефон[:en]phone[:]'); ?>
            </div>
            <a href="tel:<?= phone_link($phone1); ?>">
                <?= $phone1; ?>
            </a>
        </li>
        <li class="contacts-list-item">
            <div class="contacts-list-item__title">
                <?= __('[:ru]адрес[:en]address[:]'); ?>
            </div>
            <a href="<?= $address_link ?>">
                <?= $address; ?>
            </a>
        </li>
    </ul>
</header>

<!-- App-sidebar -->
<aside id="app-sidebar">
    <div class="sidebar-item">
        <a href="/" class="logo">
            <img src="<?= get_theme_file_uri('images/icons/logo.png') ?>" alt="logo">
        </a>
    </div>
    <div class="sidebar-item d-none d-lg-block">
        <nav class="header-nav">
            <?php wp_nav_menu([
                'theme_location' => '',
                'menu' => '',
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'menu_class' => '',
                'menu_id' => '',
                'echo' => true,
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            ]); ?>
        </nav>
    </div>
    <div class="sidebar-item d-none d-lg-block text-center">
        <?php
        if (function_exists('wpm_language_switcher'))
            wpm_language_switcher('list', 'name');
        ?>
        <a href="#" class="btn btn-outline-primary open-feedback">
            <?= __('[:ru]связаться[:en]contact[:]'); ?>
        </a>
        <div class="site-copyrighting">
            Copyright © <?= date('Y'); ?> All Right Reserve
        </div>
    </div>

    <div class="burger-menu">
        <div class="burger-menu__text">
            <?= __('[:ru]Меню[:en]Menu[:]'); ?>
        </div>
        <div class="burger-menu-icon">
            <div class="line line--top"></div>
            <div class="line line--middle"></div>
            <div class="line line--bottom"></div>
        </div>
    </div>

    <div class="menu">
        <nav class="menu-nav">
            <?php wp_nav_menu([
                'theme_location' => '',
                'menu' => '',
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'menu_class' => '',
                'menu_id' => '',
                'echo' => true,
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            ]); ?>
        </nav>
        <div class="text-center">
            <?php
            if (function_exists('wpm_language_switcher'))
                wpm_language_switcher('list', 'name');
            ?>
            <a href="#" class="btn btn-outline-primary open-feedback">
                <?= __('[:ru]связаться[:en]contact[:]'); ?>
            </a>
            <div class="site-copyrighting">
                Copyright © <?= date('Y'); ?> All Right Reserve
            </div>
        </div>
    </div>
</aside>

<!-- Modal -->
<?php include(__DIR__ . '/includes/partials/modal.php') ?>

<!-- Main -->
<main id="app">