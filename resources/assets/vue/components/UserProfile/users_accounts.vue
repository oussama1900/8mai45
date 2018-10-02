<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left:0px;padding-right:0px">
<div class="header">
    <h2 class="title">قائمة حسابات مستخدمي الموقع  </h2>
</div>


        <div style="margin-top: 10px;float:left;padding-right:10px;padding-left:10px">
            <button class="btn btn-primary"    style="float:left" @click="export_user_list">استخراج قائمة المستخدمين</button>
            <router-link class="btn btn-primary"   :to="'/dashboard/NewUser'"  style="float:right"><span>اضف مستخدم جديد</span></router-link>
        </div>



        <div id="products" class="row list-group" style="padding-right:15px;padding-left:15px">
            <div class="container   col-md-11 col-sm-11 col-xs-11">
            <div class="item col-lg-5 col-md-11  col-sm-12 col-xs-12 card" style="padding:0px;padding-right:20px; " v-for="users in Users">
                <div class="row" style="padding-botoom:0px;margin-bottom: 0px">
                    <div class="col-md-1" style="float:left;padding: 0px;margin-left: 10px;"  >
                        <i role="button" class="glyphicon glyphicon-remove btn-lg " style="color:red;" @click="removeaccount(users)" ></i>

                    </div>

                    <div class="pic col-md-2" style="padding-top: 10px !important;padding-right:10px;float:right" v-if="ImageExiste(users)">
                        <img v-bind:src="'/images/Captain/'+users.profile.image"  class="img-rounded" width="80" height="165" style="float: right">
                    </div>
                    <div class="pic col-md-2" style="padding-top: 10px !important;padding-right:10px;float:right" v-else>
                        <img src="/images/default.png"  class="img-rounded" width="80" height="165" style="float: right">
                    </div>


                    <div class="col-md-7" style="padding-top:10px;float:right;padding-right:0px;"
                    >
                        <ul style="float: right;">
                            <li>
                                <p style="text-align: right" dir="rtl"> <span dir="rtl">الاسم :</span> <span>{{users.profile.first_name}}</span> </p>

                            </li>
                            <li>
                                <p style="text-align: right" dir="rtl"><span dir="rtl">اللقب :</span> <span>  {{users.profile.last_name}}</span>  </p>
                            </li>
                            <li >

                                <p style="text-align: right">  <small>{{users.email}}</small> <span> :البريد الالكتروني </span>  </p>
                            </li>
                            <li >
                                <p style="text-align: right">{{users.created_at}}:أنشـأ بتاريخ</p>
                            </li>
                            <li >
                                <p style="text-align: right">{{users.updated_at}}:تم تعديله بتاريخ</p>
                            </li>
                        </ul>
                    </div>








                </div>

                <div>
                    <router-link  class="glyphicon glyphicon-edit btn-lg" onclick="" style="float: left;color:green" :to="'/dashboard/EditAccountInfo/'+users.profile.scout_id"></router-link>
                    <span style="text-align:center;float: right;font-size: small;margin-bottom: 0px;padding-right:10px" >
                        {{setScoutCode(users)}}
    </span>

                </div>








            </div>
            </div>


        </div>
        <sweet-modal ref="confirmation" icon="warning">
            <h3>هل أنت متأكد من حذف هذا الحساب</h3>
            <button id="cancel_button" class="btn btn-danger" style="margin:10px;margin-top:20px">لا</button>
            <button id="confirmation_button" class="btn btn-primary" style="margin: 10px;margin-top:20px" >نعم</button>

        </sweet-modal>
        <loading
                :show="show"
                :label="label">
        </loading>
    </div>

</template>

<script>
    import loading from 'vue-full-loading';
    export default {
        components: {
            loading
        },
       data(){
           return{
               show: false,
               label: '....الرجاء الإنتظار',
               Users:[],
               Scout_code:'',


           }

       },
        created: function () {
            var vm=this;


            axios.get("/api/users-accounts").then(function(response){




               vm.Users = response.data.users;

            });














        },
        methods:{
            setScoutCode(user){
                var membershipdate;
                var vm = this;



               vm.Scout_code = 'SF-'+  user.profile.membership_date.substr(8,2)+'-'+user.scout_id;
   var scout_code =  'SF-'+  user.profile.membership_date.substr(8,2)+'-'+user.scout_id;
                return scout_code;

            },
            removeaccount(user) {
                this.$refs.confirmation.open();
                var vm = this;
                $("#confirmation_button").unbind().click(function () {

                    axios.delete("/api/deleteaccount/"+user.profile.scout_id).then(function (response) {



                        var position = vm.Users.indexOf(user);

                        vm.Users.splice(position, 1);
                        vm.$refs.confirmation.close();
                    });
                });
                $("#cancel_button").unbind().click(function () {

                    vm.$refs.confirmation.close();

                });


            },
            ImageExiste(user){

                if(user.profile.image===""){

                    return false;
                }
                return true;
            },
            export_user_list(){
                this.show = true;
                var vm  =this;
                axios({
                    url:  '/api/ExportUsersList',
                    method: 'GET',
                    responseType: 'blob',
                }).then(function (response) {

                    let blob = new Blob([response.data], { type:  'application/pdf' } );

                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'قائمة مستخدمي الموقع الإلكتروني.pdf';
                    link.click();
                    vm.show = false;







                });
            }

        }
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
    @media (max-width: 450px){
        .pic{
            padding-top:40px !important;
        }
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
  /** .sccout-card{
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.9);
        -o-transform: scale(1.5);
    }**/
    p,span,h2,h3,h4,button{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
</style>
