export function Map(id) {
    const root = document.getElementById(id);
    let coords = [
        [60.0555868167543,30.43705542838387],
        [55.64222236904938,37.59777347491282],
        [56.00928885994502,37.84980964160128],
    ];

    let mapDestroy;
    function mapInit() {
        let map = new ymaps.Map(id, {
            center: coords[0],
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
                map.panTo(coords[index], {delay: 10000});
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
        ymaps.ready(mapInit);
    }

    this.resize = function() {
        mapDestroy();
        ymaps.ready(mapInit);
    }
}