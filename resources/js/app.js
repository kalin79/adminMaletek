

import $ from 'jquery';
window.$ = window.jQuery = $;
// import 'jquery-ui/ui/widgets/slider.js';
import 'ion-rangeslider/js/ion.rangeSlider.min.js'
// import 'jquery-ui/ui/widgets/droppable.js';
require('./bootstrap');

import * as bootstrap from 'bootstrap';
let owl_carousel = require('owl.carousel');
window.fn = owl_carousel;

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

Vue.component('home-main', require('./components/home/Index.vue').default);
Vue.component('home-banner', require('./components/home/Banner.vue').default);

// Vue.component('footer-main', require('./components/footer/Footer.vue').default);
// Vue.component('header-nav', require('./components/header/Nav.vue').default);


// Vue.component('home-promocion', require('./components/home/Promocion.vue').default);
// Vue.component('home-ingresados', require('./components/home/Ingresado.vue').default);
// Vue.component('home-linea', require('./components/home/Linea.vue').default);
// Vue.component('home-publicidad', require('./components/home/Publicidad.vue').default);
// Vue.component('home-blog', require('./components/home/Blog.vue').default);
// Vue.component('home-somos', require('./components/home/Somos.vue').default);
// Vue.component('somos-main', require('./components/somos/Index.vue').default);
// Vue.component('somos-banner', require('./components/banner/Somos.vue').default);
// Vue.component('somos-detalle', require('./components/somos/Detalle.vue').default);
// Vue.component('clientes-logos', require('./components/clientes/Index.vue').default);
// Vue.component('rubro-main', require('./components/rubro/Index.vue').default);
// Vue.component('categoria-main', require('./components/categoria/Index.vue').default);
// Vue.component('categoria-productos', require('./components/categoria/Listado.vue').default);
// Vue.component('categoria-filtros', require('./components/categoria/Filtros.vue').default);
// Vue.component('banner-interno', require('./components/banner/Index.vue').default);
// Vue.component('banner-interno-producto', require('./components/banner/Producto.vue').default);
// Vue.component('producto-main', require('./components/producto/Index.vue').default);
// Vue.component('producto-detalle', require('./components/producto/Detalle.vue').default);
// Vue.component('producto-complementarios', require('./components/producto/Complementario.vue').default);
// Vue.component('cotizador-main', require('./components/cotizador/Cotizador.vue').default);
// Vue.component('contacto-main', require('./components/contacto/Index.vue').default);
// Vue.component('banner-contact', require('./components/banner/Contacto.vue').default);
// Vue.component('formulario-contact', require('./components/contacto/Formulario.vue').default);
// Vue.component('mapa-contact', require('./components/contacto/Mapa.vue').default);

const app = new Vue({
    el: '#app'
});