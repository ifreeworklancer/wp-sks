<?php
// Theme setup
function theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menus(
        [
            'main_menu' => 'Главное меню',
        ]
    );
}

add_action('after_setup_theme', 'theme_setup');
// Cleanup header
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_filter('the_generator', '__return_empty_string');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rest_output_link_wp_head');
show_admin_bar(false);
// Enqueue scripts
function theme_scripts()
{
    wp_deregister_script('wp-embed');
//    wp_deregister_script('jquery');
//    wp_deregister_script('jquery-migrate');

    wp_enqueue_script('app', get_theme_file_uri('dist/app.js'), null, '', true);
}

add_action('wp_enqueue_scripts', 'theme_scripts');
// Enqueue styles
function theme_styles()
{
    wp_enqueue_style('maps-app', 'https://api.tiles.mapbox.com/mapbox-gl-js/v1.1.1/mapbox-gl.css');
    wp_enqueue_style('theme-app', get_theme_file_uri('dist/app.css'), null, null);
}

add_action('wp_enqueue_scripts', 'theme_styles');

// Debug
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

//Function phone link for tel link
function phone_link($phone)
{
    return str_replace([' ', '(', ')', '-'], '', $phone);
}

function url()
{
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
}

// Video attr
function get_video_id($url)
{
    if (!$url) {
        return null;
    }

    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",
        $url, $matches);
    return $matches[1];
}

function getVideoImageLinkAttribute($url)
{
    return 'https://img.youtube.com/vi/' . get_video_id($url) . '/maxresdefault.jpg';
}

function getVideoLinkAttribute($url)
{
    return 'https://www.youtube.com/embed/' . get_video_id($url);
}

function theme_customize_register($wp_customize)
{
    $wp_customize->add_section('contacts', [
        'title' => 'Контактная информация',
        'priority' => 30,
    ]);
    $wp_customize->add_setting('facebook');
    $wp_customize->add_control('facebook', [
        'section' => 'contacts',
        'label' => 'Facebook',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('instagram');
    $wp_customize->add_control('instagram', [
        'section' => 'contacts',
        'label' => 'Instagram',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('behance');
    $wp_customize->add_control('behance', [
        'section' => 'contacts',
        'label' => 'Behance',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('pinterest');
    $wp_customize->add_control('pinterest', [
        'section' => 'contacts',
        'label' => 'Pinterest',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('phone1');
    $wp_customize->add_control('phone1', [
        'section' => 'contacts',
        'label' => 'Первый телефон',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('phone2');
    $wp_customize->add_control('phone2', [
        'section' => 'contacts',
        'label' => 'Второй телефон',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('phone3');
    $wp_customize->add_control('phone3', [
        'section' => 'contacts',
        'label' => 'Третий телефон',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('address');
    $wp_customize->add_control('address', [
        'section' => 'contacts',
        'label' => 'Адресс',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('address_link');
    $wp_customize->add_control('address_link', [
        'section' => 'contacts',
        'label' => 'Адресс на карте(ссылка)',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('email');
    $wp_customize->add_control('email', [
        'section' => 'contacts',
        'label' => 'Email',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('map_long');
    $wp_customize->add_control('map_long', [
        'section' => 'contacts',
        'label' => 'Долгота',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('map_lat');
    $wp_customize->add_control('map_lat', [
        'section' => 'contacts',
        'label' => 'Широта',
        'type' => 'text',
    ]);
    $wp_customize->add_setting('map_icon');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'map_icon', [
            'section' => 'contacts',
            'label' => 'Иконка на карте',
        ])
    );
}

add_action('customize_register', 'theme_customize_register');

//Vue
function get_ajax_posts()
{
    $args = [
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order'   => 'ASC',
        'paged' => $_POST['paged'],
    ];
    if (isset($_POST)) {
        if ($post_type = $_POST['post_type']) {
            $args['post_type'] = $post_type;
        }
        if ($filters = $_POST['filters']) {
            $args['tag_slug__in'] = explode(',', $filters);
        }
    }
    $ajaxposts = new WP_Query($args);
    echo json_encode([
        'posts' => format_posts($ajaxposts->posts),
        'last_page' => $ajaxposts->max_num_pages,
    ]);
    exit;
}
// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');


function format_posts($posts)
{
    if (!is_array($posts)) {
        return null;
    }
    $computed = [];
    foreach ($posts as $post) {
        array_push($computed, [
            'title' => $post->post_title,
            'image' => get_the_post_thumbnail_url($post->ID, 'large'),
            'posted_at' => get_the_date('j.m.Y', $post->ID),
            'description' => wp_trim_words($post->post_content, 30, '...'),
            'excerpt' => $post->post_excerpt,
            'permalink' => get_the_permalink($post->ID),
        ]);
    }
    return $computed;
}

function slugify($text)
{
    $text = strtolower(trim($text));
    $text =
        transliterator_transliterate('Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();',
            $text);
    $text = str_replace([' ', ',', '.'], '-', $text);
    return $text;
}


// Post types
require_once('post-types/portfolio.php');
require_once('post-types/command.php');
require_once('post-types/packages.php');