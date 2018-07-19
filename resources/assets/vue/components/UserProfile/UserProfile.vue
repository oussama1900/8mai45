<template>
    <div class="container  col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px">
    <div id="profile" class="row">
        <div class="col-lg-4 col-md-4"
             style="padding-right:20px;"
        >
            <div class="card card-user" style="margin-left: 20px">
                <div class="image">

                    <img src="images/governor.jpg"  width=100% alt="الخلفية">
                    <div class="overlay">
                        <div class="inputWrapper">
                            <i class="glyphicon glyphicon-picture" aria-hidden="true" style=" font-size: 20px;float:right;color:white"></i>
                            <span style="float:right;font-size:medium;padding-right:5px;color:white">حمل صورة</span>


                            <input class="fileInput" type="file" name="file1"/>
                        </div>

                    </div>


                </div>
                <div class="content">
                    <div class="profile-picture">

                        <img class="avatar border-white" id="avatar" src="images/governor.jpg"  height="100" width="100px" alt="الصورة الشخصية">

                        <h4 >مويات براء عبد الاله
                            <br>

                            <small>قائد الفوج</small>

                        </h4>
                    </div>
                    <div>
                        <div>
                            <ul  style="margin-bottom: 0px">
                                <li  style="background: grey; " id="first">
                                    <div >
                                        <span style="text-align: center;padding-right:10px;color:white;margin-top:5px" v-on:click="ProfileCTRL('personal-info')">المعلومات الشخصية</span>
                                        <span class ="  icon-container glyphicon glyphicon-user btn btn-grey" style="float: right;height:35px"></span>
                                    </div>

                                </li>
                                <li  style="background: grey;">
                                    <span style="text-align: center;padding-right:10px;color:white"  v-on:click="ProfileCTRL('settings')">الاعدادات</span>
                                    <span class ="  icon-container glyphicon glyphicon-cog btn btn-grey" style="float: right;height:35px"></span>
                                </li>
                                <li  style="background: grey;">
                                    <span style="text-align: center;padding-right:10px;color:white"  v-on:click="ProfileCTRL('cv')">تعديل السيرة الذاتية</span>
                                    <span class ="  icon-container glyphicon glyphicon-file btn btn-grey" style="float: right;height:35px"></span>
                                </li>
                                <li  style="background: grey;">

                                    <span style="text-align: center;padding-right:10px;color:white"  v-on:click="ProfileCTRL('social-media')">ربط الحساب</span>
                                    <span class ="  icon-container glyphicon glyphicon-cloud btn btn-grey" style="float: right;height:35px"></span>
                                </li>


                            </ul>

                        </div>

                    </div>
                </div>
                <hr style="margin-bottom: 0px;margin-top: 0px">
                <div class="text-center" style="  display:inline;padding-bottom:20px">
                    <ul style="  display: flex;
    justify-content:space-around;
    list-style-type:none;">
                        <li>
                            <div >
                                <a href="#" class="fa fa-facebook"></a>


                            </div>
                        </li>
                        <li>
                            <div >
                                <a href="#" class="fa fa-instagram"></a>


                            </div>
                        </li>
                        <li>
                            <div >
                                <a href="#" class="fa fa-twitter"></a>


                            </div>
                        </li>
                    </ul>



                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8" style=";padding-left:20px;padding-right:20px">


            <div id="personal-info" >
             <edit-profile-form></edit-profile-form>
            </div>
            <div id="Settings">
                <Settings></Settings>
            </div>
            <div id="CV">
                <Curriculum-vitae></Curriculum-vitae>
            </div>
            <div id="social-media">
                <Social-media></Social-media>
            </div>

        </div>

    </div>
    </div>
</template>

