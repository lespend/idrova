export function Accardeon() {
    let accardeonItems = document.querySelectorAll('.answers__accardeon-item');

    this.init = function() {
        renderActiveItem();
        accardeonItems.forEach((item) => {
            item.addEventListener('click', () => changeActiveItem(item));
        })
    }

    let changeActiveItem = function(item) {
        accardeonItems.forEach((other) => {
            other.classList.remove('answers__accardeon-item--active');
        });
        item.classList.add('answers__accardeon-item--active');
        renderActiveItem();
    }

    let renderActiveItem = function() {
        if (window.innerWidth > 1200) {
            let activeItemContent = document.querySelector('.answers__accardeon-item--active+.answers__accardeon-item-content');
            let placeForItem = document.querySelector('.answers__main-item');
            if (activeItemContent === null) return;
            placeForItem.innerHTML = activeItemContent.innerHTML;
        } else {
            let prevActiveItemContent = document.querySelector('.answers__accardeon-item-content--active');
            prevActiveItemContent?.classList.remove('answers__accardeon-item-content--active')
            let activeItemContent = document.querySelector('.answers__accardeon-item--active+.answers__accardeon-item-content');
            let activeItemButton = document.querySelector('.answers__accardeon-item--active');
            activeItemContent.classList.add('answers__accardeon-item-content--active');
        }
    }

    window.addEventListener('resize', () => renderActiveItem);
}