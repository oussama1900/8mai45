/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import vueResource from 'vue-resource';



import Axios from 'axios';
import Datepicker from 'vuejs-datepicker';
import VueCkeditor from 'vue-ckeditor2';
require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter,  Axios,VueCkeditor,vueResource);
import Ckeditor from 'vue-ckeditor2'
import Hub from './components/Scout/Home/Hub.vue';
import MyScout from './components/MyScout';
import NewForm from './components/NewForm';
import NewRapport from './components/Scout/Add File/NewRapport';
import Allposts from './components/Scout/Miscellaneous/AllPosts';
import MyEvents from './components/Scout/Miscellaneous/Event/MyEvents';
import Concerned_Events from './components/Scout/Miscellaneous/Event/Concerned_Events';
import MyEvents_Approved from './components/Scout/Miscellaneous/Event/MyEvents_Approved';
import Events_Presence from './components/Scout/Miscellaneous/Event/Events_Presence';
import Events_absence from './components/Scout/Miscellaneous/Event/Events_absence';
import AllEvents from './components/Scout/Miscellaneous/Event/MyUnitEvents';
import ApproveEvents from './components/Scout/Miscellaneous/Event/ApproveEvents';


import notification from './components/Notification/notification';
import notification_content from './components/Notification/notification_content';
import Cubs_Events from './components/Scout/Miscellaneous/Event/Units_Events/Cubs_Events';
import Scout_Events from './components/Scout/Miscellaneous/Event/Units_Events/Scout_Events';
import AdvancedScout_Events from './components/Scout/Miscellaneous/Event/Units_Events/AdvancedScout_Events';
import Traveler_Events from './components/Scout/Miscellaneous/Event/Units_Events/Traveler_Events';
import Media_Events from './components/Scout/Miscellaneous/Event/Units_Events/Media_Events';
import CSD_Events from './components/Scout/Miscellaneous/Event/Units_Events/CSD_Events';
import SURV_Events from './components/Scout/Miscellaneous/Event/Units_Events/SURV_Events';
import Fin_Events from './components/Scout/Miscellaneous/Event/Units_Events/Fin_Events';

import EditEvent from './components/Scout/Miscellaneous/Event/EditEvent';
import MyEvents_posts from './components/Scout/Miscellaneous/MyEvents-posts';
import Forum from './components/Scout/Miscellaneous/Forum';
import Reports_received from './components/Scout/Miscellaneous/Reports_received';
import Post from './components/Scout/Post/post';

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
import UserProfile from './components/UserProfile/UserProfile';
import UsersAccounts from './components/UserProfile/users_accounts';

import UserCard from './components/UserProfile/UserCard';
import MembersCard from './components/UserProfile/MembersCard';
import EditProfileForm from './components/UserProfile/EditProfileForm';
import formGroupInput from './components/UserProfile/formGroupInput';
import Settings from './components/UserProfile/Settings';
import CV from './components/UserProfile/UpdateCurriculumvitae';
import SocialMedia from './components/UserProfile/SocialMedia';
import EditScoutInfo from './components/Scout/Scouts/EditScoutInfo';
import AddnewScout from './components/Scout/Scouts/AddnewScout';




import Cub from './components/Scout/Scouts/Cub';
import Scout from './components/Scout/Scouts/Scout';
import Advanced_Scout from './components/Scout/Scouts/Advanced_Scout';

import Traveler from './components/Scout/Scouts/Traveler';
import Captain from './components/Scout/Scouts/Captain';



import NewUser from './components/UserProfile/NewUser';
import EditAcountInfo from './components/UserProfile/EditAccountInfo';



Vue.component('notification-content',notification_content);
Vue.component('Notification',notification);
Vue.component('reporter-state-scout',state_scout_reporter);
Vue.component('Allposts',Allposts);
Vue.component('Concerned_Events',Concerned_Events);
Vue.component('Events_Presence',Events_Presence);
Vue.component('MyEvents_Approved',MyEvents_Approved);
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
Vue.component('fg-input',formGroupInput);

Vue.component('user-card',UserCard);
Vue.component('members-card',MembersCard);
Vue.component('edit-profile-form',EditProfileForm);
Vue.component('Settings',Settings);
Vue.component('Curriculum-vitae',CV);
Vue.component('Social-media',SocialMedia);
Vue.component('Edit-Scout-Info',EditScoutInfo);
Vue.component('Add-newScout',AddnewScout);

