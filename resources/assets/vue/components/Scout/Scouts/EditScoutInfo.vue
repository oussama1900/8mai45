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
                            <div class="col-md-6" style="padding-right: 0px;padding-left: 25px;">
                                <label style="font-size: medium;float: right;">تاريخ الازدياد</label>

                                <datetime class="label_title" type="date" v-model="Scout.ScoutInfo.date_of_birth" format="yyyy-MM-dd" :placeholder="placeholder_birth" :dir="direction"></datetime>

                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">مكان الميلاد</label>
                                <input id="place_of_birth"    type="text" placeholder="مكان الميلاد" dir="rtl" v-model="Scout.ScoutInfo.place_of_birth"/>
                            </div>



                        </div>

                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6" style="padding-right: 0px;padding-left: 30px;">
                                <label style="font-size: medium;float: right;">تاريخ الانضمام</label>

                                <datetime class="label_title" type="date" v-model="Scout.ScoutInfo.membership_date" format="yyyy-MM-dd" :placeholder="placeholder_member" :dir="direction"></datetime>

                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">الحالة العائلية</label>
                                <input id="family_status"    type="text" placeholder="الحالة العائلية" dir="rtl" v-model="Scout.ScoutInfo.family_status"/>
                            </div>

                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">رقم التامين </label>
                                <input   id="assurance_num" type="text" placeholder="رقم التامين " dir="rtl" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" v-model="Scout.ScoutInfo.assurance_num"/>
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">رقم الهاتف </label>
                                <input   id="phone" type="text" placeholder="رقم الهاتف " dir="rtl" v-model="Scout.ScoutInfo.phone"/>
                            </div>
                        </div>
                    </li>

                    <li>

                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">البريد الالكتروني </label>
                                <input   id="email" type="text" placeholder="البريد الالكتروني" dir="rtl" v-model="Scout.ScoutInfo.email"/>
                                <span id="email_error" style="float:right"></span>
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float: right;">العنوان الشخصي </label>
                                <input   id="address" type="text" placeholder="العنوان الشخصي " dir="rtl" v-model="Scout.ScoutInfo.address"/>
                            </div>
                        </div>




                    </li>
                    <li>


                        <div class ="row">
                            <div v-bind:class="rolecontainer"  v-if="Scout.showCaprole" >
                                <label style="font-size: medium;float: right;">الدور</label>
                                <select id="role" class="form-control" v-model="Scout.role" dir="rtl" @change="show_unit_responsible()">
                                    <option value="gov" v-if="current_user_role.localeCompare('gov')===0">محافظ الفوج</option>
                                    <option value="vgov">نائب محافظ الفوج</option>
                                    <option value="med">مسؤول الاعلام</option>
                                    <option value="vmed">نائب مسؤول الاعلام</option>
                                    <option value="fin">مسؤول المالية</option>
                                    <option value="vfin">مسؤول العتاد</option>
                                    <option value="surv">مسؤول متابعة البرامج وتنفيذ الخطط</option>
																		<option value="csd">مسؤول خدمة و تنمية المجتمع</option>
                                    <option value="ucap">قائد وحدة</option>
                                    <option value="vucp">نائب قائد وحدة</option>
                                    <option value="capa">مساعد  قائد وحدة </option>
                                    <option value="trne">قائد متربص</option>
                                    <option value="dev" v-if="add">مطور الموقع</option>
                                    <option value="none">لايملك دور</option>
                                </select>
                                <span id="role_exist" style="float:right"></span>

                            </div>
                            <div v-bind:class="unitcontainer"  v-if="Scout.showunit" style="padding:0px">
                                <label style="font-size: medium;float: right;">الوحدة المنتسب اليها</label>
                                <select class="form-control" id="scout_unit" v-model="Scout.scout_unit.unit_id"  dir="rtl" @change ="showrole">
                                    <option value="cubs">شبل</option>
                                    <option value="sct">كشاف</option>
                                    <option value="asct">كشاف متقدم</option>
                                    <option value="tvlr">جوال</option>
                                    <option value="cap">قائد </option>
                                </select>
                            </div>
                        </div>
                        <div class="row" v-if="show_unit_reps">
                            <label style="font-size: medium;float: right;">الوحدة المسؤول عنها</label>
                            <select id="unit_respon" class="form-control" dir="rtl" v-model="Scout.unit_resp">
                                <option value="cubs">الأشبال</option>
                                <option value="sct">الكشاف</option>
                                <option value="asct">الكشاف المتقدم</option>
                                <option value="tvlr">الجوالة</option>
                            </select>
                        </div>

                    </li>
                    <li>
                        <div class="row">

                            <div >

                             <div>
                                 <img :src=Scout.ScoutInfo.image width="200px" height="200px" style="border-radius: 4px" v-if="add"/>
                                 <div v-else>
                                     <img :src=Scout.ScoutInfo.image width="200px" height="200px" style="border-radius: 4px" v-if="is_empty()"/>
                                     <div v-else>
                                         <img :src="show_image()" width="200px" height="200px"  style="border-radius: 4px" v-if="Scout.ScoutInfo.image.includes('Cubs') || Scout.ScoutInfo.image.includes('Scout') || Scout.ScoutInfo.image.includes('AdvancedScout') ||Scout.ScoutInfo.image.includes('Traveler') || Scout.ScoutInfo.image.includes('Captain') "/>
                                         <img :src=Scout.ScoutInfo.image width="200px" height="200px"  style="border-radius: 4px" v-else/>
                                     </div>

                                 </div>

                             </div>


                            <div class="input-group input-group-file"  style="float:right">

                                <span class="input-group-btn" >
                                        <span class="btn btn-success btn-file" style="text-align:center">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="false"   accept="image/*"
                                                   @change="getImage($event)"


                                                   id="titleImage"
                                                   ng-model="titleImage">
                                        </span>
                                    </span>
                            </div>
                                <div>
                                    <label style="font-size: medium;text-align:center">  تغيير الصورة</label>
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
<sweet-modal icon="warning" ref="warn">
    <h3>لم يتم ادخال جميع المعلومات اللازمة</h3>
