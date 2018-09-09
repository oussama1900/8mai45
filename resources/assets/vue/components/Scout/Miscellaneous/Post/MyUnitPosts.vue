<template>

    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >
        <div class="header" >

            <h4 class="title"> منشورات وحدتي   </h4>
        </div>

<div class="row" style="padding-right:10px;padding-left: 10px">
        <div  v-for="post in MyUnitPosts" :key="post.id" class="col-sm-3 col-md-3  hoverable card card-width" style="margin: 10px 10px;padding: 0 0 ">
            <div class="card-img-top" style="background-color: #0b96e5;height: 150px;">

                <img :src="'/images/PostCover/'+post.cover_image" class="icon" >

            </div>
            <div class="card-body" style="height: 50px; background-color: #C8C8C8">
                <h6> {{post.post_title}} </h6>
            </div>
            <div class="trigger" @click="delete_post(post)">
                <i class="glyphicon glyphicon-remove" ></i>
            </div>
            <router-link class="trigger" style="float: right; right: 0px;" :to="'/post/EditPost/'+post.post_id">
                <i class="glyphicon glyphicon-edit" ></i>
            </router-link>
            <div class="card-footer" style="background-color:white;height: 50px; margin: 0 0; padding: 0 0" >
                <div class="col-sm-8 col-xs-8" style="height: 100%;padding: 0 0">
                    <h6 style="text-align:right;margin-top: 5%;margin-right: 0; padding-right: 0">{{post.post_creator.last_name}} {{post.post_creator.first_name}}</h6>
                    <h6 style="text-align:right;margin: 0 0">    <span>نشر بتاريخ</span><span> {{getday(post)}} </span> <span> {{getcurrentmonth(post)}} </span>   الساعة <span>{{gettime(post)}}</span> </h6>

                </div>

                <div class=" col-sm-2 col-xs-2" style="height: 100%; margin: 0 0; padding: 0 0" >
                    <a href="#">
                        <img class="img-circle":src="'/images/Captain/'+post.post_creator.image"  style="height: 70%; max-width: 70%;margin:auto;border-radius: 50%;" v-if="post.post_creator.image.localeCompare('')!==0">
                        <img class="img-circle" src="/images/default.png"  style="height: 70%; max-width: 70%;margin:auto" v-else></a>
                </div>


            </div>

        </div>
</div>
        <div v-if="MyUnitPosts.length===0">
            <h4 style="text-align: center">لا توجد منشورات </h4>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                MyUnitPosts:'',

            }
        },
        created:function(){
            var vm =this;
            axios.get('/api/getMyUnitPosts').then(function (response) {


                vm.MyUnitPosts = response.data.myunitPosts;

            });
        },
        methods:{
            getcurrentmonth(post){
                var arr = post.created_at.split('-');
                const monthNames = ["جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان",
                    "جويلية", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
                ];
                return monthNames[parseInt(arr[1],10)];
            },
            getday(post){
                var arr = post.created_at.split('-');


                return arr[2].toString().slice(0,2);
            },
            gettime(post){
                var arr = post.created_at.split('-');
                var fulltime = arr[2].toString().slice(2);
                var time = fulltime.split(':');
                var hour = time[0];
                var minute = time[1];

                return hour+':'+minute;
            },
            delete_post(post){
                var vm = this;
                axios.delete('/api/deletepost/'+post.post_id).then(function (response) {
                    var position = vm.MyUnitPosts.indexOf(post);
                    vm.MyUnitPosts.splice(position,1);


                });

            },
        }
    }
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
        margin-top: 51%;
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
        background-color: #17b9f5;
        backdrop-filter: blur(5px);
        transition: transform 0.15s cubic-bezier(0.4, 0.0, 1, 1), opacity 0.1s 0.1s, box-shadow 0.3s;
        opacity: 1;
        /*right: 50px;*/
        /*bottom: 50px;*/
        /*position: fixed;*/
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.12), 0 6px 6px rgba(0, 0, 0, 0.24);
        z-index: 1;
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
        .container{
            margin-left:15px !important;
        }
        .card-width{
            width:95%;
        }
    }
    @media (min-width: 768px){
        .card-width{
            width:30%;
        }
    }
</style>