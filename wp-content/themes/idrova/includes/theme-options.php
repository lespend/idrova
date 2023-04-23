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
    Field::make('text', 'city', 'Название города'),
    Field::make('text', 'latitude', 'Широта')->set_width(50),
    Field::make('text', 'longitude', 'Долгота')->set_width(50),
   ]),
   Field::make('text', 'whatsapp_link', 'Ссылка на whatsapp')->set_width(50),
   Field::make('text', 'telegram_link', 'Ссылка на telegram')->set_width(50),
])
->add_tab('СМИ о нас', [
    Field::make('complex', 'media_video', 'Слайдер с видео')->add_fields([
        Field::make('image', 'media_video_preview', 'Превью для видео'),
        Field::make('text', 'media_video_header', 'Заголовок'),
        Field::make('text', 'media_video_author', 'Автор видео'),
        Field::make('text', 'media_video_link', 'Ссылка'),
    ])
])
->add_tab('Вопрос-ответ', [
    Field::make('complex', 'answers_complex', 'Вопросы и ответы')->add_fields([
        Field::make('text', 'answers_header', 'Вопрос'),
        Field::make('rich_text', 'answers__content', 'Ответ'),
    ])
])
->add_tab('Партнеры', [
    Field::make('complex', 'partners_complex', 'Партнеры')->add_fields([
        Field::make('image', 'partners_logo', 'Логотип'),
        Field::make('text', 'partners_link', 'Ссылка (можно оставить поле пустым)'),
    ])
]);