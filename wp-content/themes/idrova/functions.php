<?php

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

add_action('wp_enqueue_scripts', 'site_scripts');
function site_scripts() {
    $version = '0.0';

    wp_dequeue_style('wp-block-libary');
    wp_deregister_script('wp-embed');
    wp_enqueue_style('main-style', get_stylesheet_uri(), [], $version);
    wp_enqueue_script('yandex-map', 'https://api-maps.yandex.ru/2.1/?apikey=91ff79f4-f8f0-456d-96ce-e6370f745f79&lang=ru_RU', [], $version);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/main.bundle.js', [], $version, true);
    wp_localize_script('main-script', 'WP', [
        'siteUrl' => get_template_directory_uri(),
        'mapCoords' => carbon_get_theme_option('coords'),
    ]);
}

add_action('after_setup_theme', 'theme_support');
function theme_support() {
    add_theme_support('post-thumbnails');
    add_image_size('product', 410, 243, true);
    add_image_size('video_preview', 300, 201, true);
    add_image_size('partners_logo', 213, 134);
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'register_carbon_fields' );
function register_carbon_fields() {
    require_once('includes/theme-options.php');
    require_once('includes/product-options.php');
}

add_action( 'init', 'register_post_types' );
function register_post_types() {
  register_post_type('product', [
    'labels' => [
      'name'               => 'Товары', // основное название для типа записи
      'singular_name'      => 'Товар', // название для одной записи этого типа
      'add_new'            => 'Добавить товар', // для добавления новой записи
      'add_new_item'       => 'Добавление товара', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование товара', // для редактирования типа записи
      'new_item'           => 'Новый товар', // текст новой записи
      'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
      'search_items'       => 'Искать товар', // для поиска по этим типам записи
      'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
      'menu_name'          => 'Товары', // название меню
    ],
    'menu_icon'          => 'dashicons-cart',
    'public'             => true,
    'menu_position'      => 5,
    'supports'           => ['title', 'editor', 'thumbnail'],
    'has_archive'        => true,
    ] );

    register_taxonomy('product-categories', 'product', [
        'labels'        => [
          'name'                        => 'Категории товаров',
          'singular_name'               => 'Категория товароа',
          'search_items'                =>  'Искать категории',
          'popular_items'               => 'Популярные категории',
          'all_items'                   => 'Все категории',
          'edit_item'                   => 'Изменить категорию',
          'update_item'                 => 'Обновить категорию',
          'add_new_item'                => 'Добавить новую категорию',
          'new_item_name'               => 'Новое название категории',
          'separate_items_with_commas'  => 'Отделить категории запятыми',
          'add_or_remove_items'         => 'Добавить или удалить категорию',
          'choose_from_most_used'       => 'Выбрать самую популярную категорию',
          'menu_name'                   => 'Категории',
        ],
    ]);
}