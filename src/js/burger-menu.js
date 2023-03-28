export function BurgerMenu() {
    let button = document.querySelector('.main-header__burger');
    let nav = document.querySelector('.main-header__phone-wrapper');
    this.init = function() {
        button.addEventListener('click', () => {
            document.body.classList.toggle('dont-scroll');
            nav.classList.toggle('main-header__phone-wrapper--active');
            button.classList.toggle('main-header__burger--active');
        });
    }
}