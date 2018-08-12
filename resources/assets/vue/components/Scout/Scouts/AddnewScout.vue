<template>
    <div class="container  col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 20px;padding-bottom:20px">
     <header>
         <h3 >اضافة كشاف جديد</h3>

     </header>
        <div class="card-body" style="padding: 0px;">
            <div class="card-body">

                <ul>
                    <li>
                    <div class="row">
                        <div class="col-md-6">
                            <input id="first_name" type="text" placeholder="الاسم" dir="rtl" v-model="Scout.ScoutInfo[0].first_name"/>
                        </div>
                        <div class="col-md-6">
                            <input id="last_name"    type="text" placeholder="اللقب" dir="rtl" v-model="Scout.ScoutInfo[0].last_name"/>
                        </div>
                    </div>

                </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">
                                <input id="date_of_birth" class="input-style"  type="date" placeholder="تاريخ الازدياد" dir="rtl" v-model="Scout.ScoutInfo[0].date_of_birth"/>
                            </div>
                            <div class="col-md-6">
                                <input   id="place_of_birth" type="date" placeholder="تاريخ الانضمام" dir="rtl" v-model="Scout.ScoutInfo[0].membership_date"/>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">
                                <input  id="membership_date"  type="text" placeholder=" رقم التامين" dir="rtl" v-model="Scout.ScoutInfo[0].assurance_num"/>
                            </div>
                            <div class="col-md-6">
                                <input  id="phone_number"  type="text" placeholder=" رقم الهاتف" dir="rtl" v-model="Scout.ScoutInfo[0].phone"/>

                            </div>
                        </div>

                    </li>
                    <li>
                        <input  id="email"  type="email" placeholder=" ألايميل" dir="rtl" v-model="Scout.ScoutInfo[0].email"/>
                    </li>
                    <li v-if="addCaptain()">
                        <select id="role" class="form-control" v-model="Scout.role">
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

                    <li style="margin-top: 30px">
                        <div >
                            <button class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="addScout()">

                                <span class="ladda-spinner"></span>
                                اضافة
                                <div class="ladda-progress" style="width: 0px;"></div>
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

                   }],
                   scout_unit:[{

                       unit_id:''
                   }],
                   role:''
               }


           }

       },
        created(){



            var url = ""+this.$router.fullPath;

            if(url.localeCompare("/AddNewScout/cub")!==-1)
                this.Scout.scout_unit[0].unit_id = 'cubs';
            else{
                if(url.localeCompare("/AddNewScout/scout")!==-1)
                this.Scout.scout_unit[0].unit_id = 'sct';
                else{
                    if(url.localeCompare("/AddNewScout/advanced-scout")!==-1)
                        this.Scout.scout_unit[0].unit_id = 'asct';
                    else{
                        if(url.localeCompare("/AddNewScout/traveler")!==-1)
                            this.Scout.scout_unit[0].unit_id = 'tvlr';

                    }
                }

            }








        },
        methods:{


            addScout(){
               var vm = this;


               axios.post("http://localhost:8000/api/AddNewScout/",vm.Scout).then(function(response){




                    switch (vm.Scout.scout_unit[0].unit_id){
                        case 'cubs':
                            vm.$router.push('/scouts/cubs');
                        break;
                        case 'sct':
                            vm.$router.push('/scouts/scout');
                            break;
                        case 'asct':
                           vm.$router.push('/scouts/advanced-scout');
                            break;
                        case 'tvlr':
                           vm.$router.push('/scouts/traveler');
                            break;
                        default:
                        case 5:
                            vm.$router.push('/scouts/captain');


                    }


                });
            },
            addCaptain(){
                var url = ""+this.$router.fullPath;
                if(url.localeCompare("/AddNewScout/captain")!==-1){
                    return true
                }
                return false;
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
  /** .sccout-card{
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.9);
        -o-transform: scale(1.5);
    }**/
</style>