<template>
    <div>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

        <div class="header">

            <h4 class="title">  الاحداث التي قمت بنشرها </h4>
        </div>
        <div>
           <AllEvents :myevents="MyEvents" :myinfo="MyInfo"></AllEvents>
        </div>
    </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title"> الأحداث المعني بها </h4>
            </div>
            <div>
                <Concerned_Events :concernedevents="Concerned_Events" ></Concerned_Events>
            </div>
        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title"> الأحداث لتي وافقت على حضورها </h4>
            </div>
            <div>
                <Events_Presence  :presenceevents="Presence_Events"></Events_Presence>
            </div>
        </div>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

        <div class="header">

            <h4 class="title">  الاحداث التي تمت المصادقة عليها  </h4>
        </div>
        <div>
            <MyEvents_Approved></MyEvents_Approved>
        </div>
    </div>
    </div>
</template>

<script>
    import MyEvents_Approved from "./Event/MyEvents_Approved";
    export default {
        components: {MyEvents_Approved},
        data(){
            return{
              MyEvents:'',
                MyInfo:'',
              MyPosts:'',
                Concerned_Events:'',
                MyEventsApproved:'',
                Presence_Events:'',

            }
        },
        created:function(){
            this.getMyEvents();
            this.getConcernedEvents();
            this.getPresence();

        },
        methods:{
            getMyEvents(){
                var vm = this;
                axios.get('/api/getMyEvents').then(function (response) {


                    vm.MyEvents =response.data.Events[0];
                    vm.MyInfo =response.data.Events[1];
                });
            },
            getConcernedEvents(){
                var vm = this;
                axios.get('/api/getConcernedEvents').then(function (response) {




                   vm.Concerned_Events =response.data.concernedevent[0];
                   vm.user_concerned = response.data.concernedevent[1];

                });
            },
            getPresence(){
                var vm =this;
                axios.get('/api/getPresenceEvents').then(function (response) {


                    vm.Presence_Events = response.data.presence_events[0];
                });
            }
        }
    }
    /*the floating button css*/


</script>

<style scoped>

    .icon{
        max-width: 100%;
        width: 100%;
        height: 150px;
        margin: 0 0 ;/*1% top to buttom auto to center it*/

    }

    .card{
        margin-top:7%;
        margin-left: 65px;
        background-color: white;

    }

    h3, h5, h6{
        margin: 0 0;
        padding: 0 0;
        font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }


    /*the floating button css*/
    body {
        margin: 0;
    }
    * {
        box-sizing: border-box;
    }
    .pseudo-circle, .trigger {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        position: absolute;
        margin-top: 59%;
        margin-left: 3% ;
        /*right: 100px;*/
        /*bottom: 10px;*/
        /*z-index: 99998;
        cursor: pointer;
        transform-origin: 50% 50%;*/
    }
    .pseudo-circle {
        opacity: 0;
        overflow: hidden;
        transition: transform 0.3s cubic-bezier(0.0, 0.0, 0.2, 1), opacity 0.1s;
    }
    .trigger {
        text-align: center;
        color: #fff;
        line-height: 56px;
        background-color: #009688;
        transition: transform 0.15s cubic-bezier(0.4, 0.0, 1, 1), opacity 0.1s 0.1s, box-shadow 0.3s;
        opacity: 1;
        /*right: 50px;*/
       /*bottom: 50px;*/
        /*position: fixed;*/
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.12), 0 6px 6px rgba(0, 0, 0, 0.24);
        z-index: 99999;
    }
    .pseudo-circle.open {
        transition-delay: .15s;
        transform: scale(45);
        opacity: 1;
    }
    .trigger.open {
        transform: translate(-50px, 40px);
        opacity: 0;
    }
    .trigger.open i {
        opacity: 0;
    }
    .trigger:hover {
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.12), 0 12px 12px rgba(0, 0, 0, 0.24);
    }
    .dialog {
        width: 100vw;
        height: 100vh;
        background-color: #009688;
    }
    .toolbar {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 70px;
        overflow: hidden;
        padding: 20px;
    }
    .toolbar button {
        position: absolute;
        z-index: 999999;
        border: 0;
        background: transparent;
        font-size: 16px;
        text-transform: uppercase;
        top: 50%;
        color: #fff;
        transform: translateY(-50%);
        padding: 10px 20px;
        border-radius: 2px;
        cursor: pointer;
        transition: all 0.3s;
        outline: none;
    }
    .header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
    .header .title{
        color:white;
    }


</style>