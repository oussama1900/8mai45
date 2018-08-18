<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card">

        <h2>{{Title}} </h2>

        <div>
            <router-link class="btn btn-success"   :to="'/AddNewScout/scout'" >اضف كشاف</router-link>
        </div>
        <hr>
        <div id="products" class="row list-group">
            <div class="item col-xs-5 col-md-5 card" style="padding:0px;margin-left:40px;margin-right:40px" v-for="scout in MyScouts">
                <div class="row" style="padding-botoom:0px;margin-bottom: 0px">
                    <div class="col-md-1" style="padding: 0px;margin-left: 10px;" >
                        <span role="button" class="glyphicon glyphicon-remove btn-lg " style="color:red;" @click="removeScout(scout)" ></span>

                    </div>
                    <div class="col-md-7" style="padding-right: 10px;padding-top:10px;margin-right: 20px"
                    >
                        <ul style="float: right;">
                            <li>
                                <p style="text-align: right">الاسم : {{scout.scout.last_name}} </p>

                            </li>
                            <li>
                                <p style="text-align: right">اللقب : {{scout.scout.first_name}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">تاريخ الميلاد{{scout.scout.date_of_birth}} </p>
                            </li>
                            <li >
                                <p style="text-align: right">{{scout.scout.membership_date}}:تاريخ الانخراط</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3" style="padding-top: 10px" v-if="ImageExiste(scout)">
                        <img v-bind:src="'/images/Scout/'+scout.scout.image"  class="img-rounded" width="80" height="120" style="float: right">
                    </div>
                    <div class="col-md-3" style="padding-top: 10px" v-else>
                        <img src="/images/default.png"  class="img-rounded" width="80" height="120" style="float: right">
                    </div>







                </div>

                <div>
                    <router-link  class="glyphicon glyphicon-edit btn-lg" onclick="" style="float: left;color:green" :to="'/EditScoutInfo/Scout/'+scout.scout.scout_id"></router-link>
                    <span style="text-align:center;float: right;font-size: small;margin-bottom: 0px;padding-right:10px" v-if="    setScoutCode(scout)">
                       {{Scout_code}}

    </span>

                </div>








            </div>

            <div v-if="MyScouts.length===0">
                <h1>لا يوجد اي كشاف في الفوج حتى الآن </h1>
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
            vm.Title = "قائمة الكشافين";
            axios.get("/api"+vm.$route.fullPath).then(function(response){
                vm.MyScouts = response.data.Scouts;
            });





        },
        methods:{
            setScoutCode(scout){
                var membershipdate =scout.scout.membership_date;

                this.Scout_code = 'SF-'+ membershipdate.substr(8,2)+'-'+scout.scout.scout_id;
                return true;

            },
            removeScout(scout) {

                var vm = this;
                axios.delete("/api/deleteScout/" + scout.scout.scout_id).then(function (response) {


                    var position = vm.MyScouts.indexOf(scout);
                    vm.MyScouts.splice(position, 1);
                });
            },
            ImageExiste(scout){

                if(scout.scout.image===""){

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