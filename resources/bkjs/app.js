import $ from 'jquery';
window.$ = window.jQuery = $;
// import 'jquery-ui/ui/widgets/slider.js';
import 'ion-rangeslider/js/ion.rangeSlider.min.js'
// import 'jquery-ui/ui/widgets/droppable.js';
require('./bootstrap');

import * as bootstrap from 'bootstrap';

try {
    // window.$ = window.jQuery = require('jquery');
    // require('bootstrap');
    require('jquery-validation/dist/jquery.validate.js');
} catch (e) {}

window.Vue = require('vue');

import Vue from 'vue';
import * as VeeValidate from 'vee-validate';
// import VeeValidateLaravel from '@pmochine/vee-validate-laravel';
Vue.use(VeeValidate);

// Vue.use(VeeValidateLaravel);
// VeeValidate.Validator.localize("es");

import { gsap, Power4 } from 'gsap';
import Scrolltrigger from 'gsap/ScrollTrigger';
import ScrollToPlugin from 'gsap/ScrollToPlugin';
import EasePack from 'gsap/EasePack';
import EaselPlugin from 'gsap/EasePack';

gsap.registerPlugin(Scrolltrigger);
gsap.registerPlugin(ScrollToPlugin);
gsap.registerPlugin(EasePack);
gsap.registerPlugin(EaselPlugin);

global.gsap = gsap
global.Power4 = Power4

// todos mis componentes correspondientes al HOME

Vue.component('home-component', require('./components/home/IndexComponent.vue').default);
Vue.component('home-search', require('./components/home/Search.vue').default);
Vue.component('more-search', require('./components/home/MoreSearch.vue').default);
Vue.component('style-biker', require('./components/home/StyleBiker.vue').default);
Vue.component('home-brands', require('./components/home/Brands.vue').default);
Vue.component('moto-nueva', require('./components/home/MotoNueva.vue').default);
Vue.component('inversion', require('./components/home/Inversion.vue').default);

// Todos los componentes respecto a Marca

Vue.component('marca-main', require('./components/marca/IndexComponent.vue').default);
Vue.component('marca-banner', require('./components/marca/Banner.vue').default);
Vue.component('marca-nosotros', require('./components/marca/Nosotros.vue').default);
Vue.component('marca-productos', require('./components/marca/Productos.vue').default);

// Todos los componentes respecto a Producto
Vue.component('producto-main', require('./components/producto/IndexComponent.vue').default);
Vue.component('producto-banner', require('./components/producto/Banner.vue').default);
Vue.component('producto-caracteristicas', require('./components/producto/Caracteristicas.vue').default);
Vue.component('producto-video', require('./components/producto/Video.vue').default);
Vue.component('producto-simulador', require('./components/producto/Simulador.vue').default);
Vue.component('producto-galeria', require('./components/producto/Galeria.vue').default);
Vue.component('producto-catalogo', require('./components/catalogo/Catalogo.vue').default);

// Los formularios

Vue.component('quiero-moto', require('./components/formulario/QuieroMoto.vue').default);
Vue.component('financiamiento', require('./components/formulario/Financiamiento.vue').default);


// el componente para el footer
Vue.component('footer-main', require('./components/footer/FooterComponent.vue').default);

// el componente para el header
Vue.component('header-main', require('./components/header/NavComponent.vue').default);

// el componente para suscribirte
Vue.component('suscribete', require('./components/suscribete/Suscribete.vue').default);

// el componente para buscar
Vue.component('buscador', require('./components/buscador/Buscador.vue').default);

// el componente para inversion
Vue.component('soat', require('./components/inversion/soat.vue').default);
Vue.component('seguro', require('./components/inversion/seguro.vue').default);


const app = new Vue({
    el: '#app'
});