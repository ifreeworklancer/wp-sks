<?php
function portfolio_post_type()
{
    $labels = [
        'name' => _x('Портфолио', 'Post Type General Name', 'sks'),
        'singular_name' => _x('Портфолио', 'Post Type Singular Name', 'sks'),
        'menu_name' => __('Портфолио', 'sks'),
        'name_admin_bar' => __('Портфолио', 'sks'),
        'all_items' => __('Все проекты', 'sks'),
        'add_new_item' => __('Добавить проект', 'sks'),
        'add_new' => __('Добавить проект', 'sks'),
        'new_item' => __('Новый проект', 'sks'),
        'edit_item' => __('Редактировать проект', 'sks'),
        'update_item' => __('Обновить проект', 'sks'),
        'view_item' => __('Показать', 'sks'),
        'view_items' => __('Показать все', 'sks'),
        'search_items' => __('Поиск проекта', 'sks'),
    ];
    $args = [
        'label' => __('Портфолио', 'sks'),
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
        'menu_icon' => 'dashicons-format-aside',
    ];
    register_post_type('portfolio', $args);
}
add_action('init', 'portfolio_post_type', 0);