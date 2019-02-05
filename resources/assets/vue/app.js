/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import vueResource from 'vue-resource';
import SweetModal from 'sweet-modal-vue/src/plugin.js'
import {Datetime} from 'vue-datetime'

import Axios from 'axios';

import VueCkeditor from 'vue-ckeditor2';
import { Settings } from 'luxon';
var current_user ;
require('./bootstrap');

import 'vue-datetime/dist/vue-datetime.css'

import loading from 'vue-full-loading';


import vue_loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
window.Vue = require('vue');

Vue.use(VueRouter,  Axios,VueCkeditor,vueResource,Datetime,SweetModal);
Vue.use(SweetModal);
Vue.use(loading);
import Ckeditor from 'vue-ckeditor2'
import Hub from './components/Scout/Home/Hub.vue';
import ContactUs from './components/contactus';
import Bank_Account from './components/Scout/Finance/Bank_Account_Info.vue';
import MyScout from './components/MyScout';
import NewForm from './components/NewForm';
import Reporter from './components/Scout/Add File/forms/Reporter';
import Correspondences_Received from './components/Scout/Add File/forms/Correspondences_Received';
import NewRapport from './components/Scout/Add File/Reports/NewRapport';
import MyPapers from './components/Scout/Add File/forms/mypapers';
import Allposts from './components/Scout/Miscellaneous/AllPosts';
import MyEvents from './components/Scout/Miscellaneous/Event/MyEvents';
import Concerned_Events from './components/Scout/Miscellaneous/Event/Concerned_Events';
import MyEvents_Approved from './components/Scout/Miscellaneous/Event/MyEvents_Approved';
import Events_Presence from './components/Scout/Miscellaneous/Event/Events_Presence';
import Events_absence from './components/Scout/Miscellaneous/Event/Events_absence';
import AllEvents from './components/Scout/Miscellaneous/Event/MyUnitEvents';
import ApproveEvents from './components/Scout/Miscellaneous/Event/ApproveEvents';
import MyPosts from './components/Scout/Miscellaneous/Post/MyPosts';
import MyUnitPosts from './components/Scout/Miscellaneous/Post/MyUnitPosts';
import ApprovedPosts from './components/Scout/Miscellaneous/Post/ApprovePosts';
import EditPost from './components/Scout/Miscellaneous/Post/EditPost';
import ApproveUnitPosts from './components/Scout/Miscellaneous/Post/Units_Posts/ApprovePosts';
import Cubs_Posts from './components/Scout/Miscellaneous/Post/Units_Posts/Cubs_Posts';
import Scout_Posts from './components/Scout/Miscellaneous/Post/Units_Posts/Scout_Posts';
import Advanced_Scout_Posts from './components/Scout/Miscellaneous/Post/Units_Posts/Advanced_Scout_Posts';
import Traveler_Posts from './components/Scout/Miscellaneous/Post/Units_Posts/Traveler_Posts';
import Captain_Posts from './components/Scout/Miscellaneous/Post/Units_Posts/Captain_Posts';
import Media_Posts from './components/Scout/Miscellaneous/Post/Units_Posts/Media_Posts';
import Finance_Posts from './components/Scout/Miscellaneous/Post/Units_Posts/Finance_Posts';
import CSD_Posts from './components/Scout/Miscellaneous/Post/Units_Posts/CSD_Posts';
import SURV_Posts from './components/Scout/Miscellaneous/Post/Units_Posts/SURV_Posts';
import MyApprovedPosts from './components/Scout/Miscellaneous/Post/MyApprovedPosts';


import notification from './components/Notification/notification';
import Books from './components/Scout/Add File/AddBook/OurBooks';
import AddBook from './components/Scout/Add File/AddBook/AddNewBook';
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
import Reports_received from './components/Scout/Add File/Reports/Reports_received';
import Finance_Report from './components/Scout/Finance/Finance_Report';
import Post from './components/Scout/Post/post';

import New_Form from './components/Scout/Add File/Form';
import activityPaper from './components/Scout/Add File/ActivityPaper';
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
import ProfileSettings from './components/UserProfile/Settings';
import CV from './components/UserProfile/UpdateCurriculumvitae';
import SocialMedia from './components/UserProfile/SocialMedia';
import EditScoutInfo from './components/Scout/Scouts/EditScoutInfo';

