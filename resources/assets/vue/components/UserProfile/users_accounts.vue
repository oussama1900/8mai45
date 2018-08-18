<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" >

        <h2>قائمة حسابات مستخدمي الموقع  </h2>

        <div>
            <router-link class="btn btn-success"   :to="'/NewUser'" >اضف مستخدم جديد</router-link>
        </div>
        <hr>
        <div id="products" class="row list-group">
            <div class="item col-xs-5 col-md-5 card" style="padding:0px;margin-left:40px;margin-right:40px" v-for="users in Users">
                <div class="row" style="padding-botoom:0px;margin-bottom: 0px">
                    <div class="col-md-1" style="padding: 0px;margin-left: 10px;" >
                        <span role="button" class="glyphicon glyphicon-remove btn-lg " style="color:red;" @click="removeaccount(users)" ></span>

                    </div>
                    <div class="col-md-7" style="padding-right: 10px;padding-top:10px;margin-right: 20px"
                    >
                        <ul style="float: right;">
                            <li>
                                <p style="text-align: right">الاسم : {{users.profile.first_name}} </p>

                            </li>
                            <li>
                                <p style="text-align: right">اللقب :  {{users.profile.last_name}}</p>
                            </li>
                            <li >

                                <p style="text-align: right">  <small>{{users.email}}</small> <span> :الايميل </span>  </p>
                            </li>
                            <li >
                                <p style="text-align: right">{{users.created_at}}:أنشـأ بتاريخ</p>
                            </li>
                            <li >
                                <p style="text-align: right">{{users.updated_at}}:تم تعديله بتاريخ</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3" style="padding-top: 10px" v-if="ImageExiste(users)">
                        <img v-bind:src="'/images/Captain/'+users.profile.image"  class="img-rounded" width="80" height="120" style="float: right">
                    </div>
                    <div class="col-md-3" style="padding-top: 10px" v-else>
                        <img src="/images/default.png"  class="img-rounded" width="80" height="120" style="float: right">
                    </div>







                </div>

                <div>
                    <router-link  class="glyphicon glyphicon-edit btn-lg" onclick="" style="float: left;color:green" :to="'/EditAccountInfo/'+users.profile.scout_id"></router-link>
                    <span style="text-align:center;float: right;font-size: small;margin-bottom: 0px;padding-right:10px" v-if="setScoutCode(users)">
                       {{Scout_code}}
    </span>

                </div>








            </div>

            <div v-if="Users.length===1">
                <h1>لا يوجد اي مستخدم عداك</h1>
            </div>

        </div>

    </div>

</template>

<script>
    export default {
       data(){
           return{
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

                return true;

            },
            removeaccount(user) {
               var vm = this;
                axios.delete("/api/deleteaccount/"+user.profile.scout_id).then(function (response) {



                    var position = vm.Users.indexOf(user);

                     vm.Users.splice(position, 1);
                });


            },
            ImageExiste(user){

                if(user.profile.image===""){

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