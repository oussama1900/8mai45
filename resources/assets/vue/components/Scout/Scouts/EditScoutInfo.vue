<template>
    <div class="container  col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px;padding-bottom:20px;margin-right:50px;margin-left:50px">
     <div class="header">
         <h3 style="color:white;" >{{cardTitle}}</h3>

     </div>
        <div class="card-body" style="padding: 0px;padding-right: 20px;padding-left: 20px;">
            <div class="card-body">

                <ul>
                    <li>
                    <div class="row">
                        <div class="col-md-6">
                            <label style="font-size: medium;float: right;">الاسم</label>
                            <input id="first_name" type="text" placeholder="الاسم" dir="rtl" v-model="Scout.ScoutInfo.first_name"/>
                        </div>
                        <div class="col-md-6">
                            <label style="font-size: medium;float: right;">اللقب</label>
                            <input id="last_name"    type="text" placeholder="اللقب" dir="rtl" v-model="Scout.ScoutInfo.last_name"/>
                        </div>
                    </div>

                </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">تاريخ الازدياد</label>
                                <input id="date_of_birth" class="input-style"  type="date" placeholder="تاريخ الازدياد" dir="rtl" v-model="Scout.ScoutInfo.date_of_birth"/>
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">تاريخ الانضمام</label>
                                <input  id="membership_date"  type="date" placeholder="تاريخ الانضمام" dir="rtl" v-model="Scout.ScoutInfo.membership_date"/>
                            </div>

                        </div>

                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">رقم التامين </label>
                                <input   id="assurance_num" type="text" placeholder="رقم التامين " dir="rtl" v-model="Scout.ScoutInfo.assurance_num"/>
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">رقم الهاتف </label>
                                <input   id="phone" type="text" placeholder="رقم الهاتف " dir="rtl" v-model="Scout.ScoutInfo.phone"/>
                            </div>
                        </div>
                    </li>

                    <li>


                                <label style="font-size: medium;float: right;">البريد الالكتروني </label>
                                <input   id="email" type="text" placeholder="البريد الالكتروني" dir="rtl" v-model="Scout.ScoutInfo.email"/>



                    </li>
                    <li>


                        <div class ="row">
                            <div v-bind:class="rolecontainer"  v-if="Scout.showCaprole" >
                                <label style="font-size: medium;float: right;">الدور</label>
                                <select id="role" class="form-control" v-model="Scout.role" >
                                    <option value="gov">gov</option>
                                    <option value="vgov">vgov</option>
                                    <option value="med">med</option>
                                    <option value="vmed">vmed</option>
                                    <option value="fin">fin</option>
                                    <option value="vfin">vfin</option>
                                    <option value="psv">psv</option>
                                    <option value="vpsv">vpsv</option>
                                    <option value="surv">surv</option>
                                    <option value="surv">surv</option>
                                    <option value="ucap">ucap</option>
                                    <option value="vucap">vucap</option>
                                    <option value="capa">capa</option>
                                    <option value="trne">trne</option>
                                </select>


                            </div>
                            <div v-bind:class="unitcontainer"  v-if="Scout.showunit" style="padding:0px">
                                <label style="font-size: medium;float: right;">الوحدة المنتسب اليها</label>
                                <select class="form-control" id="scout_unit" v-model="Scout.scout_unit.unit_id"  @change ="showrole">
                                    <option value="cubs">شبل</option>
                                    <option value="sct">كشاف</option>
                                    <option value="asct">كشاف متقدم</option>
                                    <option value="tvlr">جوال</option>
                                    <option value="cap">قائد </option>
                                </select>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="row">

                            <div >


                            <div>
                                <label style="font-size: medium;float: right;">  تغيير الصورة</label>
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

                        </div>




                        </div>

                    </li>
                    <li style="margin-top: 30px">
                        <div v-if="add">
                            <button class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="addScout()">

                                <span class="ladda-spinner"></span>
                                اضافة
                                <span class="ladda-progress" style="width: 0px;"></span>
                                <i class="fa fa-save"></i>

                            </button>
                        </div>

                        <div v-else>
                            <button class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="UpdateInfo()">

                                <span class="ladda-spinner"></span>
                                حفظ
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
                   ScoutInfo:{
                       assurance_num:'',
                       first_name:'',
                       last_name:'',
                       date_of_birth:'',
                       membership_date:'',
                       email:'',
                       phone:'',
                       image:'',

                   },
                   scout_unit:{

                       unit_id:''
                   },
                   role:'',
                   unit:'',
                   showCaprole:false,
                   showunit:true,
               },
               unitcontainer:'col-md-6',
               rolecontainer:'col-md-6',
               cardTitle:'',
               add:false,
           }

       },
        created: function () {
console.log(this.$route.path.localeCompare("/AddNewScout/scout") );

         if(this.$route.path.localeCompare("/AddNewScout/cub")===0 ||
             this.$route.path.localeCompare("/AddNewScout/scout")===0||
             this.$route.path.localeCompare("/AddNewScout/advancedscout")===0||
             this.$route.path.localeCompare("/AddNewScout/captain")===0||
             this.$route.path.localeCompare("/AddNewScout/traveler")===0){


             this.cardTitle ="اضافة كشاف جديد" ;
             this.add=true;
             this.Scout.showunit= false;



          var vm = this;
         var url = ""+vm.$route.fullPath;

      if(url.localeCompare("/AddNewScout/cub")===0){

         this.Scout.scout_unit.unit_id = 'cubs';
          this.Scout.showCaprole=false;

          }
         if(url.localeCompare("/AddNewScout/scout")===0){

        this.Scout.scout_unit.unit_id = 'sct';
             this.Scout.showCaprole=false;

      }
       if(url.localeCompare("/AddNewScout/traveler")===0){

        this.Scout.scout_unit.unit_id = 'tvlr';
           this.Scout.showCaprole=false;

        }
        if(url.localeCompare("/AddNewScout/captain")===0){

        this.Scout.scout_unit.unit_id = 'cap';
        this.Scout.showCaprole=true;
        this.rolecontainer = "col-md-12";
        this.Scout.showunit= false;

        }
        if(url.localeCompare("/AddNewScout/advancedscout")===0 ){

        this.Scout.scout_unit.unit_id = 'asct';
            this.Scout.showCaprole=false;

        }

}else{


             var url = ""+this.$route.path;

             this.cardTitle="تعديل معلومات الكشاف";
             this.add=false;

             console.log(url.localeCompare("/EditScoutInfo/Captain/"+this.$route.params.id)===0);
             if(url.localeCompare("/EditScoutInfo/Captain/"+this.$route.params.id)===0){

                 console.log('in captain');
                 this.Scout.scout_unit.unit_id = 'cap';
                 this.Scout.showCaprole=true;
                 this.Scout.showunit=false;
                 this.rolecontainer="col-md-12"


             }else {
                 this.unitcontainer="col-md-12"
             }

    this.getData();


}




        },
        methods:{

            getData(){

                var vm = this;


                if(vm.Scout.scout_unit.unit_id.localeCompare('cap')===0){
                    console.log('captain');
                    axios.get("/api/getScout/captain/"+this.$route.params.id).then(function(response){



                        console.log(response);
                           vm.Scout.ScoutInfo = response.data.Scouts[0];
                           vm.Scout.role=response.data.Scouts[1];


                    });
                }else{
                    console.log('unit');
                    axios.get("/api/getScout/"+this.$route.params.id).then(function(response){

                        console.log('unit');
                        console.log(response);
                           vm.Scout.ScoutInfo = response.data.Scouts[0].scout;
                        vm.Scout.scout_unit.unit_id = response.data.Scouts[0].unit_id;

                    });

                }



            },
            UpdateInfo(){

                var vm = this;


                axios.put("/api/EditScoutInfo/"+this.$route.params.id,vm.Scout).then(function(response){




                    if(vm.Scout.scout_unit.unit_id.localeCompare('cubs')===0){

                        vm.$router.push('/scouts/cubs');
                    }else{
                        if (vm.Scout.scout_unit.unit_id.localeCompare('sct')===0) {

                            vm.$router.push('/scouts/scout');
                        }else{
                            if(vm.Scout.scout_unit.unit_id.localeCompare('asct')===0){

                                vm.$router.push('/scouts/advanced_scout');
                            }else{
                                if (vm.Scout.scout_unit.unit_id.localeCompare('tvlr')===0) {

                                    vm.$router.push('/scouts/traveler');
                                }else{
                                    if(vm.Scout.scout_unit.unit_id.localeCompare('cap')===0){

                                        vm.$router.push('/scouts/captain');
                                    }

                                }

                            }
                        }

                    }


                });

            },
            addScout(){
                var vm = this;


                axios.post("/api/AddNewScout/",vm.Scout).then(function(response){







                    if(vm.Scout.scout_unit.unit_id.localeCompare('cubs')===0){

                        vm.$router.push('/scouts/cubs');
                    }else{
                        if (vm.Scout.scout_unit.unit_id.localeCompare('sct')===0) {

                            vm.$router.push('/scouts/scout');
                        }else{
                            if(vm.Scout.scout_unit.unit_id.localeCompare('asct')===0){

                                vm.$router.push('/scouts/advanced_scout');
                            }else{
                                if (vm.Scout.scout_unit.unit_id.localeCompare('tvlr')===0) {

                                    vm.$router.push('/scouts/traveler');
                                }else{
                                    if(vm.Scout.scout_unit.unit_id.localeCompare('cap')===0){

                                        vm.$router.push('/scouts/captain');
                                    }

                                }

                            }
                        }

                    }

                });
            },
            getImage(e){


                if(e.target.files.length===0){

                }else{
                    var filereader = new FileReader();
                    filereader.readAsDataURL(e.target.files[0]);
                    filereader.onload =(e)=>{

                            this.Scout.ScoutInfo.image = e.target.result;




                    };


                }


            },
            showrole(){

                var url = ""+this.$route.fullPath;
                console.log(this.Scout.scout_unit.unit_id.localeCompare('cap'));
                if(this.Scout.scout_unit.unit_id.localeCompare('cap')===0){

                   this.Scout.showCaprole=true;
                    this.unitcontainer='col-md-6';
                    this.rolecontainer='col-md-6';
                }else{

                   this.unitcontainer='col-md-12';
                    this.Scout.showCaprole=false;
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

    #first_name,#last_name,#date_of_birth,#phone,#membership_date,#email,#assurance_num{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }
    #scout_unit,#role{
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