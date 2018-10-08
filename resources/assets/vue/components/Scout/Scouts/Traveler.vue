<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left:0px;padding-right:0px">

        <div class="header">
            <h2 class="title">{{Title}}</h2>
        </div>

        <div style="margin-top: 10px;float:left;padding-right:10px;padding-left:10px">
            <button class="btn btn-primary"    style="float:left" @click="export_traveler_list">استخراج قائمة الجوالة</button>

            <router-link class="btn btn-primary"   :to="'/dashboard/AddNewScout/traveler'" style="float:right"><span>اضف جوال</span></router-link>
            <div class="col-md-9 col-xs-12"   >
                <div class="form-group has-feedback has-search">
                    <i class="fa fa-search form-control-feedback" style="z-index: 1"></i>
                    <input type="text" class="form-control" id="search" dir="rtl" style="padding-right:25px" placeholder="ابحث عن جوال" v-on:keyup="searchTraveler()">
                </div>
            </div>
        </div>

        <div id="products" class="row list-group" style="padding-right:15px;padding-left:15px">
            <div class="container   col-md-11 col-sm-11 col-xs-11">
            <div class="item col-lg-5 col-md-11  col-sm-12 col-xs-12  card" style="padding:0px;padding-right:20px; " :id="'traveler'+tvlr.scout_id" v-for="tvlr in MyScouts">
                <div class="row" style="padding-botoom:0px;margin-bottom: 0px">
                    <div class="col-md-1" style="float:left;padding: 0px;margin-left: 10px;" >
                        <i role="button" class="glyphicon glyphicon-remove btn-lg " style="color:red;" @click="removeScout(tvlr)" ></i>

                    </div>

                    <div class="pic col-md-2" style="padding-top: 10px !important;padding-right:10px;float:right" v-if="ImageExiste(tvlr)">
                        <img v-bind:src="'/images/Traveler/'+tvlr.scout.image"  class="img-rounded" width="80" height="165" style="float: right">
                    </div>
                    <div class="pic col-md-2" style="padding-top: 10px !important;padding-right:10px;float:right" v-else>
                        <img src="/images/default.png"  class="img-rounded" width="80" height="165" style="float: right">
                    </div>




                    <div class="col-md-7" style="padding-top:10px;float:right;padding-right:0px;"
                    >
                        <ul style="float: right;">
                            <li>
                                <p style="text-align: right" dir="rtl"><span dir="rtl">اللقب :</span> {{tvlr.scout.last_name}} </p>

                            </li>
                            <li>
                                <p style="text-align: right" dir="rtl"> <span dir="rtl">الاسم:</span> <span>{{tvlr.scout.first_name}}</span>  </p>
                            </li>
                            <li >
                                <p style="text-align: right">تاريخ الميلاد{{tvlr.scout.date_of_birth}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">{{tvlr.scout.membership_date}}:تاريخ الانخراط</p>
                            </li>
                        </ul>
                    </div>








                </div>

                <div>
                    <router-link  class="glyphicon glyphicon-edit btn-lg" onclick="" style="float: left;color:green" :to="'/dashboard/EditScoutInfo/Traveler/'+tvlr.scout.scout_id"></router-link>
                    <span style="text-align:center;float: right;font-size: small;margin-bottom: 0px;padding-right:10px" v-if="setScoutCode(tvlr)">
                       {{Scout_code}}

    </span>

                </div>









            </div>
            </div>
            <div v-if="MyScouts.length===0">
                <h1>لا يوجد اي جوال في الفوج حتى الآن</h1>
            </div>
        </div>
        <sweet-modal ref="confirmation" icon="warning">
            <h3>هل أنت متأكد من حذف هذا الجوال</h3>
            <h4> ملاحظة : هذه العملية غير رجعية</h4>
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
               MyScouts:[],
               Title:'',
               Scout_code:'',
           }

       },
        created: function () {
            var vm=this;
            vm.Title="قائمة الجوالة";
            axios.get("/api"+vm.$route.fullPath).then(function(response){
                vm.MyScouts = response.data.Scouts;
            });





        },
        methods:{
            setScoutCode(tvlr){
                var membershipdate =tvlr.scout.membership_date;

               var scout_code= 'SF-'+ membershipdate.substr(2,2)+'-'+tvlr.scout.scout_id;
                return scout_code;

            },
            removeScout(tvlr) {

                this.$refs.confirmation.open();
                var vm = this;
                $("#confirmation_button").unbind().click(function () {
                    axios.delete("/api/deleteScout/" + tvlr.scout.scout_id).then(function (response) {


                        var position = vm.MyScouts.indexOf(tvlr);
                        vm.MyScouts.splice(position, 1);
                        vm.$refs.confirmation.close();
                    });
                });
                $("#cancel_button").unbind().click(function () {

                    vm.$refs.confirmation.close();

                });

            }, ImageExiste(tvlr){

                if(tvlr.scout.image===""){

                    return false;
                }
                return true;
            },
            export_traveler_list(){
                var vm =this;
                this.show = true;
                axios({
                    url:  '/api/ExportScoutList',
                    method: 'PUT',
                    responseType: 'blob',
                    data:{
                        unit:'tvlr',
                        unit_name:'الجوالة'
                    }
                }).then(function (response) {

                    let blob = new Blob([response.data], { type:  'application/pdf' } );

                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'قائمة الجوالة.pdf';
                    link.click();
                    vm.show = false;
                });
            },
            searchTraveler(){
                var name = $('#search').val();
                var i;
                if(name.localeCompare('')===0){
                    for(i = 0 ;i<this.MyScouts.length;i++){
                        $('#traveler'+this.MyScouts[i].scout_id).show("fast");



                    }
                }else{
                    for(i = 0 ;i<this.MyScouts.length;i++){
                        var fullname = this.MyScouts[i].scout.last_name+" "+this.MyScouts[i].scout.first_name,
                        fullname_reverse = this.MyScouts[i].scout.first_name+" "+this.MyScouts[i].scout.last_name;
                        if(this.MyScouts[i].scout.last_name.localeCompare(name)===0 || this.MyScouts[i].scout.first_name.localeCompare(name)===0 || fullname.localeCompare(name)===0 || fullname_reverse.localeCompare(name)===0 )
                        {
                            $('#traveler'+this.MyScouts[i].scout_id).show("fast");


                        }else{
                            $('#traveler'+this.MyScouts[i].scout_id).hide("slow");
                        }



                    }
                }



            }

        }
    }
</script>

<style scoped>
    .header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
    .header .title{
        color:white;
    }
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


    /** .sccout-card{
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.9);
        -o-transform: scale(1.5);
    }**/
    p,span,h2,h3,h4,button,input{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
    #search{

        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }
    .has-search .form-control-feedback {
        right: 0;
        left: initial;
        color: #ccc;
    }

    .has-search .form-control {
        padding-right: 12px;
        padding-left: 34px;
    }

    .has-feedback .form-control-feedback{
        top: 3px;
        right: -35px !important;
    }
    @media(max-width: 991px){
        .col-xs-12{
            margin-top: 10px;
            margin-left: -15px;
        }
    }
</style>