</sweet-modal>
        <sweet-modal icon="error" ref="email_exist">
    <h3> البريد الإلكتروني موجود مسبقا </h3>
</sweet-modal>
        <sweet-modal icon="error" ref="role_exist">
            <h3>الدور محجوز مسبقا </h3>
        </sweet-modal>
        <loading
                class="loading-font"
                :show="show"
                :label="label">
        </loading>
        <sweet-modal ref="imagesize" icon="error">
            <h3><span>حجم الصورة كبير </span></h3>
            <h3> 4 <span>Mo</span> <span>حجم الصورة يجب ان يكون اقل من </span>    </h3>
        </sweet-modal>
    </div><!-- end container -->
</template>

<script>
    import loading from 'vue-full-loading';
    export default {
        components: {
            loading
        },
       data(){
           return{
               show: false,
               label: '....الرجاء الإنتظار',
             placeholder_birth:"تاريخ الازدياد",
             placeholder_member:"تاريخ الانضمام",
             direction:"rtl",
               Scout:{
                   ScoutInfo:{
                       assurance_num:'0000000',
                       first_name:'',
                       last_name:'',
                       date_of_birth:'',
                       membership_date:'',
                       email:'',
                       phone:'',
                       image:'/images/default.png',
                       place_of_birth:'',
                       family_status:'',
                       address:'',

                   },
                   scout_unit:{

                       unit_id:''
                   },
                   role:'',
                   unit:'',
                   showCaprole:false,
                   showunit:true,
                   unit_resp:'',

               },
               unitcontainer:'col-md-6',
               rolecontainer:'col-md-6',
               cardTitle:'',
               add:false,
               show_unit_reps:false,
               current_user_role:'',
           }

       },
        created: function () {
            var vm = this;


         if(this.$route.path.localeCompare("/dashboard/AddNewScout/cub")===0 ||
             this.$route.path.localeCompare("/dashboard/AddNewScout/scout")===0||
             this.$route.path.localeCompare("/dashboard/AddNewScout/advancedscout")===0||
             this.$route.path.localeCompare("/dashboard/AddNewScout/captain")===0||
             this.$route.path.localeCompare("/dashboard/AddNewScout/traveler")===0){


             this.cardTitle ="اضافة كشاف جديد" ;
             this.add=true;
             this.Scout.showunit= false;




         var url = ""+vm.$route.fullPath;

      if(url.localeCompare("/dashboard/AddNewScout/cub")===0){

         this.Scout.scout_unit.unit_id = 'cubs';
          this.Scout.showCaprole=false;

          }
         if(url.localeCompare("/dashboard/AddNewScout/scout")===0){

        this.Scout.scout_unit.unit_id = 'sct';
             this.Scout.showCaprole=false;

      }
       if(url.localeCompare("/dashboard/AddNewScout/traveler")===0){

        this.Scout.scout_unit.unit_id = 'tvlr';
           this.Scout.showCaprole=false;

        }
        if(url.localeCompare("/dashboard/AddNewScout/captain")===0){

        this.Scout.scout_unit.unit_id = 'cap';
        this.Scout.showCaprole=true;
        this.rolecontainer = "col-md-12";
        this.Scout.showunit= false;

        }
        if(url.localeCompare("/dashboard/AddNewScout/advancedscout")===0 ){

        this.Scout.scout_unit.unit_id = 'asct';
            this.Scout.showCaprole=false;

        }

}else{


             var url = ""+this.$route.path;

             this.cardTitle="تعديل معلومات الكشاف";
             this.add=false;


             if(url.localeCompare("/dashboard/EditScoutInfo/Captain/"+this.$route.params.id)===0){


                 this.Scout.scout_unit.unit_id = 'cap';
                 this.Scout.showCaprole=true;
                 this.Scout.showunit=false;
                 this.rolecontainer="col-md-12"


             }else {


                 this.unitcontainer="col-md-12"
             }

    this.getData();
             axios.get('/api/getcurrentuser').then(function (response) {
                 vm.current_user_role = response.data.user_role;
                 if(vm.current_user_role.localeCompare('ucap')===0)
                     vm.Scout.showunit= false;
             });

}




        },
        methods: {

            getData() {

                var vm = this;


                if (vm.Scout.scout_unit.unit_id.localeCompare('cap') === 0) {

                    axios.get("/api/getScout/captain/" + this.$route.params.id).then(function (response) {


                        vm.Scout.ScoutInfo = response.data.Scouts[0];
                        vm.Scout.role = response.data.Scouts[1];
                        vm.Scout.unit_resp = response.data.Scouts[2];

                        if (vm.Scout.role.localeCompare('ucap') === 0 | vm.Scout.role.localeCompare('vucp') === 0 | vm.Scout.role.localeCompare('capa') === 0 | vm.Scout.role.localeCompare('trne') === 0) {
                            vm.show_unit_reps = true;
                        }

                    });
                } else {

                    axios.get("/api/getScout/" + this.$route.params.id).then(function (response) {


                        vm.Scout.ScoutInfo = response.data.Scouts[0].scout;
                        vm.Scout.scout_unit.unit_id = response.data.Scouts[0].unit_id;

                    });

                }


            },
            UpdateInfo() {
                if (this.Scout.ScoutInfo.first_name.toString().localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.last_name.toString().localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.date_of_birth.toString().localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.place_of_birth.toString().localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.family_status.toString().localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.membership_date.toString().localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.phone.toString().localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.assurance_num.toString().localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.address.toString().localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.email.toString().localeCompare("") === 0
                ) {
                    this.$refs.warn.open();
                } else {
                    this.show = true;
                    if (this.Scout.scout_unit.unit_id.localeCompare('cap') === 0) {
                        if (this.Scout.role.localeCompare('med') === 0) {
                            this.Scout.unit_resp = 'med'
                        } else {
                            if (this.Scout.role.localeCompare('vmed') === 0) {
                                this.Scout.unit_resp = 'med'
                            } else {
                                if (this.Scout.role.localeCompare('fin') === 0) {
                                    this.Scout.unit_resp = 'fin'
                                } else {
                                    if (this.Scout.role.localeCompare('vfin') === 0) {
                                        this.Scout.unit_resp = 'fin'
                                    } else {
                                        if (this.Scout.role.localeCompare('surv') === 0) {
                                            this.Scout.unit_resp = 'surv'
                                        }else{
                                            if (this.Scout.role.localeCompare('trne') !== 0 && this.Scout.role.localeCompare('ucap') !== 0 && this.Scout.role.localeCompare('vucp') !== 0 && this.Scout.role.localeCompare('capa') !== 0)
                                                this.Scout.unit_resp = ''
                                        }
                                    }
                                }
                            }
                        }
                    }

                    var vm = this;


                    axios.put("/api/EditScoutInfo/" + this.$route.params.id, vm.Scout).then(function (response) {

                        vm.show = false;

                        vm.$router.go(-1);


                    });

                }

            },
            addScout() {
                if (this.Scout.ScoutInfo.first_name.localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.last_name.localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.date_of_birth.localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.place_of_birth.localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.family_status.localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.membership_date.localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.phone.localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.assurance_num.localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.address.localeCompare("") === 0 ||
                    this.Scout.ScoutInfo.email.localeCompare("") === 0
                ) {
                    this.$refs.warn.open();
                } else {

                    if(this.show_unit_reps || this.Scout.showCaprole){
                        if(this.Scout.showCaprole){
                            if(this.Scout.showCaprole){
                                if(this.Scout.role.localeCompare('')===0){
                                    this.$refs.warn.open();
                                  return;
                                }
                            }
                            if(this.show_unit_reps ){
                                if(this.Scout.unit_resp.localeCompare('')===0){
                                    this.$refs.warn.open();
                                    return;
                                }
                            }
                        }



                        
                            this.show = true;

                            if (this.Scout.scout_unit.unit_id.localeCompare('cap') === 0) {
                                if (this.Scout.role.localeCompare('med') === 0) {
                                    this.Scout.unit_resp = 'med'
                                } else {
                                    if (this.Scout.role.localeCompare('vmed') === 0) {
                                        this.Scout.unit_resp = 'vmed'
                                    } else {
                                        if (this.Scout.role.localeCompare('fin') === 0) {
                                            this.Scout.unit_resp = 'fin'
                                        } else {
                                            if (this.Scout.role.localeCompare('vfin') === 0) {
                                                this.Scout.unit_resp = 'vfin'
                                            } else {
                                                if (this.Scout.role.localeCompare('surv') === 0) {
                                                    this.Scout.unit_resp = 'surv'
                                                }else{
                                                    if (this.Scout.role.localeCompare('trne') !== 0 && this.Scout.role.localeCompare('ucap') !== 0 && this.Scout.role.localeCompare('vucp') !== 0 && this.Scout.role.localeCompare('capa') !== 0)
                                                    this.Scout.unit_resp = ''
                                                }
                                            }
                                        }
                                    }
                                }
                            }


                            var vm = this;


                            axios.post("/api/AddNewScout", vm.Scout).then(function (response) {
                                if(response.data.msg.localeCompare('added Successfully')===0){
                                    vm.show = false;
                                    vm.$router.go(-1);
                                }else{
                                    if(response.data.msg.localeCompare('email already exists')===0){
                                        vm.show = false;
                                        vm.$refs.email_exist.open();
                                        $('#email_error').html('عنوان البريد الإالكتروني موجود مسبقا').css('color','red');
                                        $('#email').keyup(function (event) {
                                            $('#email_error').html('');
                                        });
                                    }
                                    if(response.data.msg.localeCompare('role already exists')===0){
                                        vm.show = false;
                                        vm.$refs.role_exist.open();
                                        $('#role_exist').html(' هذا الدور محجوز مسبقا ').css('color','red');
                                        $('#role').change(function (event) {
                                            $('#role_exist').html('');
                                        });
                                    }



                                }


                            });

                    }else{
                        this.show = true;

                        if (this.Scout.scout_unit.unit_id.localeCompare('cap') === 0) {
                            if (this.Scout.role.localeCompare('med') === 0) {
                                this.Scout.unit_resp = 'med'
                            } else {
                                if (this.Scout.role.localeCompare('vmed') === 0) {
                                    this.Scout.unit_resp = 'vmed'
                                } else {
                                    if (this.Scout.role.localeCompare('fin') === 0) {
                                        this.Scout.unit_resp = 'fin'
                                    } else {
                                        if (this.Scout.role.localeCompare('vfin') === 0) {
                                            this.Scout.unit_resp = 'vfin'
                                        } else {
                                            if (this.Scout.role.localeCompare('surv') === 0) {
                                                this.Scout.unit_resp = 'surv'
                                            }else{
                                                this.Scout.unit_resp = ''
                                            }
                                        }
                                    }
                                }
                            }
                        }


                        var vm = this;


                        axios.post("/api/AddNewScout", vm.Scout).then(function (response) {
                            if(response.data.msg.localeCompare('added Successfully')===0){
                                vm.show = false;
                                vm.$router.go(-1);
                            }else{
                                if(response.data.msg.localeCompare('email already exists')===0){
                                    vm.show = false;
                                    vm.$refs.email_exist.open();
                                    $('#email_error').html('عنوان البريد الإالكتروني موجود مسبقا').css('color','red');
                                    $('#email').keyup(function (event) {
                                        $('#email_error').html('');
                                    });
                                }
                                if(response.data.msg.localeCompare('role already exists')===0){
                                    vm.show = false;
                                    vm.$refs.role_exist.open();
                                    $('#role_exist').html(' هذا الدور محجوز مسبقا ').css('color','red');
                                    $('#role').change(function (event) {
                                        $('#role_exist').html('');
                                    });
                                }



                            }




                        });
                    }

                }


            },
            getImage(e) {


                if (e.target.files.length === 0) {

                } else {
                    var imagesize =((e.target.files[0].size)/1024)/1024;
                    if(Math.floor(imagesize)<4){
                        var filereader = new FileReader();
                        filereader.readAsDataURL(e.target.files[0]);
                        filereader.onload = (e) => {

                            this.Scout.ScoutInfo.image = e.target.result;


                        };
                    }else{
                        this.$refs.imagesize.open();
                    }



                }


            },
            showrole() {


                if (this.Scout.scout_unit.unit_id.localeCompare('cap') === 0) {

                    this.Scout.showCaprole = true;

                    this.unitcontainer = 'col-md-6';
                    this.rolecontainer = 'col-md-6';
                } else {

                    this.unitcontainer = 'col-md-12';
                    this.Scout.showCaprole = false;
                }

            },

            show_unit_responsible() {

                if (this.Scout.role.localeCompare('ucap') === 0 | this.Scout.role.localeCompare('vucp') === 0 | this.Scout.role.localeCompare('capa') === 0 | this.Scout.role.localeCompare('trne') === 0) {
                    this.show_unit_reps = true;
                } else {

                    this.show_unit_reps = false;
                }
            },
            show_image() {

                if (this.$route.path.includes('/Cub')) {
                    return '/images/Cubs/' + this.Scout.ScoutInfo.image;

                } else {
                    if (this.$route.path.includes('/Scout')) {
                        return '/images/Scout/' + this.Scout.ScoutInfo.image;
                    } else {
                        if (this.$route.path.includes('/AdvancedScout')) {
                            return '/images/AdvancedScout/' + this.Scout.ScoutInfo.image;
                        } else {
                            if (this.$route.path.includes('/Traveler')) {
                                return '/images/Traveler/' + this.Scout.ScoutInfo.image;
                            } else {
                                if (this.$route.path.includes('/Captain')) {
                                    return '/images/Captain/' + this.Scout.ScoutInfo.image;
                                }
                            }
                        }
                    }
                }
            },
            is_empty() {

                if (this.Scout.ScoutInfo.image.localeCompare('') === 0) {
                    this.Scout.ScoutInfo.image = '/images/default.png';
                }


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
    @media (max-width: 440px){

        .container{
            margin-left: 20px !important;
        }

    }

    #first_name,#last_name,#place_of_birth,#phone,#family_status,#email,#assurance_num,#address{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }
    #scout_unit,#role,#unit_respon{
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
    h3,h4,span,label,button,input,select,option{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .label_title{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .loading-font {
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
</style>
