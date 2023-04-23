export function SliderWithPagination() {
    let items = document.querySelectorAll('.partners__slider-item');
    let slider = document.querySelector('.partners__slider');
    let sliderContainer = document.querySelector('.partners__slider-container');
    let sliderTrack = document.querySelector('.partners__slider-track');
    let btnNext = document.querySelector('.partners__slider-arrow--right');
    let btnPrev = document.querySelector('.partners__slider-arrow--left');
    let dotList = document.querySelector('.partners__slider-dots-list');
    let dots = document.querySelectorAll('.partners__slider-dot');
    let width = 228;
    let gap = 35;
    let showItemsNum = 5;
    let scrollItemsNum = 5;
    let position = 0;
    
    this.init = function() {
        createDots();
        checkButtons();
        changeActiveDot();
        btnNext.addEventListener('click', () => {
            let itemsLeft = items.length - (Math.floor(Math.abs(position) / (width + gap)) + showItemsNum);
            console.log(itemsLeft);
            position -= itemsLeft >= scrollItemsNum ? scrollItemsNum * (width + gap) : itemsLeft * (width + gap);
            sliderTrack.style.transform = `translateX(${position}px)`;
            checkButtons();
            changeActiveDot();
        })

        btnPrev.addEventListener('click', () => {
            let itemsLeft = Math.floor(Math.abs(position) / (width + gap));
            console.log(itemsLeft);
            position += itemsLeft >= scrollItemsNum ? scrollItemsNum * (width + gap) : itemsLeft * (width + gap);
            sliderTrack.style.transform = `translateX(${position}px)`;
            checkButtons();
            changeActiveDot();
        })
        this.resize();
    }

    this.resize = function() {
        showItemsNum = Math.floor(sliderTrack.clientWidth / (width + gap));
        scrollItemsNum = showItemsNum;
        createDots();
        checkButtons();
        changeActiveDot();
        if (window.innerWidth <= 1200) {
            sliderTrack.classList.remove('partners__slider-track--transition')
            btnNext.style.display = 'none';
            btnPrev.style.display = 'none';
            dotList.innerHTML = '';
            let pressed = false;
            let startX;
            let scrollLeft;

            slider.addEventListener('mousedown', start);
            slider.addEventListener('touchstart', start);

            slider.addEventListener('mousemove', move);
            slider.addEventListener('touchmove', move);

            slider.addEventListener('touchend', end);
            slider.addEventListener('mouseup', end);
            slider.addEventListener('mouseleave', end);

            function start(e) {
                pressed = true;
                startX = e.pageX || e.touches[0].pageX - slider.offsetLeft;
                slider.style.cursor = 'grabbing';
                scrollLeft = sliderContainer.scrollLeft;
            }

            function move(e) {
                if(!pressed) return;
                e.preventDefault();
                let x = e.pageX || e.touches[0].pageX - slider.offsetLeft;
                sliderContainer.scrollLeft = scrollLeft - (x - startX);
            }

            function end() {
                pressed = false;
                slider.style.cursor = 'grab';
            }
        }
    }

    function scrollItem() {
        
    }

    function checkButtons() {
        btnPrev.disabled = position >= 0;
        let scrolledItems = items.length - showItemsNum;
        btnNext.disabled = position <= -(scrolledItems * (width + gap));
    }

    function changeActiveDot() {
        let dotIndex = Math.ceil(Math.abs(position) / (scrollItemsNum * (width + gap)));
        let prevActiveDot = document.querySelector('.partners__slider-dot--active');
        prevActiveDot?.classList.remove('partners__slider-dot--active');
        dots[dotIndex].classList.add('partners__slider-dot--active');
    }

    function createDots() {
        dotList.innerHTML = '';
        for (let i = 0; i < Math.ceil(items.length / showItemsNum); i++) {
            let elem = document.createElement('li');
            elem.classList.add('partners__slider-dot');
            dotList.append(elem);
        }
        dots = document.querySelectorAll('.partners__slider-dot');
        dots.forEach((el, index) => {
            el.addEventListener('click', () => {
                if (index == dots.length - 1) {
                    position = index * -scrollItemsNum * (width + gap) + (scrollItemsNum - items.length % scrollItemsNum) * (width + gap);
                } else {
                    position = index * -scrollItemsNum * (width + gap);
                }
                sliderTrack.style.transform = `translateX(${position}px)`;
                changeActiveDot();
                checkButtons();
            });
        });
    }
}