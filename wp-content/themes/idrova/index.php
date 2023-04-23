
<?php get_header() ?>
<section class="first-screen">
    <div class="main-container">
        <h1 class="first-screen__header"><small class="first-screen__header--large">Дрова</small> <small class="first-screen__header--less">высокого<br>качества</small></h1>
        <h3 class="first-screen__sub-header"><small class="first-screen__sub-header--delivery">доставка</small> в день заказа</h3>
        <p class="first-screen__desc">Мы находимся в Озерках с удовольствием доставим<br>Вам дрова в радиусе 50км</p>
        <a href="#order" class="first-screen__buy-now primary-button">Заказать прямо сейчас</a>
        <ul class="first-screen__privilege">
            <li class="first-screen__privilege-item">
                <h5 class="first-screen__privilege-header">Всегда низкие цены</h5>
                <p class="first-screen__privilege-desc">если найдете дешевле готовы сделать Вам скидку</p>
            </li>
            <li class="first-screen__privilege-item">
                <h5 class="first-screen__privilege-header">Всегда в наличии</h5>
                <p class="first-screen__privilege-desc">свои склады, дрова без посредников</p>
            </li>
            <li class="first-screen__privilege-item">
                <h5 class="first-screen__privilege-header">Быстрая доставка</h5>
                <p class="first-screen__privilege-desc">закажи сейчас - доставка от 3 часов</p>
            </li>
        </ul>
    </div>
    <div class="first-screen__video">
        <video class="first-screen__video-media" src="<?= get_template_directory_uri() ?>/assets/video-first-screen.mp4" autoplay muted loop></video>
    </div>
