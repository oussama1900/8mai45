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

import Hub from './components/Scout/Home/Hub.vue';
import MyScout from './components/MyScout';
import NewForm from './components/NewForm';
import NewRapport from './components/Scout/Add File/NewRapport';
import Allposts from './components/Scout/Miscellaneous/AllPosts';
import Forum from './components/Scout/Miscellaneous/Forum';
import Reports_received from './components/Scout/Miscellaneous/Reports_received';
import Post from './components/Scout/Post/post';
import AllScouts from './components/Scout/Scouts/AllScouts';
import New_Form from './components/Scout/Add File/Form';
import state_scout_reporter from './components/Scout/Add File/forms/Reporter_state_scout_governor';
import Honorary_meeting from './components/Scout/Add File/forms/Honorary_meeting';
import Camping_request from './components/Scout/Add File/forms/Camping_request';
import Algerian_states from './components/Scout/Add File/forms/AlgerianStates';
import Assigning_mission from './components/Scout/Add File/forms/Assigning_mission';
import Assigning_mission_travel from './components/Scout/Add File/forms/Assigning_mission_travel';
import Security_reporter from './components/Scout/Add File/forms/security_reporter';
import Inauguration from './components/Scout/Add File/forms/inauguration';
import Educational_institutions from './components/Scout/Add File/forms/Educational_institutions';
import Outgoing_mail from './components/Scout/Add File/forms/Outgoing_mail';
import Scout_Function from './components/Scout/Scout_Function';
import Event from './components/Scout/Post/Event';

Vue.component('reporter-state-scout',state_scout_reporter);
Vue.component('Honorary-meeting',Honorary_meeting);
Vue.component('Algerian-States',Algerian_states);
Vue.component('Camping-request',Camping_request);
Vue.component('Assigning-mission',Assigning_mission);
Vue.component('Assigning-mission-travel',Assigning_mission_travel);
Vue.component('Security-reporter',Security_reporter);
Vue.component('Inauguration',Inauguration);
Vue.component('Scout-Function',Scout_Function);
Vue.component('Educational-Institutions',Educational_institutions);
Vue.component('Outgoing-mail',Outgoing_mail);

/**
 * Vue Routes thst allow for a SPA feel in the application
 */
const routes = [
    {
        path: "/hub",
        component: Hub
    },

    {
        path: "/my_scout",
        component: MyScout
    },
    {
        path:"/reports/create",
        component: NewRapport
    },
    {
        path:"/myposts",
        component: Allposts
    },
    {
        path:"/forum",
        component: Forum
    },
    {
        path:"/posts/new",
        component: Post
    },
    {
        path:"/events/new",
        component: Event
    },
    {
        path:"/reports/recieved",
        component: Reports_received
    },
    {
        path:"scouts/cubs",

        component: AllScouts
    },
    {
        path:"scouts/scoutboy",
        component: AllScouts
    },
    {
        path:"scouts/advancedscout",
        component: AllScouts
    },
    {
        path:"scouts/traveler",
        component: AllScouts
    },
    {
        path:"scouts/captain",
        component: AllScouts
    },
    {
        path:"/form",
        component: New_Form
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

});
