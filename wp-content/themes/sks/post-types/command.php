<?php
function command_post_type()
{
    $labels = [
        'name' => _x('Команда', 'Post Type General Name', 'sks'),
        'singular_name' => _x('Команда', 'Post Type Singular Name', 'sks'),
        'menu_name' => __('Команда', 'sks'),
        'name_admin_bar' => __('Команда', 'sks'),
        'all_items' => __('Все члены команда', 'sks'),
        'add_new_item' => __('Добавить члена команды', 'sks'),
        'add_new' => __('Добавить члена команды', 'sks'),
        'new_item' => __('Новый член команды', 'sks'),
        'edit_item' => __('Редактировать член команды', 'sks'),
        'update_item' => __('Обновить члена команды', 'sks'),
        'view_item' => __('Показать', 'sks'),
        'view_items' => __('Показать всех', 'sks'),
        'search_items' => __('Поиск члена команды', 'sks'),
    ];
    $args = [
        'label' => __('Команда', 'sks'),
        'labels' => $labels,
        'supports' => ['title', 'thumbnail'],
        'taxonomies' => [],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-buddicons-buddypress-logo',
    ];
    register_post_type('command', $args);
}
add_action('init', 'command_post_type', 0);