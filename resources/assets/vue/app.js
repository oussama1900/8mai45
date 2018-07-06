/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import Axios from 'axios';
import Datepicker from 'vuejs-datepicker';

Vue.use(VueRouter, VueAxios, Axios);

import Hub from './components/Hub.vue';



/**
 * Vue Routes thst allow for a SPA feel in the application
 */
const routes = [
    {
        path: "/hub",
        component: Hub
    }
]

const router = new VueRouter({routes});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    components: {Hub}
});