Vue.component('chat-message',require('./components/Chat/ChatMessage.vue'));
Vue.component('chat-log',require('./components/Chat/ChatLog.vue'));
Vue.component('chat-composer',require('./components/Chat/ChatComposer.vue'));
Vue.component('friend-list',require('./components/Chat/FriendList.vue'));



/**
 * Vue Routes thst allow for a SPA feel in the application
 */

const routes = [
    {
        path: "/",
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
        path:"/Events/ApproveEvents",
        component: ApproveEvents
    },
    {
        path:"/Events/MyEvents",
        component: MyEvents
    },
    {
        path:"/Events/Concerned",
        component: Concerned_Events
    },
    {
        path:"/Events/Concerned/Presence",
        component: Events_Presence
    },
    {
        path:"/Events/Concerned/absence",
        component: Events_absence
    },
    {
        path:"/Events/MyEvents/Approved",
        component: MyEvents_Approved
    },
    {
        path:"/Events/AllEvents",
        component: AllEvents
    },
    {
        path:"/Events/cubs",
        component: Cubs_Events
    },
    {
        path:"/Events/Scout",
        component: Scout_Events
    },
    {
        path:"/Events/AdvancedScout",
        component: AdvancedScout_Events
    },
    {
        path:"/Events/Traveler",
        component: Traveler_Events
    },
    {
        path:"/Events/Media",
        component: Media_Events
    },
    {
        path:"/Events/CSD",
        component: CSD_Events
    },
    {
        path:"/Events/Service_Community_development",
        component: SURV_Events
    },
    {
        path:"/Events/Finance",
        component: Fin_Events
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
        path:"/scouts/cubs",
        component: Cub
    },
    {
        path:"/scouts/scout",
        component: Scout
    },
    {
        path:"/scouts/advanced_scout",
        component: Advanced_Scout
    },
    {
        path:"/scouts/traveler",
        component: Traveler
    },
    {
        path:"/scouts/captain",
        component: Captain
    },
    {
        path:"/form",
        component: New_Form
    },
    {
        path:"/myprofile",
        component: UserProfile,

    },
    {
        path:"/users-accounts",
        component: UsersAccounts
    },
    {
        path:"/EditScoutInfo/Cub/:id",
        component:EditScoutInfo
    },
    {
        path:"/EditScoutInfo/Scout/:id",
        component:EditScoutInfo
    },
    {
        path:"/EditScoutInfo/AdvancedScout/:id",
        component:EditScoutInfo
    },
    {
        path:"/EditScoutInfo/Traveler/:id",
        component:EditScoutInfo
    },
    {
        path:"/EditScoutInfo/Captain/:id",
        component:EditScoutInfo
    },
    {
        path:"/AddNewScout/cub",
        component:EditScoutInfo
    },

    {
        path:"/AddNewScout/scout",
        component:EditScoutInfo
    },
    {
        path:"/AddNewScout/advancedscout",
        component:EditScoutInfo
    },
    {
        path:"/AddNewScout/traveler",
        component:EditScoutInfo
    },
    {
        path:"/AddNewScout/captain",
        component:EditScoutInfo
    },
    {
        path:"/NewUser",
        component:NewUser
    },
    {
        path:"/EditAccountInfo/:id",
        component:EditAcountInfo

    },
    {
        path:"/myposts/event/:id",
        component:EditEvent

    }




];

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
const app2 = new Vue({
    el: '#chatvue',
    data:{
        messages:[],
        allusers:[{
            profile:{
                first_name:'',
                last_name:''
            }
        }
        ],
        usersinroom:[],
        myaccount:'',
    },
    methods:{
        addMessage(message,user){
            this.messages.push(message);




            axios.post('/api/dashboard/messages',{message: message.message, username:  message.username}).then(function (response) {


            });




        },

    },
    created(){


        axios.get('/api/dashboard/messages').then(response=>{



           this.messages=response.data;



        });
        axios.get('/api/dashboard/users').then(response=>{
            this.allusers=response.data;

        });
          var audio = new Audio('/uploads/new_message.mp3');
        Echo.join('chatroom')
            .here((users)=>{
                this.usersinroom = users;


            })
            .joining((user) =>{
                this.usersinroom.push(user);
            })
            .leaving((user)=>{
                this.usersinroom = this.usersinroom.filter(u => u != user);

            })
            .listen('MessagePosted',(e)=>{


                this.messages.push({
                        message: e.message.message,
                        username: e.message.username,
                        scout:{
                     image : e.scout.image,
                       }
                    });
                    audio.play();

            })
    }
});

const not = new Vue({
    el: '#notification',
})
