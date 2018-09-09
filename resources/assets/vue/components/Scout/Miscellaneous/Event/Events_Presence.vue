<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

        <div class="header">

            <h4 class="title"> الأحداث التي وافقت على حضورها </h4>
        </div>
    <div class="container  " style="background-color: transparent">
        <div class="row">

            <div  v-for="presence in presenceevents" :key="presence.id" class="col-sm-3 hoverable card card-width" style="margin: 10px 10px; padding: 0 0 ">
                <div class="card-img-top" style="background-color: #0b96e5;height: 150px;">

                    <img :src="'/images/EventImages/'+presence.event_image" class="icon" >

                </div>
                <div class="card-body" style="height: 50px; background-color: #C8C8C8">
                    <h6> {{presence.title}} </h6>
                </div>





                <!--here you can make confition if scout color to change the background-->
                <div class="card-footer" style="background-color:white;height: 50px; margin: 0 0; padding: 0 0" >
                    <div class="col-sm-8 col-xs-8" style="height: 100%;padding: 0 0">
                        <h6 style="text-align:right;margin-top: 5%;margin-right: 0; padding-right: 0">{{presence.creator.last_name}} {{presence.creator.first_name}}</h6>
                        <h6 style="text-align:right;margin: 0 0">  <span>نشر بتاريخ</span><span> {{getday(presence)}} </span> <span> {{getcurrentmonth(presence)}} </span>   الساعة <span>{{gettime(presence)}}</span> </h6>
                        </div>
                    <div class="col-sm-2 col-xs-2" style="height: 100%; margin: 0 0; padding: 0 0">
                            <a href="#">
                              <img class="img-circle" :src="'/images/Captain/'+presence.creator.image"  style="height: 70%; max-width: 70%;margin:15% 15%" v-if="presence.creator.image.localeCompare('')!==0">
  <img class="img-circle" src="/images/default.png"  style="height: 70%; max-width: 70%;margin:15% 15%" v-else>
                              </a>
                        </div>



                </div>

            </div>
        </div>





        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                presenceevents:'',
            }
        },
        created:function(){
            this.getPresence();
        },
        methods:{
            getPresence(){
                var vm =this;
                axios.get('/api/getPresenceEvents').then(function (response) {



                    vm.presenceevents = response.data.presence_events;
                });
            },
            getcurrentmonth(event){
                var arr = event.created_at.split('-');
                const monthNames = ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان",
                    "جويلية", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
                ];
                return monthNames[parseInt(arr[1],10)];
            },
            getday(event){
                var arr = event.created_at.split('-');


                return arr[2].toString().slice(0,2);
            },
            gettime(event){
                var arr = event.created_at.split('-');
                var fulltime = arr[2].toString().slice(2);
                var time = fulltime.split(':');
                var hour = time[0];
                var minute = time[1];

                return hour+':'+minute;
            },



        }
    }
    /*the floating button css*/
    $(function() {
        $('.trigger').click(function() {
            $(this).addClass('open');
            $('.pseudo-circle').addClass('open');
        });
        $('.close').click(function() {
            $('.trigger').removeClass('open');
            $('.pseudo-circle').removeClass('open');
        })
    })

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

        cursor:pointer;
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
    @media (max-width: 767px){
        .card-width{
            width:100%;
        }
    }
    @media (min-width: 768px){
        .card-width{
            width:30%;
        }
    }
</style>
