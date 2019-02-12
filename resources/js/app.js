
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('@fortawesome/fontawesome-free/js/all');

window.Vue = require('vue');

require('./custom');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

// const Inputmask = require('inputmask');
//
// const billInn = document.getElementById("bill-inn");
// const billKp = document.getElementById("bill-kp");
// const billAccount = document.getElementById("bill-account");
// const billBik = document.getElementById("bill-bik");
// const billKs = document.getElementById("bill-ks");
// const billPhone = document.getElementById("bill-phone");
//
// const im9 = new Inputmask("999999999");
// const im10 = new Inputmask("9999999999");
// const im20 = new Inputmask("99999999999999999999");
// const imPhone = new Inputmask("+7 (999) 999-99-99");
//
// im9.mask(billKp);
// im9.mask(billBik);
// im10.mask(billInn);
// im20.mask(billAccount);
// im20.mask(billKs);
// imPhone.mask(billPhone);