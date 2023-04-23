export function ShowLabel() {
    // Ключ это какая категория ярлыка, значение - какой класс нужно применить
    const labelConfig = {
        'новое': 'primary-card__label--brown',
        'хит': 'primary-card__label--red',
        'акция': 'primary-card__label--orange',
        '': ''
    }
    const root = document.querySelector('.catalog');
    const labels = root.querySelectorAll('.primary-card__label');

    this.init = function() {
        for (let label of labels) {
            let key = label.innerHTML;
            label.classList.add(labelConfig[key]);
        }
    }
}