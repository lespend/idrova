import '../styles/main.scss';
import { Slider } from './slider';
import { Accardeon } from './accardeon';
import { Map } from './map';
import { SliderWithPagination } from './slider-with-pagination';

function App() {
    let slider = new Slider();
    let sliderWithPagination = new SliderWithPagination();
    let accardeon = new Accardeon();
    let map1 = new Map('map1');
    let map2 = new Map('map2');

    this.init = function() {
        slider.init();
        sliderWithPagination.init();
        accardeon.init();
        map1.init();
        map2.init();
    }
}

let idrova = new App();
idrova.init();






