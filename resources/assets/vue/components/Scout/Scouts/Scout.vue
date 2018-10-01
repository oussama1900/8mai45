<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left:0px;padding-right:0px">
        <div class="header">
            <h2 class="title">{{Title}}</h2>
        </div>

        <div style="margin-top: 10px;float:left;padding-right:10px;padding-left:10px">
            <button class="btn btn-primary"    style="float:left" @click="export_scout_list">استخراج قائمة الكشاف</button>
            <router-link class="btn btn-primary"   :to="'/dashboard/AddNewScout/scout'" style="float:right">اضف كشاف</router-link>
        </div>

        <div id="products" class="row list-group">
            <div class="container   col-md-11 col-sm-11 col-xs-11">
                <div class="item  col-lg-5 col-md-11  col-sm-12 col-xs-12  card" style="padding:0px;padding-right:20px; " v-for="scout in MyScouts">
                <div class="row" style="padding-botoom:0px;margin-bottom: 0px;">
                    <div class=" col-md-1" style="float:left;padding: 0px;margin-left: 10px;" >
                        <span role="button" class="glyphicon glyphicon-remove btn-lg " style="color:red;" @click="removeScout(scout)" ></span>

                    </div>

                    <div class="pic col-md-2" style="padding-top: 10px;padding-right:10px;float:right" v-if="ImageExiste(scout)">
                        <img v-bind:src="'/images/Scout/'+scout.scout.image"  class="  img-rounded" width="80" height="120" style="float: right">
                    </div>
                    <div class=" pic col-md-2" style="padding-top: 10px;padding-right:10px;float:right" v-else>
                        <img src="/images/default.png"  class=" img-rounded" width="80" height="120" style="float: right">
                    </div>
                    <div class="  col-md-7 " style="padding-top:10px;float:right;padding-right:0px;">
                        <ul style="float: right;">
                            <li>
                                <p style="text-align: right"> اللقب: {{scout.scout.last_name}} </p>

                            </li>
                            <li>
                                <p style="text-align: right">الاسم : {{scout.scout.first_name}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">تاريخ الميلاد{{scout.scout.date_of_birth}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">{{scout.scout.membership_date}}:تاريخ الانخراط</p>
                            </li>
                        </ul>
                    </div>








                </div>

                <div>
                    <router-link  class="glyphicon glyphicon-edit btn-lg" onclick="" style="float: left;color:green;padding-left:13px" :to="'/dashboard/EditScoutInfo/Scout/'+scout.scout.scout_id"></router-link>
                    <span style="text-align:center;float: right;font-size: small;margin-bottom: 0px;padding-right:10px" >
                       {{  setScoutCode(scout)}}

    </span>

                </div>








            </div>
            </div>

            <div v-if="MyScouts.length===0">
                <h1>لا يوجد اي كشاف في الفوج حتى الآن </h1>
            </div>
        </div>
        <sweet-modal ref="confirmation" icon="warning">
            <h3>هل أنت متأكد من حذف هذا الكشاف</h3>
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
            vm.Title = "قائمة الكشافين";
            axios.get("/api"+vm.$route.fullPath).then(function(response){
                vm.MyScouts = response.data.Scouts;
            });





        },
        methods:{
            setScoutCode(scout){
                var membershipdate =scout.scout.membership_date;

                var scout_code = 'SF-'+ membershipdate.substr(2,2)+'-'+scout.scout.scout_id;
                return scout_code;

            },
            removeScout(scout) {

                this.$refs.confirmation.open();
                var vm = this;
                $("#confirmation_button").unbind().click(function () {
                    axios.delete("/api/deleteScout/" + scout.scout.scout_id).then(function (response) {


                        var position = vm.MyScouts.indexOf(scout);
                        vm.MyScouts.splice(position, 1);
                        vm.$refs.confirmation.close();
                    });
                });

                $("#cancel_button").unbind().click(function () {

                    vm.$refs.confirmation.close();

                });
            },
            ImageExiste(scout){

                if(scout.scout.image===""){

                    return false;
                }
                return true;
            },
            export_scout_list() {
                var vm =this;
                this.show = true;
                axios({
                    url: '/api/ExportScoutList',
                    method: 'PUT',
                    responseType: 'blob',
                    data: {
                        unit: 'sct',
                        unit_name: 'الكشاف'
                    }
                }).then(function (response) {

                    let blob = new Blob([response.data], {type: 'application/pdf'});

                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'قائمة الكشاف.pdf';
                    link.click();
                    vm.show = false;

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
</style>
