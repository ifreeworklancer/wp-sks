<?php
function packages_post_type()
{
    $labels = [
        'name' => _x('Готовые решения', 'Post Type General Name', 'sks'),
        'singular_name' => _x('Готовые решения', 'Post Type Singular Name', 'sks'),
        'menu_name' => __('Готовые решения', 'sks'),
        'name_admin_bar' => __('Готовые решения', 'sks'),
        'all_items' => __('Все готовые решения', 'sks'),
        'add_new_item' => __('Добавить решение', 'sks'),
        'add_new' => __('Добавить решение', 'sks'),
        'new_item' => __('Новое решение', 'sks'),
        'edit_item' => __('Редактировать решение', 'sks'),
        'update_item' => __('Обновить решение', 'sks'),
        'view_item' => __('Показать', 'sks'),
        'view_items' => __('Показать все', 'sks'),
        'search_items' => __('Поиск решение', 'sks'),
    ];
    $args = [
        'label' => __('Готовые решения', 'sks'),
        'labels' => $labels,
        'supports' => ['title', 'editor', 'excerpt', 'custom-fields', 'thumbnail'],
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
        'menu_icon' => 'dashicons-list-view',
    ];
    register_post_type('packages', $args);
}
add_action('init', 'packages_post_type', 0);