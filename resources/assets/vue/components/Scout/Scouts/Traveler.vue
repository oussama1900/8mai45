<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card">

        <h2>{{Title}} </h2>

        <div>
            <router-link class="btn btn-success"   :to="'/AddNewScout/traveler'" >اضف جوال</router-link>
        </div>
        <hr>
        <div id="products" class="row list-group">
            <div class="item col-xs-5 col-md-5 card" style="padding:0px;margin-left:40px;margin-right:40px" v-for="tvlr in MyScouts">
                <div class="row" style="padding-botoom:0px;margin-bottom: 0px">
                    <div class="col-md-1" style="padding: 0px;margin-left: 10px;" >
                        <span role="button" class="glyphicon glyphicon-remove btn-lg " style="color:red;" @click="removeScout(tvlr)" ></span>

                    </div>
                    <div class="col-md-7" style="padding-right: 10px;padding-top:10px;margin-right: 20px"
                    >
                        <ul style="float: right;">
                            <li>
                                <p style="text-align: right">الاسم : {{tvlr.scout.last_name}} </p>

                            </li>
                            <li>
                                <p style="text-align: right">اللقب : {{tvlr.scout.first_name}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">تاريخ الميلاد{{tvlr.scout.date_of_birth}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">{{tvlr.scout.membership_date}}:تاريخ الانخراط</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3" style="padding-top: 10px" v-if="ImageExiste(tvlr)">
                        <img v-bind:src="'/images/Traveler/'+tvlr.scout.image"  class="img-rounded" width="80" height="120" style="float: right">
                    </div>
                    <div class="col-md-3" style="padding-top: 10px" v-else>
                        <img src="/images/default.png"  class="img-rounded" width="80" height="120" style="float: right">
                    </div>







                </div>

                <div>
                    <router-link  class="glyphicon glyphicon-edit btn-lg" onclick="" style="float: left;color:green" :to="'/EditScoutInfo/'+tvlr.scout.scout_id"></router-link>
                    <span style="text-align:center;float: right;font-size: small;margin-bottom: 0px;padding-right:10px">
                       SF-XX-XXXX

    </span>

                </div>









            </div>

            <div v-if="MyScouts.length===0">
                <h1>لا يوجد اي جوال في الفوج حتى الآن</h1>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       data(){
           return{
               MyScouts:[],
               Title:''
           }

       },
        created: function () {
            var vm=this;
            vm.Title="قائمة الجوالة";
            axios.get("http://localhost:8000/api"+vm.$route.fullPath).then(function(response){
                vm.MyScouts = response.data.Scouts;
            });





        },
        methods:{

            removeScout(tvlr) {

                var vm = this;
                axios.delete("http://localhost:8000/api/deleteScout/" + tvlr.scout.scout_id).then(function (response) {


                    var position = vm.MyScouts.indexOf(tvlr);
                    vm.MyScouts.splice(position, 1);
                });
            }, ImageExiste(tvlr){

                if(tvlr.scout.image===""){

                    return false;
                }
                return true;
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
  /** .sccout-card{
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.9);
        -o-transform: scale(1.5);
    }**/
</style>