import Financial_management from './components/Scout/Finance/Financial_management';
import Activity_paper_Received from './components/Scout/Add File/Activity_paper_Received';



import Cub from './components/Scout/Scouts/Cub';
import Scout from './components/Scout/Scouts/Scout';
import Advanced_Scout from './components/Scout/Scouts/Advanced_Scout';

import Traveler from './components/Scout/Scouts/Traveler';
import Captain from './components/Scout/Scouts/Captain';
import landing_page from './components/Scout/Home/Landing_page_photos';



import NewUser from './components/UserProfile/NewUser';
import EditAcountInfo from './components/UserProfile/EditAccountInfo';

import VueChartJs from "vue-chartjs";
Vue.component('monthly-line-chart', {
  extends: VueChartJs.Line,
  mounted () {
		var vm = this;

		 var money="";
		 var current_month_days="";
		 var money_data=[];
		  var transaction_date=[];
      var transaction_description=[];
      var transaction_money=[];
		axios.get('/api/getmoney_values').then(function(response){
				 money = response.data.money_values[0];
				 transaction_date = response.data.money_values[1];
				 current_month_days = response.data.money_values[2];
                 transaction_description=response.data.money_values[3];
                 transaction_money = response.data.money_values[4];



					 var money_index=1;
					 for(var i = 0;i<transaction_date.length;i++){
						 money_data.push({x:parseInt(transaction_date[i].slice(8, 10)),y:money[i]})
					 }





				 vm.renderChart({
		       labels: current_month_days,
		       datasets: [
		         {
		           label: 'كمية الأموال',
		           borderColor:"#33b5e5" ,
		           data:money_data
		         }
		       ]
		     },
                     {
                     scales: {
                         yAxes: [{
                             ticks: {
                                 beginAtZero:true
                             }
                         }]
                     },

                     legend: {
                         display: false,
                     },
                     tooltips: {
                         callbacks:{
                             label: function(tooltipItem) {
                                 return "كمية الأموال : " +tooltipItem.yLabel +" دج";
                             },
                             title:function (tooltipItem) {
                                     var trans_money = transaction_money[tooltipItem[0].index].toString();
                                     if(trans_money.includes('-')){

                                         trans_money = trans_money.slice(1);

                                     }


                                 return transaction_description[tooltipItem[0].index]+" " +" ( "+trans_money+" ) " +" دج  " ;

                             }

                         }
                     },
                     responsive: true,
                     maintainAspectRatio: false,


                 },

		 	)
		});

  }
});


