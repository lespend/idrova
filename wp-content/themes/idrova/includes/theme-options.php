<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Настройки сайта' ) )
->add_tab('Общие настройки', [
    Field::make( 'image', 'main_logo', 'Логотип' ),
])
->add_tab('Контакты', [
   Field::make('text', 'formatted_phone', 'Отформатированный номер телефона'), 
   Field::make('text', 'phone', 'Номер телефона'),
   Field::make('complex', 'coords', 'Координаты магазинов')->add_fields([
    Field::make('text', 'latitude', 'Широта')->set_width(50),
    Field::make('text', 'longitude', 'Долгота')->set_width(50),
   ]),
   Field::make('text', 'whatsapp_link', 'Ссылка на whatsapp')->set_width(50),
   Field::make('text', 'telegram_link', 'Ссылка на telegram')->set_width(50),
])
->add_tab('Каталог', [
    Field::make( 'association', 'catalog', 'Перенесите товары которые хотите видеть в правую колонку: ' )
    ->set_types([
        [
            'type'      => 'post',
            'post_type' => 'product',
        ]
    ])
]);