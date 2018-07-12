<template>
        <div class="container col-md-11 col-sm-11 col-xs-11 text-right card" style="background-color: transparent">
        <div class="row">

            <div  v-for="item in 10" :key="item.id" class="col-sm-3 hoverable card" style="margin: 10px 10px; width:30%;padding: 0 0 ">
                <div class="card-img-top" style="background-color: #0b96e5;height: 150px;">
                    <a href="#"><img src="assets/images/my_scout/profile.png" class="icon" ></a>
                </div>
                <div class="card-body" style="height: 50px; background-color: #C8C8C8">
                    <h6> يمكنك الإطلاع على المستخدمين و كل المعلومات الخاصة بهم يمكنك الإطلاع على المستخدمين </h6>
                </div>


                <div class="trigger">
                    <i class="ion-plus"></i>
                </div>
                <div class="toolbar">
                    <div>
                        <button class="close">Close</button>
                    </div>
                    <div class="pseudo-circle">
                        <div class="dialog"></div>
                    </div>
                </div>


                <!--here you can make confition if scout color to change the background-->
                <div class="card-footer" style="height: 50px; margin: 0 0; padding: 0 0" >
                        <div class="col-sm-10" style="height: 100%;padding: 0 0">
                            <h6 style="margin-top: 5%;margin-right: 0; padding-right: 0">أسامة غجاتي</h6>
                            <h6 style="margin: 0 0"> نشر ب نوفمبر 11 الساعة 22:53 </h6>
                        </div>
                        <div class="col-sm-2" style="height: 100%; margin: 0 0; padding: 0 0">
                            <a href="#"><img class="img-circle"src="assets/images/my_scout/profile.png" style="height: 70%; width: 70%;margin:15% 15%"></a>
                        </div>



                </div>
            </div>
        </div>





        </div>
</template>

<script>
    export default {
        name: "AllPosts"
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



</style>