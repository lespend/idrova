export function Map(id) {
    const root = document.getElementById(id);

    let mapDestroy;
    function mapInit() {
        let map = new ymaps.Map(id, {
            center: [WP.mapCoords[0].latitude, WP.mapCoords[0].longitude],
            zoom: 10
        });
        mapDestroy = function() {
            map.destroy();
        }
        
        for (let pos of WP.mapCoords) {
            let placemark = new ymaps.Placemark([pos.latitude, pos.longitude], {}, {
                iconLayout: 'default#image',
                iconImageHref: `${WP.siteUrl}/assets/map-location-icon.png`,
                iconImageSize: [52, 58],
                iconImageOffset: [-26, -58]
            });
    
            map.geoObjects.add(placemark);
        }
    
        // Яндекс карта ui-элементы
        let mapTabs = root.querySelectorAll('.shop-map__button');
        mapTabs.forEach((el, index) => {
            el.addEventListener('click', () => {
                let prevActive = root.querySelector('.shop-map__button--active');
                prevActive.classList.remove('shop-map__button--active');
                el.classList.add('shop-map__button--active');
                map.panTo([parseFloat(WP.mapCoords[index].latitude), parseFloat(WP.mapCoords[index].longitude)], {delay: 5000});
            })
        })
        
    
        map.controls.remove('geolocationControl'); // удаляем геолокацию
        map.controls.remove('searchControl'); // удаляем поиск
        map.controls.remove('trafficControl'); // удаляем контроль трафика
        map.controls.remove('typeSelector'); // удаляем тип
        map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
        map.controls.remove('zoomControl'); // удаляем контрол зуммирования
        map.controls.remove('rulerControl'); // удаляем контрол правил
        //map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
    }

    this.init = function() {
        //Герация ui-элементов
        const mapTabsContainer = root.querySelector('.shop-map__tabs');
        for(let i = 0; i < WP.mapCoords.length; i++) {
            let tab = document.createElement('button');
            tab.classList.add('shop-map__button');
            tab.innerHTML = WP.mapCoords[i].city;
            if (i === 0) tab.classList.add('shop-map__button--active');
            mapTabsContainer.insertAdjacentElement('beforeend', tab);
        }
        ymaps.ready(mapInit);
    }

    this.resize = function() {
        mapDestroy();
        ymaps.ready(mapInit);
    }
}