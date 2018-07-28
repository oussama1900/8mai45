<template>

    <div>
    <div v-for="user in allusers">
        <div  v-if="hide_me(user)" class="row">
            <div class="col-sm-2">
                <img class="img-circle" src="images/governor.jpg" width="40" height="40" />
            </div>
            <div class="col-sm-8">
                <p style="color: white"> {{user.profile.last_name}} {{ user.profile.first_name}} </p>
            </div>

            <i :id="user.scout_id" class="fa fa-circle" style="font-size:13px;padding:0"></i>
            <div  v-if="userstate(user.scout_id)" class="col-sm-2">
                <div>



                </div>


            </div>
        </div>
    </div>
    </div>
</template>


<script>
    export default {
       props:['allusers','usersinroom'],
        methods:{
            hide_me(user){
                var nickname,mynickname;
                nickname   =user.profile.last_name+" "+user.profile.first_name;
                mynickname=document.getElementById('username').outerText;


                    if (nickname===mynickname)
                        return false;
                    else
                        return true;



            },
           userstate(user_id){



         if(this.check_existence(this.usersinroom,user_id)){



             document.getElementById(user_id.toString()).style.color="green";

                return true;
            }else{
             if( document.getElementById(user_id.toString())==null) {
             }else{



                 document.getElementById(user_id.toString()).style.color="#bbbaba";
             }



                return false;
            }
           },
            check_existence(online_users,user_id){

                for (var i = 0; i <online_users.length ; i++) {

                    if(online_users[i].scout_id===user_id)
                    {

                        return true;
                    }

                }
                return false;
            }
        }

    }

</script>

<style scoped>

</style>