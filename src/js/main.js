import '../styles/main.scss';
import { Slider } from './slider';
import { Accardeon } from './accardeon';
import { Map } from './map';
import { SliderWithPagination } from './slider-with-pagination';
import { BurgerMenu } from './burger-menu';

function App() {
    let slider = new Slider();
    let sliderWithPagination = new SliderWithPagination();
    let accardeon = new Accardeon();
    let map1 = new Map('map1');
    let map2 = new Map('map2');
    let menu = new BurgerMenu();

    this.init = function() {
        slider.init();
        sliderWithPagination.init();
        accardeon.init();
        map1.init();
        map2.init();
        menu.init();
    }

    this.resize = function() {
        map1.resize();
        map2.resize();
    }
}

let idrova = new App()
idrova.init();
window.addEventListener('resize', idrova.resize);






