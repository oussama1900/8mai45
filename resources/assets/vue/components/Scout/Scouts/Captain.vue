<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left:0px;padding-right:0px">
        <div class="header">
            <h2 class="title">{{Title}}</h2>
        </div>

        <div style="margin-top: 10px;float:left;padding-right:10px;padding-left:10px">
            <button class="btn btn-primary"    style="float:left" @click="export_captain_list">استخراج قائمة القادة</button>
            <router-link class="btn btn-primary"   :to="'/dashboard/AddNewScout/captain'" style="float:right">   <span>اضف قائد</span></router-link>
            <div class="col-md-9 col-xs-12"   >
                <div class="form-group has-feedback has-search">
                    <i class="fa fa-search form-control-feedback" style="z-index: 1"></i>
                    <input type="text" class="form-control" id="search" dir="rtl" style="padding-right:25px" placeholder="ابحث عن قائد" v-on:keyup="searchcaptain()">
                </div>
            </div>
        </div>

        <div id="products" class="row list-group" style="padding-right:15px;padding-left:15px">

            <div class="container col-md-11 col-sm-11 col-xs-11">
            <div class="item col-lg-5 col-md-11  col-sm-12 col-xs-12  card" :id="'captain'+cap.scout_id" style="padding:0px;padding-right:20px; " v-for="cap in MyScouts">
                <div class="row" style="padding-botoom:0px;margin-bottom: 0px">
                    <div class="col-md-1" style="float:left;padding: 0px;margin-left: 10px;" >
                        <i role="button" class="glyphicon glyphicon-remove btn-lg " style="color:red;" @click="removeScout(cap)"   v-if="cap.role.localeCompare('dev')!==0"></i>

                    </div>
                    <div class=" pic col-md-2" style="padding-top: 10px !important;padding-right:10px;float:right" v-if="ImageExiste(cap)">
                      <img v-bind:src="'/images/Captain/'+cap.is_scout.image"  class="img-rounded" width="80" height="165" style="float: right">
                    </div>
                    <div class="pic col-md-2" style="padding-top: 10px !important;padding-right:10px;float:right" v-else>
                        <img src="/images/default.png"  class="img-rounded" width="80" height="165" style="float: right">
                    </div>
                    <div class="col-md-7" style="padding-top:10px;float:right;padding-right:0px;"
                    >
                        <ul style="float: right;">
                            <li>

                                <p style="text-align: right" dir="rtl">  <span dir="rtl"> اللقب : </span> <span> {{cap.is_scout.last_name}} </span> </p>
                            </li>
                            <li>
                                <p style="text-align: right" dir="rtl"> <span  dir="rtl">الاسم : </span> <span>{{cap.is_scout.first_name}}</span>  </p>

                            </li>

                            <li >
                                <p style="text-align: right">تاريخ الميلاد : {{cap.is_scout.date_of_birth}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">تاريخ الانخراط : {{cap.is_scout.membership_date}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">  <span>الدور : </span>  <span>{{cap_role(cap)}}</span>   <span>{{cap_unit(cap)}}</span>    </p>
                            </li>
                        </ul>
                    </div>







                </div>




                <div>
                    <router-link  class="glyphicon glyphicon-edit btn-lg" onclick="" style="float: left;color:green" :to="'/dashboard/EditScoutInfo/Captain/'+cap.scout_id"  v-if="cap.role.localeCompare('dev')!==0"></router-link>
                    <span style="text-align:center;float: right;font-size: small;margin-bottom: 0px;padding-right:10px" >
                       {{setScoutCode(cap)}}

    </span>

                </div>










            </div>
            </div>
            <div v-if="MyScouts.length===0">
                <h1>لا يوجد اي قائد في الفوج حتى الآن</h1>
            </div>
        </div>
        <sweet-modal ref="confirmation" icon="warning">
            <h3>هل أنت متأكد من حذف هذا القائد</h3>
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

            vm.Title="قائمة القادة";
            axios.get("/api"+vm.$route.fullPath).then(function(response){


                vm.MyScouts = response.data.Scouts;


            });






        },
        methods:{
            cap_unit(cap){
                if(cap.unit.localeCompare("cubs")===0)
                    return " - الأشبال";
                if(cap.unit.localeCompare("sct")===0)
                    return " - الكشاف";
                if(cap.unit.localeCompare("asct")===0)
                    return " - الكشاف المتقدم";
                if(cap.unit.localeCompare("tvlr")===0)
                    return " - الجوالة";
                return "";
            },
           cap_role(cap){
               if(cap.role.localeCompare("gov")===0)
                   return "محافظ الفوج";
               if(cap.role.localeCompare("vgov")===0)
                   return "نائب محافظ الفوج";
               if(cap.role.localeCompare("ucap")===0)
                   return "قائد وحدة";
               if(cap.role.localeCompare("vucp")===0)
                   return "نائب قائد وحدة";
               if(cap.role.localeCompare("capa")===0)
                   return "قائد مساعد";
               if(cap.role.localeCompare("trne")===0)
                   return "قائد متربص";
               if(cap.role.localeCompare("fin")===0)
                   return "مسؤول المالية";
               if(cap.role.localeCompare("vfin")===0)
                   return "مسؤول العتاد";
               if(cap.role.localeCompare("med")===0)
                   return "مسؤول الإعلام";
               if(cap.role.localeCompare("vmed")===0)
                   return "نائب مسؤول الإعلام";
               if(cap.role.localeCompare("csd")===0)
                   return "خدمة و تنمية المجتمع";
               if(cap.role.localeCompare("surv")===0)
                   return "متابعة البرامج وتنفيذ الخطط";
               if(cap.role.localeCompare("dev")===0)
                   return "مطور الموقع";
               if(cap.role.localeCompare("none")===0)
                   return "لا يملك دور";
           },
           setScoutCode(cap){
               var membershipdate =cap.is_scout.membership_date;

               this.Scout_code = 'SF-'+ membershipdate.substr(2,2)+'-'+cap.is_scout.scout_id;
                     var scout_code = 'SF-'+ membershipdate.substr(2,2)+'-'+cap.is_scout.scout_id;
             return scout_code;
           },

            removeScout(cap) {

                this.$refs.confirmation.open();
                var vm = this;
                $("#confirmation_button").unbind().click(function () {
                    axios.delete("/api/deleteScout/" + cap.is_scout.scout_id).then(function (response) {


                        var position = vm.MyScouts.indexOf(cap);
                        vm.MyScouts.splice(position, 1);
                        vm.$refs.confirmation.close();
                    });
                });
                $("#cancel_button").unbind().click(function () {

                    vm.$refs.confirmation.close();

                });
            },
            ImageExiste(cap){

              if(cap.is_scout.image===""){

                    return false;
                }
                return true;
            },
            export_captain_list(){
                var vm =this;
                this.show = true;
                axios({
                    url:  '/api/ExportScoutList',
                    method: 'PUT',
                    responseType: 'blob',
                    data:{
                        unit:"cap"
                    }
                }).then(function (response) {

                    let blob = new Blob([response.data], { type:  'application/pdf' } );

                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'قائمة القادة.pdf';
                    link.click();
                    vm.show = false;






                });
            },
            searchcaptain(){
                var name = $('#search').val();
                var i;
                if(name.localeCompare('')===0){
                    for(i = 0 ;i<this.MyScouts.length;i++){
                        $('#captain'+this.MyScouts[i].scout_id).show("fast");



                    }
                }else{
                    for(i = 0 ;i<this.MyScouts.length;i++){
                        var fullname = this.MyScouts[i].is_scout.last_name+" "+this.MyScouts[i].is_scout.first_name,
                         fullname_reverse = this.MyScouts[i].is_scout.first_name+" "+this.MyScouts[i].is_scout.last_name;
                        if(this.MyScouts[i].is_scout.last_name.localeCompare(name)===0 || this.MyScouts[i].is_scout.first_name.localeCompare(name)===0 || fullname.localeCompare(name)===0 || fullname_reverse.localeCompare(name)===0)
                        {
                            $('#captain'+this.MyScouts[i].scout_id).show("fast");


                        }else{
                            $('#captain'+this.MyScouts[i].scout_id).hide("slow");
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
    #search{

        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
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
    }    @media (max-width: 450px){
        .pic{
            padding-top:45px !important;
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