Vue.component('year-line-chart', {
  extends: VueChartJs.Line,
  mounted () {
		var vm = this;

		 var money="";
		 var months="";
		 var money_data=[];
		  var transaction_date=[];
		  var transaction_description=[];
		  var transaction_money=[];
		axios.get('/api/getyearly_money').then(function(response){
				 money = response.data.money_values[0];
				 transaction_date = response.data.money_values[1];
                  months = response.data.money_values[2];
                 transaction_description=response.data.money_values[3];
            transaction_money = response.data.money_values[4];


					 var money_index=1;
					 for(var i = 0;i<transaction_date.length;i++){
						 money_data.push({x:transaction_date[i],y:money[i]})
					 }





				 vm.renderChart({
		       labels: months,
		       datasets: [
		         {
		           label: 'كمية الأموال',
		           borderColor:"#33b5e5" ,
		           data:money_data
		         }
		       ],


		     },

                     {
                         scales: {
                             yAxes: [{
                                 ticks: {
                                     beginAtZero:true
                                 }
                             }]
                         },

                             legend: {
                                 display: false,
                             },
                             tooltips: {
                                 callbacks:{
                                     label: function(tooltipItem) {
                                         return "كمية الأموال : " +tooltipItem.yLabel +" دج";
                                     },
                                     title:function (tooltipItem) {

                                         return transaction_description[tooltipItem[0].index]+" " +"( "+transaction_money[tooltipItem[0].index]+" )" +" دج  " ;

                                     }

                                 }
                             },
                             responsive: true,
                             maintainAspectRatio: false,


                     },


		 	)
		});

  }
});
Vue.component('yearly-bank-account', {
    extends: VueChartJs.Line,
    mounted () {
        var vm = this;

        var money="";
        var months="";
        var money_data=[];
        var last_view=[];
        var view_by=[];
        axios.get('/api/getyearly_money_account').then(function(response){
            money = response.data.money_values[0];
            last_view = response.data.money_values[1];
            months = response.data.money_values[2];
            view_by=response.data.money_values[3];


            var money_index=1;
            for(var i = 0;i<last_view.length;i++){
                money_data.push({x:last_view[i],y:money[i]})
            }





            vm.renderChart({
                    labels: months,
                    datasets: [
                        {
                            label: 'قيمة الحساب البنكي ',
                            borderColor:"#33b5e5" ,
                            data:money_data
                        }
                    ],


                },

                {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },

                    legend: {
                        display: false,
                    },
                    tooltips: {
                        callbacks:{
                            label: function(tooltipItem) {
                                return "قيمة الحساب البنكي : " +tooltipItem.yLabel +" دج";
                            },
                            title:function (tooltipItem) {

                                return view_by[tooltipItem[0].index];

                            }

                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,


                },


            )
        });

    }
});
Vue.component('monthly-bank-account', {
    extends: VueChartJs.Line,
    mounted () {
        var vm = this;

        var money="";
        var current_month_days="";
        var money_data=[];
        var last_view=[];
        var view_by=[];

        axios.get('/api/getaccount_monthly_review').then(function(response){
            money = response.data.money_values[0];
            last_view = response.data.money_values[1];
            current_month_days = response.data.money_values[2];
            view_by=response.data.money_values[3];




            var money_index=1;
            for(var i = 0;i<last_view.length;i++){
                money_data.push({x:parseInt(last_view[i].slice(8, 10)),y:money[i]})
            }





            vm.renderChart({
                    labels: current_month_days,
                    datasets: [
                        {
                            label: 'قيمة الحساب الجاري',
                            borderColor:"#33b5e5" ,
                            data:money_data
                        }
                    ]
                },
                {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },

                    legend: {
                        display: false,
                    },
                    tooltips: {
                        callbacks:{
                            label: function(tooltipItem) {
                                return "قيمة الحساب الجاري : " +tooltipItem.yLabel +" دج";
                            },
                            title:function (tooltipItem) {



                                return view_by[tooltipItem[0].index];

                            }

                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,


                },

            )
        });

    }
});

Vue.component('datetime', Datetime);
Vue.component('vue-loading', vue_loading);
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
Vue.component('Settings',ProfileSettings);
Vue.component('Curriculum-vitae',CV);
Vue.component('Social-media',SocialMedia);
Vue.component('Edit-Scout-Info',EditScoutInfo);


Vue.component('chat-message',require('./components/Chat/ChatMessage.vue'));
Vue.component('chat-log',require('./components/Chat/ChatLog.vue'));
Vue.component('chat-composer',require('./components/Chat/ChatComposer.vue'));
Vue.component('friend-list',require('./components/Chat/FriendList.vue'));



/**
 * Vue Routes thst allow for a SPA feel in the application
 */

const routes = [
    {

        path: "/dashboard",

        component: Hub

    },
    {

        path: "/dashboard/landing-page",

        component: landing_page,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0 || current_user.localeCompare('vgov')===0 || current_user.localeCompare('surv')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {

        path: "/dashboard/books",

        component: Books,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 ||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0 )
                    next();
                else
                    next(false);

            });

        }

    },
    {

        path: "/dashboard/books/New",
        name:'add_book',
        component: AddBook,


        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 ||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0 )
                    next();
                else
                    next(false);

            });

        }

    },
    {

        path: "/dashboard/books/edit/:id",
        name:'edit_book',
        component: AddBook,

        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 ||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0 )
                    next();
                else
                    next(false);

            });

        }

    },

    {
        path: "/dashboard/my_scout",
        component: MyScout,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('ucap')===0||current_user.localeCompare('vucp')===0|| current_user.localeCompare('capa')===0|| current_user.localeCompare('trne')===0)
                    next();
                else
                    next(false);

            });

        }
    },
    {
        path:"/dashboard/reports/create",
        component: NewRapport,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('ucap')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/Events/ApproveEvents",
        component: ApproveEvents,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('ucap')===0||current_user.localeCompare('vucp')===0|| current_user.localeCompare('capa')===0|| current_user.localeCompare('gov')===0|| current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/Events/MyEvents",
        component: MyEvents
    },
    {
        path:"/dashboard/Events/Concerned",
        component: Concerned_Events
    },
    {
        path:"/dashboard/Events/Concerned/Presence",
        component: Events_Presence
    },
    {
        path:"/dashboard/Events/Concerned/absence",
        component: Events_absence
    },
    {
        path:"/dashboard/Events/MyEvents/Approved",
        component: MyEvents_Approved,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('trne')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/Events/AllEvents",
        component: AllEvents,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('ucap')===0||current_user.localeCompare('vucp')===0|| current_user.localeCompare('capa')===0|| current_user.localeCompare('trne')===0)
                    next();
                else
                    next(false);

            });

        }
    },
    {
        path:"/dashboard/Events/cubs",
        component: Cubs_Events,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/Events/Scout",
        component: Scout_Events,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/Events/AdvancedScout",
        component: AdvancedScout_Events,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/Events/Traveler",
        component: Traveler_Events,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/Events/Media",
        component: Media_Events,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/Events/CSD",
        component: CSD_Events,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/Events/SURV",
        component: SURV_Events,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/Events/Finance",
        component: Fin_Events,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);
            });

        }
    },

    {
        path:"/dashboard/forum",
        component: Forum,
        beforeEnter: (to, from, next) => {

            next(false);

        }
    },
    {
        path:"/dashboard/posts/new",
        component: Post,
        beforeEnter: (to, from, next) => {
            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 ||
                    current_user.localeCompare('vgov')===0 ||
                    current_user.localeCompare('med')===0 ||
                    current_user.localeCompare('vmed')===0 ||
                    current_user.localeCompare('ucap')===0 ||
                    current_user.localeCompare('vucp')===0 ||
                    current_user.localeCompare('capa')===0 ||
                    current_user.localeCompare('trne')===0 ||
                    current_user.localeCompare('surv')===0  ||
                    current_user.localeCompare('csd')===0

                )
                    next();
                else
                    next(false);
            });

        },
    },
    {
        path:"/dashboard/events/new",
        component: Event
    },
    {
        path:"/dashboard/reports/received",
        component: Reports_received,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 || current_user.localeCompare('surv')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/scouts/cubs",
        component: Cub,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/scouts/scout",
        component: Scout,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/scouts/advanced_scout",
        component: Advanced_Scout,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/scouts/traveler",
        component: Traveler,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/scouts/captain",
        component: Captain,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/forms",
        component: New_Form,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/forms/Approve",
        component: Correspondences_Received,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0)
                    next();
                else
                    next(false);
            });

        }
    } ,
    {
        path:"/dashboard/forms/mypapers",
        component: MyPapers,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('ucap')===0 ||current_user.localeCompare('vgov')===0 ||current_user.localeCompare('surv')===0 ||current_user.localeCompare('csd')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/form",
        component: Reporter,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if( current_user.localeCompare('vgov')===0 || current_user.localeCompare('surv')===0 || current_user.localeCompare('csd')===0 || current_user.localeCompare('med')===0 || current_user.localeCompare('vmed')===0|| current_user.localeCompare('ucap')===0)
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/myprofile",
        component: UserProfile,

    },
    {
        path:"/dashboard/users-accounts",
        component: UsersAccounts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0  )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/EditScoutInfo/Cub/:id",
        component:EditScoutInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else{
                    if(current_user.localeCompare('ucap')===0 ){
                        if(response.data.ucap_unit.localeCompare('cubs')===0)
                            next();
                        else
                            next(false);
                    }
                    else
                    next(false);
                }
            });

        }
    },
    {
        path:"/dashboard/EditScoutInfo/Scout/:id",
        component:EditScoutInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else{
                    if(current_user.localeCompare('ucap')===0 ){
                        if(response.data.ucap_unit.localeCompare('sct')===0)
                            next();
                        else
                            next(false);
                    }
                    else
                    next(false);
                }
            });

        }
    },
    {
        path:"/dashboard/EditScoutInfo/AdvancedScout/:id",
        component:EditScoutInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else{
                    if(current_user.localeCompare('ucap')===0 ){
                        if(response.data.ucap_unit.localeCompare('asct')===0)
                            next();
                        else
                            next(false);
                    }
                    else
                    next(false);
                }
            });

        }
    },
    {
        path:"/dashboard/EditScoutInfo/Traveler/:id",
        component:EditScoutInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else{
                    if(current_user.localeCompare('ucap')===0 ){
                        if(response.data.ucap_unit.localeCompare('tvlr')===0)
                            next();
                        else
                            next(false);
                    }
                    else
                    next(false);
                }
            });

        }
    },
    {
        path:"/dashboard/EditScoutInfo/Captain/:id",
        component:EditScoutInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/AddNewScout/cub",
        component:EditScoutInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else{
                    if(current_user.localeCompare('ucap')===0 ){
                        if(response.data.ucap_unit.localeCompare('cubs')===0)
                            next();
                        else
                            next(false);
                    }
                    else
                    next(false);
                }
            });

        }
    },

    {
        path:"/dashboard/AddNewScout/scout",
        component:EditScoutInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else{
                    if(current_user.localeCompare('ucap')===0 ){
                        if(response.data.ucap_unit.localeCompare('sct')===0)
                            next();
                        else
                            next(false);
                    }
                    else
                    next(false);
                }
            });

        }
    },
    {
        path:"/dashboard/AddNewScout/advancedscout",
        component:EditScoutInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 ){
                    next();
                }
                else{
                    if(current_user.localeCompare('ucap')===0 ){
                       if(response.data.ucap_unit.localeCompare('asct')===0)
                           next();
                       else
                           next(false);
                    }
                    else
                    next(false);
                }

            });

        }
    },
    {
        path:"/dashboard/AddNewScout/traveler",
        component:EditScoutInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else{
                    if(current_user.localeCompare('ucap')===0 ){
                        if(response.data.ucap_unit.localeCompare('tvlr')===0)
                            next();
                        else
                            next(false);
                    }
                    else
                    next(false);
                }
            });

        }
    },
    {
        path:"/dashboard/AddNewScout/captain",
        component:EditScoutInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 || current_user.localeCompare('vgov')===0 )
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/NewUser",
        component:NewUser,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0)
                    next();
                else
                    next(false);
            });

        }
    },
    {
        path:"/dashboard/EditAccountInfo/:id",
        component:EditAcountInfo,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0 )
                    next();
                else
                    next(false);
            });

        }

    },
    {
        path:"/dashboard/myposts/event/:id",
        component:EditEvent

    },
    {
        path:"/dashboard/posts/myposts",
        component:MyPosts,


    },
    {
        path:"/dashboard/posts/myunitposts",
        component:MyUnitPosts ,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('ucap')===0||current_user.localeCompare('vucp')===0|| current_user.localeCompare('capa')===0|| current_user.localeCompare('trne')===0)
                    next();
                else
                next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/approveposts",
        component:ApprovedPosts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('ucap')===0||current_user.localeCompare('vucp')===0|| current_user.localeCompare('capa')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/post/EditPost/:id",
        component:EditPost

    },
    {
        path:"/dashboard/posts/Approve_Posts",
        component:ApproveUnitPosts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('capa')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/cub/post",
        component:Cubs_Posts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/scout/post",
        component:Scout_Posts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/advanced-scout/post",
        component:Advanced_Scout_Posts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/traveler/post",
        component:Traveler_Posts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/captain/post",
        component:Captain_Posts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/media/post",
        component:Media_Posts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/csd/post",
        component:CSD_Posts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/surv/post",
        component:SURV_Posts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/finance/post",
        component:Finance_Posts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('med')===0|| current_user.localeCompare('vmed')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/posts/MyApprovedPosts",
        component:MyApprovedPosts,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('trne')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/finance/Financial_management",
        component:Financial_management,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('fin')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/finance/Bank-Account",
        component:Bank_Account,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('fin')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/activityPaper",
        component:activityPaper,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('ucap')===0||current_user.localeCompare('vucp')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/Finance/Repport",
        component:Finance_Report,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('fin')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/reports/Activity",
        component:Activity_paper_Received,
        beforeEnter: (to, from, next) => {


            axios.get('/api/current_user').then(function(response){
                current_user = response.data.current_user;

                if(current_user.localeCompare('gov')===0||current_user.localeCompare('surv')===0)
                    next();
                else
                    next(false);

            });

        }

    },
    {
        path:"/dashboard/contact-us",
        component:ContactUs

    }


];

const router = new VueRouter({
mode:'history',
	routes,

});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    created:function(){





      Settings.defaultLocale = "us"
    },
    data:{
        isLoading: false,
        fullPage: true,
        dots:"dots",
        width:50,
        height:50,
        color:"#19ea39",
    },


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
router.beforeEach((to, from, next) => {
    app.isLoading = true;
    next();
});

router.afterEach((to, from, next) => {
    app.isLoading = false;

});
