/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/* Components */

Vue.component('widget-pack-calculator', require('./components/WidgetPackCalculator.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import { ObserveVisibility } from "vue-observe-visibility";

 Vue.directive("observe-visibility", ObserveVisibility);

const app = new Vue({
    el: '#app',
});
