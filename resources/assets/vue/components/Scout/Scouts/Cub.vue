<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card">

        <h2>{{Title}} </h2>

        <div>
            <router-link class="btn btn-success"   :to="'/AddNewScout/cub'" >اضف شبل</router-link>
        </div>
        <hr>
        <div id="products" class="row list-group">
            <div class="container   col-md-11 col-sm-11 col-xs-11">
            <div class="item col-lg-5 col-md-11  col-sm-12 col-xs-12 card" style="padding:0px;padding-right:20px; " v-for="cub in MyScouts">
                <div class="row" style="padding-botoom:0px;margin-bottom: 0px">

                    <div class="col-md-1"  style="float:left;padding: 0px;margin-left: 10px;" >
                        <span role="button" class="glyphicon glyphicon-remove btn-lg " style="color:red;" @click="removeScout(cub)" ></span>

                    </div>
                    <div class=" pic col-md-2" style="padding-top: 10px;padding-right:10px;float:right" v-if="ImageExiste(cub)">
                        <img v-bind:src="'/images/Cubs/'+cub.scout.image"  class="img-rounded" width="80" height="120" style="float: right">
                    </div>
                    <div class=" pic col-md-2" style="padding-top: 10px;padding-right:10px;float:right" v-else>
                        <img src="/images/default.png"  class="img-rounded" width="80" height="120"  style="float: right">
                    </div>
                    <div class="col-md-7" style="padding-top:10px;float:right;padding-right:0px;">
                        <ul style="float: right;">
                          <li>
                              <p style="text-align: right">   اللقب : {{cub.scout.last_name}}  </p>
                          </li>
                            <li>
                                <p style="text-align: right">   الاسم  : {{cub.scout.first_name}} </p>

                            </li>

                            <li >
                                <p style="text-align: right"> {{cub.scout.date_of_birth}}  : تاريخ الميلاد </p>
                            </li>
                            <li >
                                <p style="text-align: right">{{cub.scout.membership_date}}  : تاريخ الانخراط</p>
                            </li>
                        </ul>
                    </div>







                </div>

                <div>
                    <router-link  class="glyphicon glyphicon-edit btn-lg" onclick="" style="float: left;color:green" :to="'/EditScoutInfo/Cub/'+cub.scout.scout_id"></router-link>
                    <span style="text-align:center;float: right;font-size: small;margin-bottom: 0px;padding-right:10px" v-if="    setScoutCode(cub)">
                       {{Scout_code}}

    </span>

                </div>








            </div>

            </div>
            <div v-if="MyScouts.length===0">
                <h1>لا يوجد اي شبل  في الفوج حتى الآن</h1>
            </div>

        </div>

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
            vm.Title="قائمة الأشبال";

            axios.get("/api"+vm.$route.fullPath).then(function(response){

                vm.MyScouts = response.data.Scouts;



            });














        },
        methods:{
            setScoutCode(cub){
                var membershipdate =cub.scout.membership_date;

                this.Scout_code = 'SF-'+ membershipdate.substr(8,2)+'-'+cub.scout.scout_id;
                return true;

            },

            removeScout(cub) {
                var vm = this;
                axios.delete("/api/deleteScout/" + cub.scout.scout_id).then(function (response) {



                  var position = vm.MyScouts.indexOf(cub);


                   vm.MyScouts.splice(position, 1);
                });


            },
            ImageExiste(cub){

                if(cub.scout.image===""){

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
