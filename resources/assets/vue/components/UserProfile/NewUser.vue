<template>
    <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card " style="padding-right: 0px;padding-left:0px">
        <div class="header">
            <h4 class="title">{{users[0].user.title}}</h4>
        </div>
        <div style="padding:20px;margin-right:20px;margin-left:20px">
           <div class="row">
               <label style="float:right;font-size:medium">اختر المستخدم الجديد</label>
               <select class="form-control" v-model="users[0].user.email" dir="rtl"  data-live-search="true" style="border: 1px solid #CCC5B9;
    border-radius: 7px;">
                   <option v-for="cap in Captain"  v-bind:value="cap.is_scout.email">{{cap.is_scout.last_name}} {{cap.is_scout.first_name}}</option>
               </select>

           </div>
            <div class="row">
                <fg-input type="email"
                          label="البريد الالكتروني"
                          placeholder="البريد الالكتروني"
                          :disabled="true"
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
        <sweet-modal icon="warning" ref="password_warning">
            <h3>كلمة السر غير متوافقة</h3>
        </sweet-modal>
        <sweet-modal icon="warning" ref="not_valid">
            <h3>لم يتم ادخال جميع المعلومات اللازمة</h3>
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
        components:{
            loading
        },
       data(){
           return{
               show: false,
               label: '....الرجاء الإنتظار',
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
               Captain:[],

           }

       },
        created: function () {
            this.getAllCaptains();
        },
        methods:{

            addaccount(scout) {
                if( this.users[0].user.email.localeCompare('')===0 ||  this.users[0].user.password.localeCompare('')===0 ||  this.users[0].user.confirm_passowrd.localeCompare('')===0 ){
                    this.$refs.not_valid.open();
                }else{
                    if(this.users[0].user.confirm_passowrd===this.users[0].user.password){
                        var vm = this;
                        this.show=true;
                        axios.post("/api/addnewaccount" , vm.users[0].user).then(function (response) {
                            vm.show=false;


                            vm.$router.push('/dashboard/users-accounts')

                        });
                    }else{
                        this.$refs.password_warning.open();
                    }
                }




            },
            getAllCaptains(){
                var vm = this;
                axios.get('/api/getAllCaptainsNotUser').then(function (response) {
                   vm.Captain = response.data.capwithoutcpt;


                });
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

    .header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
    .header .title{
        color:white;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    label,select,option,h3,button,fg-input{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
</style>
