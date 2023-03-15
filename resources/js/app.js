/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

 import {routes} from './routes'

import User from './Helpers/User'




window.User = User

import moment from 'moment';

Vue.filter('formatDate', function (value) {
    if (value) {
        return moment(String(value)).format('MMMM Do YYYY, h:mm:ss a')
    }
});

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard-navs', require('./components/dashboard/UI/navs').default);
Vue.component('upcoming', require('./components/dashboard/upcoming-list').default);
Vue.component('header-menu', require('./components/user/UI/header').default);
Vue.component('footer-part', require('./components/user/UI/footer').default);
Vue.component('app', require('./components/app').default);
Vue.component('home', require('./components/user/index').default);
Vue.component('join-class', require('./components/dashboard/Join-Class').default);


window.Reload = new Vue();


import Swal from 'sweetalert2'

window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Notification from './Helpers/Notification'

window.Notification = Notification
const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    router,

});
