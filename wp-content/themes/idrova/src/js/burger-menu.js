export function BurgerMenu() {
    let button = document.querySelector('.main-header__burger');
    let nav = document.querySelector('.main-header__phone-wrapper');
    let links = document.querySelector('.header-navigation').querySelectorAll('.header-navigation__link');
    this.init = function() {
        button.addEventListener('click', toggleDialog);
        for (let link of links) {
            link.addEventListener('click', closeDialog);
        }
    }

    function toggleDialog() {
        document.body.classList.toggle('dont-scroll');
        nav.classList.toggle('main-header__phone-wrapper--active');
        button.classList.toggle('main-header__burger--active');
    }

    function closeDialog() {
        document.body.classList.remove('dont-scroll');
        nav.classList.remove('main-header__phone-wrapper--active');
        button.classList.remove('main-header__burger--active');
    }
}