export function CardModal() {
    const modal = document.querySelector('.buy-modal');
    const modalHeader = document.querySelector('.buy-modal__header');
    const modalPrice = document.querySelector('.buy-modal__price');
    const modalHeaderField = modal.querySelector('input[name=product_name]');
    const modalPriceField = modal.querySelector('input[name=product_price]');
    const closeButton = document.querySelector('.buy-modal__close');
    const cards = document.querySelectorAll('.primary-card');
    const quantityField = modal.querySelector('.primary-quantity-input input');
    const quantityPlus = modal.querySelector('.primary-quantity-input__plus');
    const quantityMinus = modal.querySelector('.primary-quantity-input__minus');
    const submitButton = modal.querySelector('.buy-modal__submit');

    this.init = function() {
        for (let card of cards) {
            card.addEventListener('click', () => showModal(card));
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
   
    function showModal(card) {
        let targetName = card.querySelector('.primary-card__header').innerHTML;
        let targetPrice = card.querySelector('.primary-card__price').innerHTML;
        modalHeader.innerHTML = targetName;
        modalPrice.innerHTML = targetPrice;
        modalHeaderField.value = targetName;
        modalPriceField.value = targetPrice;
        modal.showModal();
        document.body.classList.toggle('dont-scroll');
    }

    function closeModal() {
        modal.close();
        document.body.classList.toggle('dont-scroll');
    }

    function serialize(form) {
        let serialize = function(form) {
        let items = form.querySelectorAll('input, select, textarea');
        let str = '';
        for (let i = 0; i < items.length; i += 1) {
            let item = items[i];
            let name = item.name;
            let value = item.value;
            let separator = i === 0 ? '' : '&';
    
            if (value) {
                str += separator + name + '=' + value;
            }
        }
        return str;
        }
    }

    function formSend(form) {
        let data = serialize(form);
        let xhr = new XMLHttpRequest();
        let url = WPJS.ajaxUrl + '?action=send_email';

        xhr.open('POST', url);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            console.log(xhr.response);
        }
    }
}