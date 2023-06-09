<?php
    $product_id = get_the_ID();
    $product_price = carbon_get_post_meta($product_id, 'product_price');
    $product_quantity = carbon_get_the_post_meta('product_quantity');
    $product_label = carbon_get_post_meta($product_id, 'product_label');
    $img_src = get_the_post_thumbnail_url($product_id, 'product');
?>

<a class="primary-card" data-quantity="<?= $product_quantity ?>" data-label="<?= $product_label ?>">
    <img class="primary-card__picture" src="<?= $img_src ?>">
    <div class="primary-card__wrapper">
        <small class="primary-card__label"><?= $product_label ?></small>
        <h2 class="primary-card__header"><?= the_title(); ?></h2>
        <div class="primary-card__text">
            <?= the_content(); ?>
        </div>
        <div class="primary-card__footer">
            <p class="primary-card__price"><?= $product_price . ' ₽\\' . $product_quantity ?></p>
            <button class="primary-button primary-card__button">Купить</button>
        </div>
    </div>
</a>
