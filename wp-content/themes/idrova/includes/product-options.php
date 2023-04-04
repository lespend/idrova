<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Дополнительные поля')
->show_on_post_type('product')
->add_tab('Информация о товаре', [
    Field::make('text', 'product_price', 'Цена'),
    Field::make('select', 'product_label', 'Ярлык на товар')
    ->set_options([
        'новое' => 'новое',
        'хит' => 'хит',
        'акция' => 'акция',
        '' => 'пусто'
    ]),
    Field::make('select', 'product_quantity', 'В чем измеряется')
    ->set_options([
        'м³' => 'Кубические метры',
        'шт.' => 'Штуки',
        'кг' => 'Килограммы'
    ]),
]);