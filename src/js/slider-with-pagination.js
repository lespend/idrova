export function SliderWithPagination() {
    let items = document.querySelectorAll('.partners__slider-item');
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
        let hsl = 0;
        for (let item of items) {
            item.style.background = `hsl(${hsl},100%, 50%)`
            hsl += 30;
        }

        
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

    function scrollItem() {
        
    }

    function checkButtons() {
        btnPrev.disabled = position >= 0;
        let scrolledItems = items.length - showItemsNum;
        btnNext.disabled = position <= -(scrolledItems * (width + gap));
    }

    function changeActiveDot() {
        let dotIndex = Math.round(Math.abs(position) / (scrollItemsNum * (width + gap)));
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
    }
}