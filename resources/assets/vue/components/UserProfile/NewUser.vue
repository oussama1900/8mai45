<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card " >
        <div class="header">
            <h4 class="title">{{users[0].user.title}}</h4>
        </div>
        <div style="padding:20px">
            <div class="row">
                <div class="col-md-6">
                    <fg-input type="text"
                              label="اللقب"
                              placeholder="اللقب"
                              v-model="users[0].user.last_name">
                    </fg-input>
                </div>
                <div class="col-md-6">
                    <fg-input type="text"
                              label="الاسم"
                              placeholder="الاسم"
                              v-model="users[0].user.first_name"
                    >
                    </fg-input>
                </div>
            </div>
            <div class="row">
                <fg-input type="email"
                          label="ايميل"
                          placeholder="ايميل"
                          v-model="users[0].user.email"
                >
                </fg-input>
            </div>
            <div class="row">
                <fg-input type="password"
                          label="كلمة السر"
                          placeholder="كلمة السر"
                          v-model="users[0].user.password"
                >
                </fg-input>
            </div>
            <div class="row">
                <fg-input type="password"
                          label="اعادة كتابة كلمة السر"
                          placeholder="اعادة كتابة كلمة السر"
                          v-model="users[0].user.confirm_passowrd"
                >
                </fg-input>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-info btn-fill btn-wd" @click="addaccount()">
                    {{users[0].user.button_title}}
                </button>
            </div>
        </div>


    </div>

</template>

<script>
    export default {
       data(){
           return{
               users:[{
                   user: {
                       title:'اضافة مستخدم جديد',
                       user_code: 'SF-XX-XXX',
                       user_full_name: 'مويات براء عبد الاله',
                       first_name:'',
                       last_name:'',
                       email: '',
                       phone:'',
                       date_of_Birth: '06/12/1996',
                       rank: 'قائد الفوج',
                       password:'',
                       confirm_passowrd:'',
                       button_title:'اضف'


                   }
               }],

           }

       },
        created: function () {

        },
        methods:{

            addaccount(scout) {
                if(this.users[0].user.confirm_passowrd===this.users[0].user.password){
                    var vm = this;
                    axios.post("http://localhost:8000/api/addnewaccount/" , vm.users[0].user).then(function (response) {


                        console.log(response);
                        vm.$router.push('/users-accounts')
                        /*  var position = vm.MyScouts.indexOf(scout);

                          vm.MyScouts.splice(position, 1);*/
                    });
                }else{
                    alert("يرجى التاكد من توافق كلمة السر")
                }



            },


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