</section>
<section class="catalog main-container" id="catalog">
    <h3 class="catalog__header">Каталог и <small class="catalog__header--price">цены</small></h3>
    <ul class="catalog__card-list">
        <?php
            $catalog_products = carbon_get_theme_option('catalog');
            $catalog_products_ids = wp_list_pluck($catalog_products, 'id');
            $catalog_products_query = new WP_Query([
                'post_type' => 'product',
                'tax_query' => [
                    [
                    'taxonomy' => 'product-categories',
                    'field' => 'slug',
                    'terms' => 'default',
                    ],
                ],
            ]);
        ?>
        <?php while($catalog_products_query->have_posts()): $catalog_products_query->the_post(); ?>
            <?= get_template_part('product-card-template'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
</section>

<section class="mass-media">
    <div class="main-container">
        <div class="mass-media__text">
            <h3 class="mass-media__header">СМИ о нас</h3>
            <p class="mass-media__desc">Нас рекомендуют и о нас говорят средства массовой информации, потому что наши дрова всегда в наличии и веского качества</p>
            <p class="mass-media__mark">
                <small class="mass-media__mark--large">4.9</small>
                <small class="mass-media__mark--less">средняя оценка нашей работы, из учета более чем 2000 заказов</small>
            </p>
        </div>
        <div class="mass-media__slider">                          
            <div class="mass-media__slider-container">
                <button class="mass-media__slider-arrow mass-media__slider-arrow--left"></button>
                <button class="mass-media__slider-arrow mass-media__slider-arrow--right"></button>
                <div class="mass-media__slider-track">
                    <?php  foreach(carbon_get_theme_option('media_video') as $element):  ?>
                    <a class="mass-media__block video-block" href="<?=$element['media_video_link']?>">
                        <img class="video-block__preview" src="<?=wp_get_attachment_image_url($element['media_video_preview'], 'video_preview')?>">
                        <p class="video-block__source"><?=$element['media_video_author']?></p>
                        <h2 class="video-block__header"><?=$element['media_video_header']?></h2>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hot-offer main-container">
    <h3 class="hot-offer__header"><small class="hot-offer__header--hot">Горящие</small> предложения</h3>
    <ul class="hot-offer__card-list">
        <?php
            $hot_products_query = new WP_Query([
                'post_type' => 'product',
                'tax_query' => [
                    [
                    'taxonomy' => 'product-categories',
                    'field' => 'slug',
                    'terms' => 'hot',
                    ],
                ],
            ]);
        ?>
        <?php while($hot_products_query->have_posts()): $hot_products_query->the_post(); ?>
            <?= get_template_part('product-card-hot-template'); ?>
        <?php endwhile; ?>
    </ul>
</section>

<section class="advantages" id="advantages">
    <div class="main-container">
        <div class="advantages__text-wrapper">
            <h3 class="advantages__header">Оплата и доставка</h3>
            <h4 class="advantages__company-name">IDrova</h4>
            <p class="advantages__company-desc">дрова высокого<br>качества</p>
        </div>
        <ul class="advantages__content-wrapper">
            <li class="advantages__item">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_405_4874)">
                    <path d="M16.25 47.5H11.25C10.9185 47.5 10.6005 47.3683 10.3661 47.1339C10.1317 46.8995 10 46.5815 10 46.25C10 45.9185 10.1317 45.6005 10.3661 45.3661C10.6005 45.1317 10.9185 45 11.25 45H16.25C16.5815 45 16.8995 45.1317 17.1339 45.3661C17.3683 45.6005 17.5 45.9185 17.5 46.25C17.5 46.5815 17.3683 46.8995 17.1339 47.1339C16.8995 47.3683 16.5815 47.5 16.25 47.5ZM56.875 47.5H53.75C53.4185 47.5 53.1005 47.3683 52.8661 47.1339C52.6317 46.8995 52.5 46.5815 52.5 46.25C52.5 45.9185 52.6317 45.6005 52.8661 45.3661C53.1005 45.1317 53.4185 45 53.75 45H55.8375L57.5225 36.02C57.5 31.425 53.575 27.5 48.75 27.5H40.5425L36.565 45H43.75C44.0815 45 44.3995 45.1317 44.6339 45.3661C44.8683 45.6005 45 45.9185 45 46.25C45 46.5815 44.8683 46.8995 44.6339 47.1339C44.3995 47.3683 44.0815 47.5 43.75 47.5H35C34.8124 47.5001 34.6272 47.458 34.4582 47.3768C34.2891 47.2956 34.1405 47.1773 34.0233 47.0309C33.9061 46.8844 33.8234 46.7134 33.7813 46.5307C33.7392 46.3479 33.7387 46.158 33.78 45.975L38.325 25.975C38.3874 25.6981 38.5423 25.4507 38.764 25.2735C38.9857 25.0963 39.2612 24.9999 39.545 25H48.75C54.9525 25 60 30.0475 60 36.25L58.1025 46.48C58.0493 46.7667 57.8974 47.0256 57.6732 47.212C57.449 47.3983 57.1665 47.5002 56.875 47.5Z" fill="#F9963E"/>
                    <path d="M48.75 52.5C45.305 52.5 42.5 49.6975 42.5 46.25C42.5 42.8025 45.305 40 48.75 40C52.195 40 55 42.8025 55 46.25C55 49.6975 52.195 52.5 48.75 52.5ZM48.75 42.5C46.6825 42.5 45 44.1825 45 46.25C45 48.3175 46.6825 50 48.75 50C50.8175 50 52.5 48.3175 52.5 46.25C52.5 44.1825 50.8175 42.5 48.75 42.5ZM21.25 52.5C17.805 52.5 15 49.6975 15 46.25C15 42.8025 17.805 40 21.25 40C24.695 40 27.5 42.8025 27.5 46.25C27.5 49.6975 24.695 52.5 21.25 52.5ZM21.25 42.5C19.1825 42.5 17.5 44.1825 17.5 46.25C17.5 48.3175 19.1825 50 21.25 50C23.3175 50 25 48.3175 25 46.25C25 44.1825 23.3175 42.5 21.25 42.5ZM16.25 25H6.25C5.91848 25 5.60054 24.8683 5.36612 24.6339C5.1317 24.3995 5 24.0815 5 23.75C5 23.4185 5.1317 23.1005 5.36612 22.8661C5.60054 22.6317 5.91848 22.5 6.25 22.5H16.25C16.5815 22.5 16.8995 22.6317 17.1339 22.8661C17.3683 23.1005 17.5 23.4185 17.5 23.75C17.5 24.0815 17.3683 24.3995 17.1339 24.6339C16.8995 24.8683 16.5815 25 16.25 25ZM16.25 32.5H3.75C3.41848 32.5 3.10054 32.3683 2.86612 32.1339C2.6317 31.8995 2.5 31.5815 2.5 31.25C2.5 30.9185 2.6317 30.6005 2.86612 30.3661C3.10054 30.1317 3.41848 30 3.75 30H16.25C16.5815 30 16.8995 30.1317 17.1339 30.3661C17.3683 30.6005 17.5 30.9185 17.5 31.25C17.5 31.5815 17.3683 31.8995 17.1339 32.1339C16.8995 32.3683 16.5815 32.5 16.25 32.5ZM16.25 40H1.25C0.918479 40 0.600537 39.8683 0.366117 39.6339C0.131696 39.3995 0 39.0815 0 38.75C0 38.4185 0.131696 38.1005 0.366117 37.8661C0.600537 37.6317 0.918479 37.5 1.25 37.5H16.25C16.5815 37.5 16.8995 37.6317 17.1339 37.8661C17.3683 38.1005 17.5 38.4185 17.5 38.75C17.5 39.0815 17.3683 39.3995 17.1339 39.6339C16.8995 39.8683 16.5815 40 16.25 40Z" fill="#F9963E"/>
                    <path d="M35 47.5H26.25C25.9185 47.5 25.6005 47.3683 25.3661 47.1339C25.1317 46.8995 25 46.5815 25 46.25C25 45.9185 25.1317 45.6005 25.3661 45.3661C25.6005 45.1317 25.9185 45 26.25 45H34.0025L39.6825 20H11.25C10.9185 20 10.6005 19.8683 10.3661 19.6339C10.1317 19.3995 10 19.0815 10 18.75C10 18.4185 10.1317 18.1005 10.3661 17.8661C10.6005 17.6317 10.9185 17.5 11.25 17.5H41.25C41.4376 17.4999 41.6228 17.542 41.7918 17.6232C41.9609 17.7044 42.1095 17.8227 42.2267 17.9691C42.3439 18.1156 42.4266 18.2866 42.4687 18.4693C42.5108 18.6521 42.5113 18.842 42.47 19.025L36.22 46.525C36.1576 46.8019 36.0027 47.0493 35.781 47.2265C35.5593 47.4037 35.2838 47.5001 35 47.5Z" fill="#F9963E"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_405_4874">
                    <rect width="60" height="60" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
                <h2 class="advantages__item-header">Быстрая доставка</h2>
                <div class="advantages__item-desc">более 90% заказов доставляется в течении 24 часов</div>
            </li>
            <li class="advantages__item">
                <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_405_4883)">
                    <path d="M48.375 9H5.625C4.13352 9.00119 2.70347 9.59421 1.64884 10.6488C0.594207 11.7035 0.00119175 13.1335 0 14.625L0 39.375C0 42.4778 2.52225 45 5.625 45H48.375C51.4777 45 54 42.4778 54 39.375V14.625C54 11.5223 51.4777 9 48.375 9ZM51.75 39.375C51.75 41.2358 50.2357 42.75 48.375 42.75H5.625C3.76425 42.75 2.25 41.2358 2.25 39.375V14.625C2.25 12.7643 3.76425 11.25 5.625 11.25H48.375C50.2357 11.25 51.75 12.7643 51.75 14.625V39.375Z" fill="#966137"/>
                    <path d="M12.375 15.75H7.875C7.57663 15.75 7.29048 15.8685 7.07951 16.0795C6.86853 16.2905 6.75 16.5766 6.75 16.875C6.75 17.1734 6.86853 17.4595 7.07951 17.6705C7.29048 17.8815 7.57663 18 7.875 18H12.375C12.6734 18 12.9595 17.8815 13.1705 17.6705C13.3815 17.4595 13.5 17.1734 13.5 16.875C13.5 16.5766 13.3815 16.2905 13.1705 16.0795C12.9595 15.8685 12.6734 15.75 12.375 15.75ZM46.125 36H41.625C41.3266 36 41.0405 36.1185 40.8295 36.3295C40.6185 36.5405 40.5 36.8266 40.5 37.125C40.5 37.4234 40.6185 37.7095 40.8295 37.9205C41.0405 38.1315 41.3266 38.25 41.625 38.25H46.125C46.4234 38.25 46.7095 38.1315 46.9205 37.9205C47.1315 37.7095 47.25 37.4234 47.25 37.125C47.25 36.8266 47.1315 36.5405 46.9205 36.3295C46.7095 36.1185 46.4234 36 46.125 36ZM31.5 15.75H23.625C23.3266 15.75 23.0405 15.8685 22.8295 16.0795C22.6185 16.2905 22.5 16.5766 22.5 16.875V31.5H19.125C18.8266 31.5 18.5405 31.6185 18.3295 31.8295C18.1185 32.0405 18 32.3266 18 32.625C18 32.9234 18.1185 33.2095 18.3295 33.4205C18.5405 33.6315 18.8266 33.75 19.125 33.75H22.5V37.125C22.5 37.4234 22.6185 37.7095 22.8295 37.9205C23.0405 38.1315 23.3266 38.25 23.625 38.25C23.9234 38.25 24.2095 38.1315 24.4205 37.9205C24.6315 37.7095 24.75 37.4234 24.75 37.125V33.75H28.125C28.4234 33.75 28.7095 33.6315 28.9205 33.4205C29.1315 33.2095 29.25 32.9234 29.25 32.625C29.25 32.3266 29.1315 32.0405 28.9205 31.8295C28.7095 31.6185 28.4234 31.5 28.125 31.5H24.75V29.25H31.5C35.2215 29.25 38.25 26.2215 38.25 22.5C38.25 18.7785 35.2215 15.75 31.5 15.75ZM31.5 27H24.75V18H31.5C33.9818 18 36 20.0182 36 22.5C36 24.9818 33.9818 27 31.5 27Z" fill="#966137"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_405_4883">
                    <rect width="54" height="54" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>    
                <h2 class="advantages__item-header">Оплата</h2>
                <div class="advantages__item-desc">любая форма расчета: безналичная, наличная</div>
            </li>
            <li class="advantages__item">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_405_4894)">
                    <path d="M39.5834 50.0001H25C24.7238 50.0001 24.4588 49.8903 24.2635 49.695C24.0681 49.4996 23.9584 49.2347 23.9584 48.9584V36.4584C23.9584 36.1821 24.0681 35.9172 24.2635 35.7218C24.4588 35.5265 24.7238 35.4167 25 35.4167H39.5834C39.8596 35.4167 40.1246 35.5265 40.3199 35.7218C40.5153 35.9172 40.625 36.1821 40.625 36.4584V48.9584C40.625 49.2347 40.5153 49.4996 40.3199 49.695C40.1246 49.8903 39.8596 50.0001 39.5834 50.0001ZM26.0417 47.9167H38.5417V37.5001H26.0417V47.9167Z" fill="#966137"/>
                    <path d="M32.2916 37.5001H17.7083C17.432 37.5001 17.1671 37.3903 16.9717 37.195C16.7764 36.9996 16.6666 36.7347 16.6666 36.4584V23.9584C16.6666 23.6821 16.7764 23.4172 16.9717 23.2218C17.1671 23.0265 17.432 22.9167 17.7083 22.9167H32.2916C32.5679 22.9167 32.8328 23.0265 33.0282 23.2218C33.2235 23.4172 33.3333 23.6821 33.3333 23.9584V36.4584C33.3333 36.7347 33.2235 36.9996 33.0282 37.195C32.8328 37.3903 32.5679 37.5001 32.2916 37.5001ZM18.75 35.4167H31.25V25.0001H18.75V35.4167Z" fill="#966137"/>
                    <path d="M25 50.0001H10.4167C10.1404 50.0001 9.87545 49.8903 9.6801 49.695C9.48475 49.4996 9.375 49.2347 9.375 48.9584V36.4584C9.375 36.1821 9.48475 35.9172 9.6801 35.7218C9.87545 35.5265 10.1404 35.4167 10.4167 35.4167H25C25.2763 35.4167 25.5412 35.5265 25.7366 35.7218C25.9319 35.9172 26.0417 36.1821 26.0417 36.4584V48.9584C26.0417 49.2347 25.9319 49.4996 25.7366 49.695C25.5412 49.8903 25.2763 50.0001 25 50.0001ZM11.4583 47.9167H23.9583V37.5001H11.4583V47.9167ZM25 28.1251C24.7237 28.1251 24.4588 28.0153 24.2634 27.82C24.0681 27.6246 23.9583 27.3597 23.9583 27.0834V23.9584C23.9583 23.6821 24.0681 23.4172 24.2634 23.2218C24.4588 23.0265 24.7237 22.9167 25 22.9167C25.2763 22.9167 25.5412 23.0265 25.7366 23.2218C25.9319 23.4172 26.0417 23.6821 26.0417 23.9584V27.0834C26.0417 27.3597 25.9319 27.6246 25.7366 27.82C25.5412 28.0153 25.2763 28.1251 25 28.1251Z" fill="#966137"/>
                    <path d="M17.7083 40.6251C17.4321 40.6251 17.1671 40.5153 16.9718 40.32C16.7764 40.1246 16.6667 39.8597 16.6667 39.5834V36.4584C16.6667 36.1821 16.7764 35.9172 16.9718 35.7218C17.1671 35.5265 17.4321 35.4167 17.7083 35.4167C17.9846 35.4167 18.2496 35.5265 18.4449 35.7218C18.6403 35.9172 18.75 36.1821 18.75 36.4584V39.5834C18.75 39.8597 18.6403 40.1246 18.4449 40.32C18.2496 40.5153 17.9846 40.6251 17.7083 40.6251ZM32.2917 40.6251C32.0154 40.6251 31.7504 40.5153 31.5551 40.32C31.3597 40.1246 31.25 39.8597 31.25 39.5834V36.4584C31.25 36.1821 31.3597 35.9172 31.5551 35.7218C31.7504 35.5265 32.0154 35.4167 32.2917 35.4167C32.5679 35.4167 32.8329 35.5265 33.0282 35.7218C33.2236 35.9172 33.3333 36.1821 33.3333 36.4584V39.5834C33.3333 39.8597 33.2236 40.1246 33.0282 40.32C32.8329 40.5153 32.5679 40.6251 32.2917 40.6251ZM1.04167 18.7501C0.765399 18.7501 0.500448 18.6403 0.305097 18.445C0.109747 18.2496 3.87757e-08 17.9847 3.87757e-08 17.7084V13.5417C-6.28624e-05 13.3111 0.0764036 13.087 0.217411 12.9045C0.358419 12.722 0.555996 12.5915 0.779167 12.5334L48.6958 0.0333876C48.8498 -0.00586743 49.0107 -0.0095151 49.1663 0.0227216C49.3219 0.0549583 49.4682 0.122232 49.5939 0.219432C49.7196 0.316633 49.8215 0.441204 49.8919 0.583686C49.9622 0.726167 49.9992 0.882811 50 1.04172V5.20839C50.0001 5.439 49.9236 5.66312 49.7826 5.8456C49.6416 6.02808 49.444 6.15861 49.2208 6.21672L1.30417 18.7167C1.21848 18.7392 1.13024 18.7504 1.04167 18.7501ZM2.08333 14.3459V16.3605L47.9167 4.40422V2.38964L2.08333 14.3459Z" fill="#966137"/>
                    <path d="M44.7916 50H5.20829C4.93203 50 4.66707 49.8903 4.47172 49.6949C4.27637 49.4996 4.16663 49.2346 4.16663 48.9583V16.6208C4.16663 16.3446 4.27637 16.0796 4.47172 15.8843C4.66707 15.6889 4.93203 15.5792 5.20829 15.5792C5.48456 15.5792 5.74951 15.6889 5.94486 15.8843C6.14021 16.0796 6.24996 16.3446 6.24996 16.6208V47.9167H43.75V6.29584C43.75 6.01957 43.8597 5.75462 44.0551 5.55927C44.2504 5.36392 44.5154 5.25417 44.7916 5.25417C45.0679 5.25417 45.3328 5.36392 45.5282 5.55927C45.7235 5.75462 45.8333 6.01957 45.8333 6.29584V48.9583C45.8333 49.2346 45.7235 49.4996 45.5282 49.6949C45.3328 49.8903 45.0679 50 44.7916 50ZM9.37496 12.4104C9.09903 12.4093 8.83472 12.2992 8.6396 12.1041C8.44449 11.909 8.33439 11.6447 8.33329 11.3688V5.20834C8.3333 5.01505 8.38709 4.82558 8.48863 4.66111C8.59018 4.49665 8.73549 4.36368 8.90829 4.27709L13.075 2.19376C13.2338 2.11418 13.4103 2.07653 13.5878 2.0844C13.7652 2.09226 13.9377 2.14538 14.0889 2.2387C14.24 2.33201 14.3648 2.46244 14.4513 2.61756C14.5379 2.77269 14.5833 2.94737 14.5833 3.12501V10.2813C14.5834 10.5119 14.5069 10.736 14.3659 10.9185C14.2249 11.1009 14.0273 11.2315 13.8041 11.2896L9.63746 12.3771C9.55159 12.3985 9.46347 12.4097 9.37496 12.4104ZM10.4166 5.85209V10.0188L12.5 9.47501V4.81042L10.4166 5.85209Z" fill="#966137"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_405_4894">
                    <rect width="50" height="50" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>    
                <h2 class="advantages__item-header">Без посредников</h2>
                <div class="advantages__item-desc">собственное производство и свои склады</div>
            </li>
            <li class="advantages__item">
                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_405_4905)">
                    <path d="M21.0828 42.1669C9.45855 42.1669 0 32.7088 0 21.0845C0 9.46025 9.45855 0.00170898 21.0828 0.00170898C25.1249 0.00170898 29.0576 1.15347 32.4558 3.33454C33.1229 3.76416 33.3183 4.6534 32.8888 5.32227C32.4578 5.99123 31.5703 6.18456 30.9014 5.7553C27.969 3.87116 24.5729 2.87662 21.0828 2.87662C11.0434 2.87662 2.87491 11.0451 2.87491 21.0845C2.87491 31.1235 11.0434 39.292 21.0828 39.292C31.1218 39.292 39.2903 31.1235 39.2903 21.0845C39.2903 20.4844 39.2616 19.8902 39.2061 19.3059C39.1296 18.5142 39.7084 17.8127 40.4979 17.7361C41.2914 17.6632 41.9909 18.2383 42.0677 19.028C42.133 19.7116 42.1655 20.3979 42.1652 21.0845C42.1652 32.7088 32.707 42.1669 21.0828 42.1669Z" fill="#966137"/>
                    <path d="M23.4783 25.8756C23.1105 25.8756 22.7424 25.7355 22.4626 25.4541L13.8379 16.8293C13.2764 16.2676 13.2764 15.3572 13.8379 14.7957C14.3994 14.2342 15.3097 14.2342 15.8712 14.7957L23.4803 22.4048L43.545 2.33971C44.1069 1.7782 45.0173 1.7782 45.5788 2.33971C46.1403 2.90121 46.1403 3.81157 45.5788 4.37308L24.496 25.4559C24.2257 25.725 23.8597 25.876 23.4783 25.8756Z" fill="#966137"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_405_4905">
                    <rect width="46" height="46" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>                        
                <h2 class="advantages__item-header">Льготные</h2>
                <div class="advantages__item-desc">организован отпуск угля льготным категориям в московской области</div>
            </li>
        </ul>
    </div>