<script>


    export default {
        name: "UserProfile",
        methods:{

            ProfileCTRL:function(choice){

                switch (choice){
                    case 'settings':{
                        document.getElementById('Settings').style.display="inline";
                        document.getElementById('personal-info').style.display="none";
                        document.getElementById('CV').style.display="none";
                        document.getElementById('social-media').style.display="none";
                        break;
                    }
                    case 'personal-info':{
                        document.getElementById('personal-info').style.display="inline";
                        document.getElementById('Settings').style.display="none";
                        document.getElementById('CV').style.display="none";
                        document.getElementById('social-media').style.display="none";
                        break;
                    }
                    case 'cv':{
                    document.getElementById('CV').style.display="inline";
                    document.getElementById('personal-info').style.display="none";
                    document.getElementById('Settings').style.display="none";
                    document.getElementById('social-media').style.display="none";
                    break;
                }
                    case 'social-media':{
                        document.getElementById('social-media').style.display="inline";
                        document.getElementById('CV').style.display="none";
                        document.getElementById('personal-info').style.display="none";
                        document.getElementById('Settings').style.display="none";

                        break;
                    }
                }

             /*  switch (choice){
                    case 1:{

                        document.getElementById('personal-info').style.display="block-inline";

                        document.getElementById('CV').style.display="none";
                        document.getElementById('socialmedia').style.display="none";

                        break;
                    }
                    case 2:{
                        console.log(choice);
                        document.getElementById('personal-info').style.display="none";
                        document.getElementById('Settings').style.display="block-inline";
                        document.getElementById('CV').style.display="none";
                        document.getElementById('socialmedia').style.display="none";
                        break;
                    }
                    case 3:{
                        console.log(choice);
                        document.getElementById('personal-info').style.display="none";
                        document.getElementById('Settings').style.display="none";
                        document.getElementById('CV').style.display="inline";
                        document.getElementById('socialmedia').style.display="none";
                        break;
                    }
                    case 4:{
                        console.log(choice);
                        document.getElementById('personal-info').style.display="none";
                        document.getElementById('Settings').style.display="none";
                        document.getElementById('CV').style.display="none";
                        document.getElementById('socialmedia').style.display="inline";
                        break;
                    }
                }*/
            }
        },

    }




</script>

<style scoped>
    .card{
        margin-top:6%;
        margin-left: 40px;


    }
    /*the small size*/
    @media (max-width: 480px) {
        .icon {
            width: 70px;
            height: 70px;
        }

        .card{
            margin-top: 17%;
            margin-left: 16px;
        }
    }

    /*the medium size*/
    @media (max-width: 720px) {
        .icon {
            width: 70px;
            height: 70px;
        }

        .card{
            margin-top: 25%;
            margin-left: 25px;
        }
    }

     #avatar{
         border:5px solid white;
         margin-top:-45px;
         width: 100px
     }
    li{
        height:40px;

        border-bottom: 2px solid white;
        text-align: right;
        padding-left:10px;
    }


    li:hover{

        cursor: pointer;

        font-size:16px;
    }
    .icon-container{


        height:30px;
        width:30px;
        padding-top:8px;
        padding-right:0px;
        padding-left:0px;
        margin:0px;
    }
    .fa {
        padding-top:15px;
        font-size: 15px;
        height:50px;
        width: 50px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
        background: #3B5998;
        color: white;
    }
    .fa-twitter {
        background: #55ACEE;
        color: white;
    }

    .fa-instagram {
        background: #125688;
        color: white;
    }

    .overlay {
        position: absolute;
        top: 0%;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        opacity: 1;
        overflow: hidden;
        width: 100%;
        height:0;
        transition: .5s ease;

    }


    .image:hover .overlay {
        bottom: 0;
        height: 8%;
    }
    .inputWrapper {
        height: 32px;
        padding:10px;
        width: 100%;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        float: right;
        background-color: transparent;

    }
    .fileInput {
        cursor: pointer;
        height: 100%;
        position:absolute;
        top: 0;
        right: 0;
        z-index: 99;
        /*This makes the button huge. If you want a bigger button, increase the font size*/
        font-size:50px;
        /*Opacity settings for all browsers*/
        opacity: 0;
        -moz-opacity: 0;
        filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0)
    }

    #personal-info{
        display:inline;
    }
    #Settings,#CV,#social-media{
        display:none;
    }

</style>