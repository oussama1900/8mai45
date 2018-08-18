<template>
    <div class="container  col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px;padding-bottom:20px">
     <div class="header">
         <h3 style="color:white" >اضافة كشاف جديد</h3>

     </div>
        <div class="card-body" style="padding: 0px;padding-right: 20px">
            <div class="card-body">

                <ul>
                    <li>
                    <div class="row">
                        <div class="col-md-6">
                            <label style="font-size: medium;float: right;">الاسم</label>
                            <input id="first_name" type="text" placeholder="الاسم" dir="rtl" v-model="Scout.ScoutInfo[0].first_name"/>
                        </div>
                        <div class="col-md-6">
                            <label style="font-size: medium;float: right;">اللقب</label>
                            <input id="last_name"    type="text" placeholder="اللقب" dir="rtl" v-model="Scout.ScoutInfo[0].last_name"/>
                        </div>
                    </div>

                </li>
                    <li>
                        <div class="row">

                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">تاريخ الانضمام</label>
                                <input   id="place_of_birth" type="date" placeholder="تاريخ الانضمام" dir="rtl" v-model="Scout.ScoutInfo[0].membership_date"/>
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">تاريخ الازدياد</label>
                                <input id="date_of_birth" class="input-style"  type="date" placeholder="تاريخ الازدياد" dir="rtl" v-model="Scout.ScoutInfo[0].date_of_birth"/>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">رقم التامين</label>
                                <input  id="membership_date"  type="text" placeholder=" رقم التامين" dir="rtl" v-model="Scout.ScoutInfo[0].assurance_num"/>
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;"> رقم الهاتف</label>
                                <input  id="phone_number"  type="text" placeholder=" رقم الهاتف" dir="rtl" v-model="Scout.ScoutInfo[0].phone"/>

                            </div>
                        </div>

                    </li>
                    <li>
                        <label style="font-size: medium;float: right;"> البريد الالكتروني</label>
                        <input  id="email"  type="email" placeholder=" البريد الالكتروني" dir="rtl" v-model="Scout.ScoutInfo[0].email"/>
                    </li>
                    <li  v-if="addCaptain()">
                        <label style="font-size: medium;float: right;">الدور</label>
                        <select id="role" class="form-control" v-model="Scout.role"  >
                            <option>gov</option>
                            <option>vgov</option>
                            <option>med</option>
                            <option>vmed</option>
                            <option>fin</option>
                            <option>vfin</option>
                            <option>psv</option>
                            <option>vpsv</option>
                            <option>surv</option>
                            <option>surv</option>
                            <option>ucap</option>
                            <option>vucap</option>
                            <option>capa</option>
                            <option>trne</option>
                        </select>


                    </li>

                    <li>
                        <div>
                            <label style="font-size: medium;float: right;">صورة للمستقدم الجديد</label>
                        </div>

                      <div class="input-group input-group-file"  style="float:right">
                            <input type="text"   class="form-control" name="image_name"
                                   readonly="true"
                                   placeholder="اختر صورة"

                                   dir="rtl" >
                            <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="false"   accept="image/*"
                                                   @change="getImage($event)"

                                                   id="titleImage"
                                                   ng-model="titleImage">
                                        </span>
                                    </span>
                        </div>

                    </li>

                    <li style="margin-top: 30px">
                        <div >
                            <button class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="addScout($event)">

                                <span class="ladda-spinner"></span>
                                اضافة
                                <span class="ladda-progress" style="width: 0px;"></span>
                                <i class="fa fa-save"></i>

                            </button>
                        </div>


                    </li>

                </ul>

            </div>
        </div>

    </div><!-- end container -->
</template>

<script>
    export default {
       data(){
           return{

               Scout:{
                   ScoutInfo:[{
                       assurance_num:'',
                       first_name:'',
                       last_name:'',
                       date_of_birth:'',
                       membership_date:'',
                       email:'',
                       phone:'',
                       image:'',

                   }],
                   scout_unit:[{

                       unit_id:''
                   }],
                   role:''
               }


           }

       },
        created(){



           var vm = this;
            var url = ""+vm.$route.fullPath;

            if(url.localeCompare("/AddNewScout/cub")===0){

                this.Scout.scout_unit[0].unit_id = 'cubs';
            }
            if(url.localeCompare("/AddNewScout/scout")===0){

                this.Scout.scout_unit[0].unit_id = 'sct';
            }
            if(url.localeCompare("/AddNewScout/traveler")===0){

                this.Scout.scout_unit[0].unit_id = 'tvlr';
            }
            if(url.localeCompare("/AddNewScout/captain")===0){

                this.Scout.scout_unit[0].unit_id = 'cap';

            }
            if(url.localeCompare("/AddNewScout/advancedscout")===0 ){

                this.Scout.scout_unit[0].unit_id = 'asct';
            }









        },
        methods:{


            addScout(){
               var vm = this;


               axios.post("/api/AddNewScout/",vm.Scout).then(function(response){






                  if(vm.Scout.scout_unit[0].unit_id.localeCompare('cubs')===0){

                       vm.$router.push('/scouts/cubs');
                   }else{
                       if (vm.Scout.scout_unit[0].unit_id.localeCompare('sct')===0) {

                           vm.$router.push('/scouts/scout');
                       }else{
                           if(vm.Scout.scout_unit[0].unit_id.localeCompare('asct')===0){

                               vm.$router.push('/scouts/advanced_scout');
                           }else{
                               if (vm.Scout.scout_unit[0].unit_id.localeCompare('tvlr')===0) {

                                   vm.$router.push('/scouts/traveler');
                               }else{
                                   if(vm.Scout.scout_unit[0].unit_id.localeCompare('cap')===0){

                                       vm.$router.push('/scouts/captain');
                                   }

                               }

                           }
                       }

                   }

                });
            },
            addCaptain(){
                var url = ""+this.$route.fullPath;
                if(url.localeCompare("/AddNewScout/captain")===0){

                    return true;
                }else{

                    return false;
                }

            },
            getImage(e){

                var filereader = new FileReader();
                filereader.readAsDataURL(e.target.files[0]);
                filereader.onload =(e)=>{
                    this.Scout.ScoutInfo[0].image = e.target.result;
                };
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

    #first_name,#last_name,#date_of_birth,#place_of_birth,#membership_date,#email,#phone_number{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }
    #role{
        border: 1px solid #9C9C9C;
        border-radius: 7px;

    }
    .header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
  /** .sccout-card{
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.9);
        -o-transform: scale(1.5);
    }**/
</style>