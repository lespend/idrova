<footer class="main-footer">
        <div class="main-footer__content">
            <div class="main-container">
                <h2 class="main-footer__title">
                    <small>дрова высокого<br>качества</small>
                    IDrova
                </h2>
                <div class="main-footer__middle-wrapper">
                    <small class="main-footer__info">работаем ежедневно<br>без выходных с 08:00 до 20:00</small>
                    <nav class="footer-navigation main-footer__navigation">
                        <ul class="footer-navigation__list">
                            <li class="footer-navigation__item"><a href="#catalog" class="footer-navigation__link">Каталог и цены</a></li>
                            <li class="footer-navigation__item"><a href="#advantages" class="footer-navigation__link">Оплата и доставка</a></li>
                            <li class="footer-navigation__item"><a href="#answers" class="footer-navigation__link">Вопрос ответ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="main-footer__contact-wrapper">
                    <a href="tel:<?= carbon_get_theme_option('phone') ?>" class="main-footer__contact-tel"><?= carbon_get_theme_option('formatted_phone') ?></a>
                    <a href="#order" class="main-footer__buy-now primary-button">Заказать онлайн</a>
                </div>
            </div>
        </div>
        <div class="main-footer__politic main-container">
            <p class="main-footer__politic-desc">Наш веб-сайт использует cookie, а также другие технологии для улучшения работоспобности веб-сайта, анализа использования данных сайта и в иных целях. Продолжая работу на веб-сайте, Вы даете свое согласие на обработку своих персональных данных в соответствии с Политикой конфиденциальности</p>
            <div class="main-footer__politic-wrapper-right">
                <a href="" class="main-footer__politic-file">Политика конфиденциальности</a>
                <a href="" class="main-footer__politic-file">Условия пользования</a>
            </div>
        </div>
        <dialog class="buy-modal">
            <button class="buy-modal__close"></button>
            <div class="buy-modal__container">
                <h2 class="buy-modal__header">Березовые дрова</h2>
                <p class="buy-modal__price">2290 <small>₽\м³</small></p>
                <form action="" class="buy-modal__form">
                    <label class="primary-label primary-quantity-input">
                        <span class="primary-quantity-input__label">Количество</span>
                        <button class="primary-quantity-input__plus"></button>
                        <button class="primary-quantity-input__minus"></button>
                        <input class="primary-input primary-input--quantity buy-modal__input" type="text" value="1" required>
                        <span class="primary-quantity-input__span">м³</span>
                    </label>
                    <label class="primary-label buy-modal__label" for="buy-modal__name">Как Вас зовут?</label>
                    <input class="primary-input buy-modal__input" type="text" id="buy-modal__name" required>
                    <label class="primary-label buy-modal__label" for="buy-modal__phone">Номер телефона</label>
                    <input class="primary-input buy-modal__input" type="tel" id="buy-modal__phone" required>
                    <label class="primary-label buy-modal__label" for="buy-modal__address">Адрес доставки</label>
                    <input class="primary-input buy-modal__input" type="text" id="buy-modal__address" required>
                    <input class="primary-button primary-button--submit buy-modal__submit" type="submit" value="Оформить заказ">
                    <label class="primary-checkbox-label buy-modal__chackbox-label">
                        <input class="primary-checkbox buy-modal__checkbox" type="checkbox" required>
                        <span>Отправляя запрос вы соглашаетесь на обработку данных</span>
                    </label>
                </form>
            </div>
        </dialog>
        <?php wp_footer(); ?>        
    </footer>
</body>
</html>