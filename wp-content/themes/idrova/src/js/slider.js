export function Slider() {
    let position = 0;
    let sliderContainer = document.querySelector('.mass-media__slider-container');
    let sliderTrack = document.querySelector('.mass-media__slider-track');
    let sliderItems = document.querySelectorAll('.mass-media__block');
    let buttonNext = document.querySelector('.mass-media__slider-arrow--right');
    let buttonPrev = document.querySelector('.mass-media__slider-arrow--left');

    this.init = function() {
        this.resize();
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

    this.resize = function() {
        if (window.innerWidth <= 800) {
            buttonNext.style.display = 'none';
            buttonPrev.style.display = 'none';

            let pressed = false;
            let startX;
            let scrollLeft;

            sliderContainer.addEventListener('mousedown', start);
            sliderContainer.addEventListener('touchstart', start);

            sliderContainer.addEventListener('mousemove', move);
            sliderContainer.addEventListener('touchmove', move);

            sliderContainer.addEventListener('touchend', end);
            sliderContainer.addEventListener('mouseup', end);
            sliderContainer.addEventListener('mouseleave', end);

            function start(e) {
                pressed = true;
                startX = e.pageX || e.touches[0].pageX - sliderContainer.offsetLeft;
                sliderContainer.style.cursor = 'grabbing';
                scrollLeft = sliderContainer.scrollLeft;
            }

            function move(e) {
                if(!pressed) return;
                e.preventDefault();
                let x = e.pageX || e.touches[0].pageX - sliderContainer.offsetLeft;
                sliderContainer.scrollLeft = scrollLeft - (x - startX);
            }

            function end() {
                pressed = false;
                sliderContainer.style.cursor = 'grab';
            }
        }
    }

    let checkButtons = function() {
        buttonPrev.disabled = position === 0;
        buttonNext.disabled = position <= -(sliderItems.length - 2) * 330;
    }
}