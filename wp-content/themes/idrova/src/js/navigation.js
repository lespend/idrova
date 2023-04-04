export function Navigation() {
    const anchors = document.querySelectorAll('a[href*="#"]')
    this.init = function () {
        for (let anchor of anchors) {
            anchor.addEventListener('click', function(event) {
                event.preventDefault();
                const elementID = anchor.getAttribute('href');
                document.querySelector(elementID).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                });
            });
        }
    }
}