</section>

<section class="answers main-container" id="answers">
    <div class="answers__left-wrapper">
        <h3 class="answers__header">Вопрос - ответ</h3>
        <div class="answers__accardeon">
            <?php foreach (carbon_get_theme_option('answers_complex') as $index => $element): ?>
            <div class="answers__accardeon-item <?php if($index==0) echo 'answers__accardeon-item--active' ?>">
                <div class="answers__accardeon-item-title"><?=$element['answers_header']?></div>
            </div>
            <div class="answers__accardeon-item-content">
                <h2 class="answers__accardeon-item-content-header"><?=$element['answers_header']?></h2>
                <div class="answers__accardeon-item-content-desc"><?=apply_filters( 'the_content', $element['answers__content']);?></div>
            </div>   
            <?php endforeach; ?>
            <div class="answers__added-info answers__added-info--desktop">
                <p class="answers__desc">Если Вы не нашли ответ на вопрос, пожалуйста заполните форму, мы свяжемся с Вами ответим на все интересующие </p>
                <p class="answers__sub-desc">среднее время ожидания 10 минут в рабочие будни</p>
                <a href="#order" class="answers__button primary-button primary-button--outline">Задать вопрос</a>
            </div>
        </div>        
    </div>
    <div class="answers__right-wrapper">
        <div class="answers__main-item">
            <div class="answers__accardeon-item-content">
                <h2 class="answers__accardeon-item-header"></h2>
                <p class="answers__accardeon-item-desc"></p>
            </div>
        </div>
        <div id ="map1" class="answers__map shop-map">
            <div class="shop-map__tabs">
            </div>
        </div>
        <div class="answers__added-info answers__added-info--smart">
            <p class="answers__desc">Если Вы не нашли ответ на вопрос, пожалуйста заполните форму, мы свяжемся с Вами ответим на все интересующие </p>
            <p class="answers__sub-desc">среднее время ожидания 10 минут в рабочие будни</p>
            <a href="" class="answers__button primary-button primary-button--outline">Задать вопрос</a>
        </div>
    </div>
