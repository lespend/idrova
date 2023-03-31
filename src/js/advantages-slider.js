export function AdvantagesSlider() {
    this.init = function() {
        if (window.innerWidth >= 990) return;
        let slider = document.querySelector('.advantages__content-wrapper');
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
            scrollLeft = slider.scrollLeft;
        }

        function move(e) {
            if(!pressed) return;
            e.preventDefault();
            let x = e.pageX || e.touches[0].pageX - slider.offsetLeft;
            slider.scrollLeft = scrollLeft - (x - startX);
        }

        function end() {
            pressed = false;
            slider.style.cursor = 'grab';
        }
    }
}
