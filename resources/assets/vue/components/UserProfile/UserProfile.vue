<template>
    <div class="container  col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px">
    <div id="profile" class="row">
        <div class="col-lg-4 col-md-4"
             style="padding-right:20px;"
        >
            <div class="card card-user" style="margin-left: 20px">
                <div class="image">


                    <img src="/images/default.png"  width=100% alt="الخلفية"  v-if="myimage===''">
                    <img v-bind:src="'/images/Captain/'+myimage"  width=100% alt="الخلفية" v-else>
                    <div class="overlay">
                        <div class="inputWrapper">
                            <i class="glyphicon glyphicon-picture" aria-hidden="true" style=" font-size: 20px;float:right;color:white"></i>
                            <span style="float:right;font-size:medium;padding-right:5px;color:white">حمل صورة</span>


                            <input class="fileInput" type="file" name="file1"
                                   accept="image/*"
                                   @change="setImage($event)"
                            />
                        </div>

                    </div>


                </div>
                <div class="content">
                    <div class="profile-picture">

                        <img class="avatar border-white" id="avatar1" src="/images/default.png"   height="100" width="100px" alt="الصورة الشخصية"  v-if="myimage===''">
                        <img class="avatar border-white" id="avatar" v-bind:src="'/images/Captain/'+myimage"   height="100" width="100px" alt="الصورة الشخصية" v-else>

                        <h4 style="color: #949494;">
                           <p style="margin-bottom: 0px"> {{fullname}}</p>



                            <small>{{role}}</small>

                        </h4>
                    </div>
                    <div>
                        <div>
                            <ul  style="margin-bottom: 0px">
                                <li  style="background: grey; " id="first"  v-on:click="ProfileCTRL('personal-info')">
                                    <div >
                                        <span style="text-align: center;padding-right:10px;color:white;margin-top:5px;font-size:17px;" >المعلومات الشخصية</span>
                                        <i class ="  icon-container glyphicon glyphicon-user btn btn-grey" style="float: right; height: 38px;margin-top:-1px;border-radius:0px"></i>
                                    </div>

                                </li>
                                <li  style="background: grey;"  v-on:click="ProfileCTRL('settings')">
                                    <span style="text-align: center;padding-right:10px;color:white;font-size:17px;margin-top:5px">تغيير كلمة السر</span>
                                    <i class ="  icon-container glyphicon glyphicon-cog btn btn-grey" style="float: right; height: 38px;margin-top:-1px;border-radius:0px"></i>
                                </li>
                                <li  style="background: grey;"  v-on:click="ProfileCTRL('cv')">
                                    <span style="text-align: center;padding-right:10px;color:white;font-size:17px;margin-top:5px"  >تعديل السيرة الذاتية</span>
                                    <i class ="  icon-container glyphicon glyphicon-file btn btn-grey" style="float: right; height: 38px;margin-top:-1px;border-radius:0px"></i>
                                </li>
                                <li  style="background: grey;"  v-on:click="ProfileCTRL('social-media')">

                                    <span style="text-align: center;padding-right:10px;color:white;font-size:17px;margin-top:5px" >مواقع التواصل الإجتماعية</span>
                                    <i class ="  icon-container glyphicon glyphicon-cloud btn btn-grey" style="float: right; height: 38px;margin-top:-1px;border-radius:0px"></i>
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
                                <a :href="facebook" class="fa fa-facebook"></a>


                            </div>
                        </li>
                        <li>
                            <div >
                                <a :href="instagram" class="fa fa-instagram"></a>


                            </div>
                        </li>
                        <li>
                            <div >
                                <a :href="twitter" class="fa fa-twitter"></a>


                            </div>
                        </li>
                    </ul>



                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8" style=";padding-left:20px;padding-right:20px">


            <div v-if="data.personal_info" id="personal-info" >
             <edit-profile-form></edit-profile-form>
            </div>
            <div v-if="data.settings"  id="Settings">
                <Settings></Settings>
            </div>
            <div v-if="data.cv"  id="CV">
                <Curriculum-vitae></Curriculum-vitae>
            </div>
            <div v-if="data.social_media"  id="social-media">
                <Social-media></Social-media>
            </div>

        </div>

    </div>
        <loading
                class="loading-style"
                :show="show"
                :label="label">
        </loading>
        <sweet-modal ref="imagesize" icon="error">
            <h3><span>حجم الصورة كبير </span></h3>
            <h3> 4 <span>Mo</span> <span>حجم الصورة يجب ان يكون اقل من </span>    </h3>
        </sweet-modal>
    </div>
</template>

<script>

    import loading from 'vue-full-loading';
    export default {
           components:{
               loading
           },
        data(){
            return{
                data:{
                    personal_info:true,
                    settings:false,
                    cv:false,
                    social_media:false

                },
                show: false,
                label: '....الرجاء الإنتظار',
                myimage:'',
                newimage:'',
                fullname:"",
                role:'',
                facebook:'',
                instagram:'',
                twitter:'',
            }
        },
        created :function(){
            this.getimage();
        },

        methods:{

            ProfileCTRL:function(choice){

                switch (choice){
                    case 'settings':{
                       this.data.personal_info=false;
                       this.data.settings=true;
                       this.data.cv=false;
                       this.data.social_media=false;
                        break;
                    }
                    case 'personal-info':{
                        this.data.personal_info=true;
                        this.data.settings=false;
                        this.data.cv=false;
                        this.data.social_media=false;
                        break;
                    }
                    case 'cv':{
                        this.data.personal_info=false;
                        this.data.settings=false;
                        this.data.cv=true;
                        this.data.social_media=false;
                    break;
                }
                    case 'social-media':{
                        this.data.personal_info=false;
                        this.data.settings=false;
                        this.data.cv=false;
                        this.data.social_media=true;
                        break;
                    }
                }


            },
            getimage(){
                var vm = this;
                axios.get('/api/getimage').then(function (response) {
                   vm.myimage=response.data.image;
                   vm.fullname=response.data.fullname;
                   vm.role=response.data.role;
                   vm.facebook=response.data.facebook;
                   vm.instagram=response.data.instagram;
                   vm.twitter=response.data.twitter;

                });

            },
            setImage(e){
                if(e.target.files[0]===undefined ){

                }else{
                    var vm = this;

                    var filereader = new FileReader();


                    var imagesize =((e.target.files[0].size)/1024)/1024;
                    if(Math.floor(imagesize)<4){
                        this.show=true;
                        filereader.readAsDataURL(e.target.files[0]);
                        filereader.onload =(e)=>{






                            this.newimage = e.target.result;

                            axios.post('/api/changmyimage',{image:vm.newimage}).then(function (response) {

                                vm.myimage = response.data.image;
                                vm.show=false;
                            });

                        };
                    }else{
                        vm.$refs.imagesize.open();
                    }





                    }
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

     #avatar,#avatar1{
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

        font-size:18px;
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

input,span,small,p{
    font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

}

    .loading-style{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }

</style>