</section>

<section class="partners">
    <h3 class="partners__header main-container">Партнеры</h3>
    <div class="partners__slider">
        <button class="partners__slider-arrow partners__slider-arrow--left"></button>
        <button class="partners__slider-arrow partners__slider-arrow--right"></button>
        <ul class="partners__slider-dots-list">
            <li class="partners__slider-dot partners__slider-dot--active"></li>
            <li class="partners__slider-dot"></li>
        </ul>
        <div class="partners__slider-container">
            <div class="partners__slider-track partners__slider-track--transition">
                <?php foreach(carbon_get_theme_option('partners_complex') as $element): ?>                
                <a class="partners__slider-item" href="<?=$element['partners_link']?>">
                    <img class="partners__slider-item-image" src="<?=wp_get_attachment_image_url($element['partners_logo'], 'partners_logo')?>">
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<section class="order main-container" id="order">
    <div class="order__logotype">
        <img class="order__logotype-image" src="<?= get_template_directory_uri() ?>/assets/logo.svg" alt="logotype" width="382" height="515">
    </div>
    <div class="order__text-wrapper">
        <h3 class="order__header"><span class="order__header--special">Заказать</span> сейчас</h3>
        <p class="order__desc">Выбирайте нужную позицию из каталога или оставьте свои контакты и мы Вам поможем с выбором</p>
        <small class="order__small">среднее время ожидания 10 минут в рабочие будни</small>
        <form class="order__form" action="">
            <label class="order__label">
                Как вас зовут?
                <input class="order__field" type="text">
            </label>
            <label class="order__label">
                Номер телефона
                <input class="order__field" type="tel">
            </label>
            <input class="order__submit primary-button" type="submit" value="Помочь с выбором">
            <label class="order__checkbox-label">
                <input class="order__checkbox-field" type="checkbox">
                <span>Отправляя запрос вы соглашаетесь на обработку персональных данных</span>
            </label>
        </form>
        <div class="order__contact-wrapper">
            <div class="order__contact-text">
                <a class="order__contact-tel" href="tel:<?= carbon_get_theme_option('phone') ?>"><?= carbon_get_theme_option('formatted_phone') ?></a>
                <p class="order__contact-info">работаем ежедневно без выходных с 08:00 до 20:00</p>
            </div>
            <a href="<?= carbon_get_theme_option('whatsapp_link') ?>" class="order__contact-button order__contact-button--whatsapp">Написать в Whatsapp</a>
            <a href="<?= carbon_get_theme_option('telegram_link') ?>" class="order__contact-button order__contact-button--telegram">Написать в Telegram</a>
        </div>
    </div>
</section>
<section class="location main-container">
    <div class="location__left">
        <h3 class="location__header">Склад в озерках</h3>
        <h4 class="location__sub-header">ОАО "Озерское лес топливное предприятие"</h4>
        <p class="location__address">140560, Московская область, Озерский г.о., город Озеры, ул. Юрия Сергеева, д.29 а</p>

        <p class="location__mark">
            <small class="location__mark--special">4.9</small>
            <small class="location__mark--default">средняя оценка нашей работы, из учета более чем 2000 заказов</small>
        </p>
    </div>
    <div class="location__right">
        <div id ="map2" class="location__map shop-map">
            <div class="shop-map__tabs">
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>