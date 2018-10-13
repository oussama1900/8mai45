<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left:0px;padding-right:0px">
        <div class="header">
            <h2 class="title">قائمة كشافي الوحدة</h2>
        </div>
        <div style="margin-top: 10px;float:left;padding-right:10px;padding-left:10px">
            <button class="btn btn-primary pull-left"     @click="export_cubs_list">استخراج قائمة كشافي الوحدة</button>
            <router-link class="btn btn-primary pull-right "    :to=route >{{title}}</router-link>

        </div>

        <div id="products" class="row list-group" style="padding-right:15px;padding-left:15px">

            <div class="container col-md-11 col-sm-11 col-xs-11">
                <div class="item col-lg-5 col-md-11  col-sm-12 col-xs-12  card" style="padding:0px;padding-right:20px; " v-for="scout in MyScouts">
                    <div class="row" style="padding-botoom:0px;margin-bottom: 0px">
                        <div class="col-md-1"  style="float:left;padding: 0px;margin-left: 10px;" >
                            <i role="button" class="glyphicon glyphicon-remove btn-lg " style="color:red;" @click="removeScout(scout)" ></i>

                        </div>
                        <div class=" pic col-md-2" style="padding-top: 10px !important;padding-right:10px;float:right" v-if="ImageExiste(scout)">
                            <img v-bind:src="'/images/Cubs/'+scout.image"  class="img-rounded" width="80" height="165" style="float: right" v-if="scout.image.includes('Cubs')">
                            <img v-bind:src="'/images/Scout/'+scout.image"  class="img-rounded" width="80" height="165" style="float: right" v-if="scout.image.includes('Scout')">
                            <img v-bind:src="'/images/AdvancedScout/'+scout.image"  class="img-rounded" width="80" height="165" style="float: right" v-if="scout.image.includes('AdvancedScout')">
                            <img v-bind:src="'/images/Traveler/'+scout.image"  class="img-rounded" width="80" height="165" style="float: right" v-if="scout.image.includes('Traveler')">

                        </div>
                        <div class="pic col-md-2" style="padding-top: 10px;padding-right:10px;float:right" v-else>
                            <img src="/images/default.png"  class="img-rounded" width="80" height="120" style="float: right">
                        </div>
                        <div class="col-md-7" style="padding-top:10px;float:right;padding-right:0px;"
                        >
                            <ul style="float: right;">
                                <li>
                                    <p style="text-align: right" dir="rtl"> <span dir="rtl">اللقب :</span> <span>{{scout.last_name}}</span>    </p>
                                </li>
                                <li>
                                    <p style="text-align: right" dir="rtl"> <span dir="rtl">الاسم :</span><span>{{scout.first_name}}</span>  </p>

                                </li>

                                <li >
                                    <p style="text-align: right">تاريخ الميلاد : {{scout.date_of_birth}} </p>
                                </li>
                                <li >
                                    <p style="text-align: right">تاريخ الانخراط : {{scout.membership_date}} </p>
                                </li>
                                <li >
                                    <p style="text-align: right">  <span>الهاتف</span>  <span>{{scout.phone}}</span>      </p>
                                </li>
                                <li >
                                    <p style="text-align: right">    <span>{{scout.email}}</span>     <span> : البريد الإلكتروني   </span> </p>
                                </li>
                            </ul>
                        </div>







                    </div>




                    <div>
                        <router-link  class="glyphicon glyphicon-edit btn-lg" onclick="" style="float: left;color:green" :to="edit_route+scout.scout_id"></router-link>
                        <span style="text-align:center;float: right;font-size: small;margin-bottom: 0px;padding-right:10px" >
                       {{setScoutCode(scout)}}

    </span>

                    </div>










                </div>
            </div>
            <div v-if="MyScouts.length===0">
                <h1>لا يوجد اي كشاف في الوحدة حتى الآن</h1>
            </div>
        </div>
        <sweet-modal ref="confirmation" icon="warning">
            <h3>هل أنت متأكد </h3>
            <h4> ملاحظة : هذه العملية غير رجعية</h4>
            <button id="cancel_button" class="btn btn-danger" style="margin:10px;margin-top:20px">لا</button>
            <button id="confirmation_button" class="btn btn-primary" style="margin: 10px;margin-top:20px" >نعم</button>

        </sweet-modal>
    </div>

</template>

<script>
    export default {
        name: "MyScout",
        data(){
            return{
                MyScouts:'',
                route:'',
                title:'',
                edit_route:''
            }
        },
        created:function () {
            var vm = this;
            axios.get('/api/getMyScout').then(function (response) {
              vm.MyScouts = response.data.myscout;
              if(response.data.unit_name.localeCompare('cubs')===0){
                  vm.title="أضف شبل";
                  vm.route ='/dashboard/AddNewScout/cub';
                  vm.edit_route ='/dashboard/EditScoutInfo/Cub/';
              }
              if(response.data.unit_name.localeCompare('sct')===0){
                  vm.title="أضف كشاف";
                  vm.route ='/dashboard/AddNewScout/scout' ;
                  vm.edit_route ='/dashboard/EditScoutInfo/Scout/' ;
              }
              if(response.data.unit_name.localeCompare('asct')===0){
                  vm.title="أضف كشاف متقدم";
                  vm.route = '/dashboard/AddNewScout/advancedscout';
                  vm.edit_route = '/dashboard/EditScoutInfo/AdvancedScout/';
              }
              if(response.data.unit_name.localeCompare('tvlr')===0){
                  vm.title="أضف جوال";
                  vm.route ='/dashboard/AddNewScout/traveler';
                  vm.edit_route ='/dashboard/EditScoutInfo/Traveler/';
              }

            });
            
        },
        methods: {
            setScoutCode(scout) {
                var membershipdate = scout.membership_date;


                var scout_code = 'SF-' + membershipdate.substr(2, 2) + '-' + scout.scout_id;
                return scout_code;
            },
            ImageExiste(scout) {

                if (scout.image === "") {

                    return false;
                }
                return true;
            },
            export_cubs_list() {
                axios({
                    url: '/api/ExportScoutList',
                    method: 'PUT',
                    responseType: 'blob',
                    data: {
                        unit: '',
                        unit_name: ''
                    }
                }).then(function (response) {


                    let blob = new Blob([response.data], {type: 'application/pdf'});

                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'قائمة كشافي الوحدة.pdf';
                    link.click();


                }) .catch(error => {
                    console.API.clear();
                });
            },
            removeScout(scout) {
                this.$refs.confirmation.open();
                var vm = this;
                $("#confirmation_button").unbind().click(function () {
                    axios.delete("/api/deleteScout/" + scout.scout_id).then(function (response) {



                        var position = vm.MyScouts.indexOf(scout);


                        vm.MyScouts.splice(position, 1);
                        vm.$refs.confirmation.close();
                    });
                });
                $("#cancel_button").unbind().click(function () {

                    vm.$refs.confirmation.close();

                });


            },
        }
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
    .header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
    .header .title{
        color:white;
    }
    .arabic-font{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }

    p,span,h2,h3,h4,button{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }

</style>