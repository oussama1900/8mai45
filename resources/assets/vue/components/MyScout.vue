<template>
    <div class="container col-md-11 col-sm-11 col-xs-11 text-center card" style="background-color: transparent">
        <div class="row">

            <div  v-for="item in 10" :key="item.id" class="col-sm-3 hoverable card" style="margin: 10px 10px; width:22%;padding: 0 0 ">
                <div class="card-img-top" style="background-color: #0b96e5;height: 100px;">
                    <a href="#"><img src="assets/images/my_scout/profile.png" class="icon" ></a>
                </div>
                <div class="card-body">
                    <h3>غجاتي أسامة</h3>
                    <h5> xxxx-xx-xx:تاريخ الميلاد</h5>
                    <h5>xxxx-xx-xx تاريخ الانخراط </h5>
                    <h5> xxxx-xx-xx-xx  رقم الهاتف </h5>
                    <h5>xxxx.xxxx@xxxx.xxx:البريد</h5>
                </div>
                <!--here you can make confition if scout color to change the background-->
                <div class="card-footer" style="background-color:#0b96e5; margin: 0 0; padding: 0 0" >
                    <h5 style="color: white">SF-XXXXXXX</h5>
                </div>
            </div>
        </div>



    </div>

</template>

<script>
    export default {
        name: "MyScout"
    }
</script>

<style scoped>
    .icon{
        max-width: 100%;
        width: 100%;
        height: 100px;
        margin: 0 0 ;/*1% top to buttom auto to center it*/

    }

    .card{
        margin-top:7%;
        margin-left: 65px;
        background-color: white;

    }

    h3, h5{
        margin: 0 0;
        padding: 0 0;
        font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
        font-size: 100%;
    }




</style>