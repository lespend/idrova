export function CardModal() {
    const modal = document.querySelector('.buy-modal');
    const closeButton = document.querySelector('.buy-modal__close');
    const cards = document.querySelectorAll('.primary-card');
    const quantityField = modal.querySelector('.primary-quantity-input input');
    const quantityPlus = modal.querySelector('.primary-quantity-input__plus');
    const quantityMinus = modal.querySelector('.primary-quantity-input__minus');

    this.init = function() {
        for (let card of cards) {
            card.addEventListener('click', showModal);
        }
        closeButton.addEventListener('click', closeModal);
        quantityPlus.addEventListener('click', (e) => {
            e.preventDefault();
            if (Number.isNaN(parseInt(quantityField.value))) {
                quantityField.value = 0;
            } else {
                quantityField.value = parseInt(quantityField.value) + 1;
            }
        });

        quantityMinus.addEventListener('click', (e) => {
            e.preventDefault();
            const num = parseInt(quantityField.value);
            if (Number.isNaN(num) || num <= 0) {
                quantityField.value = 0;
            } else {
                quantityField.value = parseInt(quantityField.value) - 1;
            }
        });
    }
   
    function showModal() {
        modal.showModal();
        document.body.classList.toggle('dont-scroll');
    }

    function closeModal() {
        modal.close();
        document.body.classList.toggle('dont-scroll');
    }
}