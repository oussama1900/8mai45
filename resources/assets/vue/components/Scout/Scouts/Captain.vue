<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left:0px;padding-right:0px">
        <div class="header">
            <h2 class="title">{{Title}}</h2>
        </div>
        <div style="margin-top: 10px;float:left;padding-right:10px;padding-left:10px">
            <button class="btn btn-primary"    style="float:left" @click="export_captain_list">استخراج قائمة القادة</button>
            <router-link class="btn btn-primary"   :to="'/dashboard/AddNewScout/captain'" style="float:right">اضف قائد</router-link>
        </div>

        <div id="products" class="row list-group" style="padding-right:15px;padding-left:15px">

            <div class="container col-md-11 col-sm-11 col-xs-11">
            <div class="item col-lg-5 col-md-11  col-sm-12 col-xs-12  card" style="padding:0px;padding-right:20px; " v-for="cap in MyScouts">
                <div class="row" style="padding-botoom:0px;margin-bottom: 0px">
                    <div class="col-md-1" style="float:left;padding: 0px;margin-left: 10px;" >
                        <span role="button" class="glyphicon glyphicon-remove btn-lg " style="color:red;" @click="removeScout(cap)" ></span>

                    </div>
                    <div class=" pic col-md-2" style="padding-top: 10px;padding-right:10px;float:right" v-if="ImageExiste(cap)">
                      <img v-bind:src="'/images/Captain/'+cap.is_scout.image"  class="img-rounded" width="80" height="120" style="float: right">
                    </div>
                    <div class="pic col-md-2" style="padding-top: 10px;padding-right:10px;float:right" v-else>
                        <img src="/images/default.png"  class="img-rounded" width="80" height="120" style="float: right">
                    </div>
                    <div class="col-md-7" style="padding-top:10px;float:right;padding-right:0px;"
                    >
                        <ul style="float: right;">
                            <li>
                                <p style="text-align: right">اللقب :  {{cap.is_scout.last_name}}   </p>
                            </li>
                            <li>
                                <p style="text-align: right">الاسم : {{cap.is_scout.first_name}} </p>

                            </li>

                            <li >
                                <p style="text-align: right">تاريخ الميلاد : {{cap.is_scout.date_of_birth}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">تاريخ الانخراط : {{cap.is_scout.membership_date}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">  <span>الدور : </span>  <span>{{cap_role(cap)}}</span>      </p>
                            </li>
                        </ul>
                    </div>







                </div>




                <div>
                    <router-link  class="glyphicon glyphicon-edit btn-lg" onclick="" style="float: left;color:green" :to="'/dashboard/EditScoutInfo/Captain/'+cap.scout_id"></router-link>
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
    </div>
</template>

<script>
    export default {
       data(){
           return{
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







                });
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
</style>
