export function Slider() {
    let position = 0;
    let sliderTrack = document.querySelector('.mass-media__slider-track');
    let sliderItems = document.querySelectorAll('.mass-media__block');
    let buttonNext = document.querySelector('.mass-media__slider-arrow--right');
    let buttonPrev = document.querySelector('.mass-media__slider-arrow--left');

    this.init = function() {
        checkButtons()
        buttonNext.addEventListener('click', () => {
            position -= 330;
            sliderTrack.style.transform = `translateX(${position}px)`;
            checkButtons();
        })

        buttonPrev.addEventListener('click', () => {
            position += 330;
            sliderTrack.style.transform = `translateX(${position}px)`;
            checkButtons();
        })
    }

    let checkButtons = function() {
        buttonPrev.disabled = position === 0;
        buttonNext.disabled = position <= -(sliderItems.length - 2) * 330;
    }
}