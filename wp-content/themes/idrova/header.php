
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDROVA - Дрова высокого качества</title>
    <!-- <script src="https://api-maps.yandex.ru/2.1/?apikey=91ff79f4-f8f0-456d-96ce-e6370f745f79&lang=ru_RU"></script> -->
    <?php wp_head(); ?>
</head>
<body>
    <header class="main-header main-container">
        <a href="" class="main-logotype">
            <img src="<?= wp_get_attachment_image_url(carbon_get_theme_option('main_logo')) ?>" class="main-logotype__picture">
            <div class="main-logotype__text-wrapper">
                <small class="main-logotype__desc">дрова высокого<br>качества</small>
                <div class="main-logotype__name">IDrova</div>
            </div>
        </a>
        <a class="main-header__phone-number" href="tel:<?= carbon_get_theme_option('phone') ?>"></a>
        <button class="main-header__burger"></button>
        <div class="main-header__phone-wrapper">
            <div class="main-header__middle-wrapper">
                <div class="main-header__information">
                    <small class="main-header__working-hours">работаем ежедневно<br>без выходных с 8:00 до 20:00</small>
                    <a class="main-header__telephone" href="tel:<?= carbon_get_theme_option('phone') ?>"><?= carbon_get_theme_option('formatted_phone') ?></a>
                </div>
                <nav class="header-navigation">
                    <ul class="header-navigation__list">
                        <li class="header-navigation__item"><a href="#catalog" class="header-navigation__link">Каталог и цены</a></li>
                        <li class="header-navigation__item"><a href="#advantages" class="header-navigation__link">Оплата и доставка</a></li>
                        <li class="header-navigation__item"><a href="#answers" class="header-navigation__link">Вопрос ответ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="main-header__buy-now">
                <a href="#order" class="primary-button main-header__buy-button">Заказать онлайн</a>
                <small class="main-header__online-status">мы сейчас онлайн</small>
            </div>
        </div>
    </header>