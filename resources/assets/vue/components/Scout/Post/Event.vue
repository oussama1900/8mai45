<template>


    <div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">نوع الحدث</h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> نوع الحدث</label>

                        <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="Event.type" :options="EventType" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="ابحث عن نشاط" :max="1" :show-labels="false"   :preselect-first="false">

                            <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                        </multiselect>

                    </div>

                </div>

                <span id="event_type" style="float: right"></span>
            </div>

        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">  عنوان الحدث </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row" style="margin-bottom: 0px;">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> عنوان الحدث</label>
                        <input type="text"  dir="rtl" v-model="Event.title" placeholder=" عنوان الحدث ">
                    </div>


                </div>
                <span id="event_title" style="float: right"></span>

            </div>

        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">  القائد المسؤول </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <div>
                            <label  style="float:right;font-size:medium">  القائد المسؤول </label>

                            <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="Event.responsible" :options="Captains" :multiple="true" :max="1" :close-on-select="true" :clear-on-select="true" :hide-selected="true" :preserve-search="true" placeholder="ابحث عن قائد" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                            </multiselect>



                        </div>
                        <span id="responsible" style="float: right"></span>
                    </div>


                </div>


            </div>

        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">  القادة المعنيون </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <div>
                            <label  style="float:right;font-size:medium">  القادة المعنيون </label>
                            <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="Event.Concerned" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="ابحث عن قائد" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                            </multiselect>

                        </div>

                    </div>


                </div>


            </div>

        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">  مكان الحدث </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium">  مكان الحدث</label>
                        <input v-model="Event.location" id="event_place" type="text"  dir="rtl"  placeholder=" مكان الحدث ">
                        <span id="location" style="float: right"></span>
                    </div>

                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium">  تاريخ الحدث</label>
                    <datetime :dir="direction" :placeholder="placeholder" :value-zone="value" type="datetime" v-model="time" format="yyyy-MM-dd HH:mm"></datetime>
                        <span id="event_time" style="float: right"></span>
                    </div>
                </div>


            </div>

        </div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title" >وصف الحدث</h4>

            </div>
            <div style="margin: 20px;margin-right: 30px;padding-top:40px;padding-bottom: 30px ">
                <div class="row">
                    <div class="col-md-12" >
                        <vue-editor v-model="Event.desc" :editorToolbar="customToolbar"></vue-editor>


                    </div>
                    <span id="desc" style="float: right"></span>
                </div>

            </div>



            </div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" v-if="is_gov()">

            <div class="header">

                <h4 class="title"> الوحدة المقصودة بالحدث </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> الوحدة المقصودة بالحدث</label>

                        <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="Event.unit" :options="unit_for_gov" :multiple="true" :close-on-select="false" :clear-on-select="false"  :hide-selected="true" :preserve-search="true" placeholder="ابحث عن وحدة" :max="1"  :show-labels="false"   :preselect-first="false">

                            <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                        </multiselect>


                </div>


            </div>
                <span id="unit_for_governor" style="float: right"></span>

        </div>


        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" v-if="is_med()">

            <div class="header">

                <h4 class="title"> الوحدة المقصودة بالحدث </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> الوحدة المقصودة بالحدث</label>

                        <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="Event.unit" :options="unit_for_med" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="ابحث عن وحدة" :max="1"  :show-labels="false"   :preselect-first="false">

                            <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                        </multiselect>


                </div>


            </div>
                <span id="unit_for_media" style="float: right"></span>

        </div>


        </div>

        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">  اختر صورة الحدث </h4>
            </div>

            <div style="margin: 20px;margin-right: 30px;">
                <div class="row">
                    <div class="col-md-12" style="margin-top:30px">

                        <div  v-if="Event.image.localeCompare('')!==0">

                            <img :src="Event.image"  style="width:100%;">

                        </div>
                        <div class="input-group input-group-file"  style="float:right">
                            <input   class="form-control" name="image_name"
                                     readonly="true"
                                     placeholder="اختر صورة"

                                     dir="rtl" >
                            <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="false"   accept="image/*"
                                                   @change="setEventImage($event)"

                                                   id="titleImage"
                                                   ng-model="titleImage">
                                        </span>
                                    </span>
                        </div>
                        <span id="image" style="float: right"></span>

                    </div>


                </div>

            </div>

            <div class="text-center" style="padding: 10px;">
                <button type="submit" ng-disabled="postForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="postEvent">

                    <span class="ladda-spinner"> نشر</span>
                    <i class="fa fa-save"></i>



                </button>

            </div>

        </div>
        <sweet-modal ref="valide" icon="warning">
            <h3>لم يتم ادخال كل المعلومات اللازمة لنشر الحدث </h3>
            <h3>الرجاء التأكد من ادخالك لجميع المعومات </h3>
        </sweet-modal>
        <sweet-modal ref="success" icon="success">
            <h3>تم انشاء هذا الحدث بنجاح </h3>

        </sweet-modal>
        <sweet-modal ref="success_trne" icon="success">
            <h3>تم انشاء هذا الحدث بنجاح </h3>
            <h3> ملاحظة : لن يتم نشر هذا الحدث حتى تتم الموافقة عليه  </h3>

        </sweet-modal>
        <sweet-modal ref="image_size" icon="warning">
            <h3>يجب أن تكون دقة الصورة اكثر من   </h3>  <h3> 1280 X 750  </h3>


        </sweet-modal>
        <loading
                :show="show"
                :label="label">
        </loading>
    </div>




</template>

<script>

    import Multiselect from 'vue-multiselect';
    import loading from 'vue-full-loading';
    import 'vue-multiselect/dist/vue-multiselect.min.css';
    import 'vue-multiselect/dist/vue-multiselect.min.js';
    import { Datetime } from 'vue-datetime';
        import 'vue-datetime/dist/vue-datetime.css'
    import { VueEditor } from 'vue2-editor';

    import { SweetModal, SweetModalTab  } from 'sweet-modal-vue'
    export default {



        components: {
            Multiselect,
            VueEditor,
            Datetime,
        SweetModal,
        SweetModalTab,
            loading
        },
        created:function(){
            var vm = this;
          axios.get('/api/getCaptains').then(function (response) {

             vm.Captains = response.data.captain[0];
             vm.current_user = response.data.captain[1]
          });
        },
        data(){
            return{
placeholder:"تاريخ الحدث",
direction:'rtl',
value:"UTC+2",
                time:'',
                show: false,
                label: '....الرجاء الإنتظار',
            unit_for_gov:[
                "الأشبال",
                "الكشاف",
                "الكشاف المتقدم",
                "الجوالة",
                "القادة",
                "وحدة أخرى",
            ],

                unit_for_med:[
                    "الاعلام",
                    "الأشبال",
                    "الكشاف",
                    "الكشاف المتقدم",
                    "الجوالة",
                    "القادة",
                    "المالية",
                    "متابعة البرامج وتنفيذ الخطط",
                    "خدمة و تنمية المجتمع",
                ],
            EventType:[
                   "اداري",
                   "اعلامي",
                   "خدمة عامة",
                   "رحلة خلوية",
                   "ندوة",
                   "تربص",
                   "دورة تربوية",
                   "دورة تدريبية ",
                   "اجتماع مكتب",
                   "اجتماع مجلس",
                   "مبيت",
                   "افطار جماعي",
                   "عملية جمع اللحوم",
                   "عيد ديني ",
                   "عيد وطني ",
                   "رياضة ",
                   "نشاط أسبوعي ",
                ],
                 current_user:'',

                Captains: [],

                Event:{
                  title:'',
                  desc:'<h3 style="text-align: right" dir="rtl"> وصف الحدث</h3>',
                  type:'',
                    responsible:'',
                  time:'',
                  location:'',
                    image:'',
                    Concerned: [],
                    unit:'',


                },

                content:'<h5 style="text-align: right" dir="rtl"> وصف الحدث</h5>',
                customToolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],

                ],


            }
        },
        methods:{

            validate(){
                if(this.is_gov()){
                    if(this.Event.unit.length===0  ||
                        this.Event.type.length===0 ||
                        this.Event.responsible.length===0 ||
                        this.Event.title.localeCompare("")===0 ||
                        this.time.localeCompare("")===0 ||
                        this.Event.location.localeCompare("")===0 ||
                        this.Event.image.localeCompare("")===0 ||
                        this.Event.desc.localeCompare("")===0
                    ){
                        this.$refs.valide.open();
                        if(this.Event.unit.length===0 ){
                            $('#unit_for_governor').html('يجب تحديد الوحدة').css('color', 'red');

                        }else{
                            $('#unit_for_governor').html('');
                        }
                        if(this.Event.type.length===0 ){
                            $('#event_type').html(' اختر نوع الحدث').css('color', 'red');

                        }else{
                            $('#event_type').html('');
                        }

                        if(this.Event.title.localeCompare("")===0){
                            $('#event_title').html(' العنوان لا يمكن ان يكون فارغا').css('color', 'red');

                        }else{
                            $('#event_title').html('');
                        }
                        if(  this.Event.responsible.length===0){
                            $('#responsible').html(' اختر المسؤول').css('color', 'red');

                        }else{
                            $('#responsible').html('');
                        }

                        if(this.time.localeCompare("")===0){
                            $('#event_time').html(' حدد تاريخ الحدث').css('color', 'red');

                        }else{
                            $('#event_time').html('');
                        }
                        if(this.Event.location.localeCompare("")===0){
                            $('#location').html('حدد مكان الحدث').css('color', 'red');

                        }else{
                            $('#location').html('');
                        }

                        if(this.Event.image.localeCompare("")===0){
                            $('#image').html('صورة الحدث اجبارية').css('color', 'red');

                        } else{
                            $('#image').html('');
                        }
                        if(this.Event.desc.localeCompare("")===0){
                            $('#desc').html('مضمون الحدث لا يمكن ان يكون فارغا').css('color', 'red');

                        }else{
                            $('#desc').html('');
                        }
                        return false;
                    }
                }else{
                    if(this.is_med()){
                        if(this.Event.unit.length===0  ||
                            this.Event.title.localeCompare("")===0 ||
                            this.Event.responsible.length===0 ||
                            this.Event.type.length===0  ||
                            this.time.localeCompare("")===0 ||
                            this.Event.location.localeCompare("")===0 ||
                            this.Event.image.localeCompare("")===0 ||
                            this.Event.desc.localeCompare("")===0
                        ){
                            this.$refs.valide.open();
                            if(this.Event.unit.length===0 ){
                                $('#unit_for_media').html('يجب تحديد الوحدة').css('color', 'red');

                            }else{
                                $('#unit_for_media').html('');
                            }
                            if(this.Event.type.length===0 ){
                                $('#event_type').html(' اختر نوع الحدث').css('color', 'red');

                            }else{
                                $('#event_type').html('');
                            }

                            if(this.Event.title.localeCompare("")===0){
                                $('#event_title').html(' العنوان لا يمكن ان يكون فارغا').css('color', 'red');

                            }else{
                                $('#event_title').html('');
                            }
                            if(  this.Event.responsible.length===0){
                                $('#responsible').html(' اختر المسؤول').css('color', 'red');

                            }else{
                                $('#responsible').html('');
                            }

                            if(this.time.localeCompare("")===0){
                                $('#event_time').html(' حدد تاريخ الحدث').css('color', 'red');

                            }else{
                                $('#event_time').html('');
                            }
                            if(this.Event.location.localeCompare("")===0){
                                $('#location').html('حدد مكان الحدث').css('color', 'red');

                            }else{
                                $('#location').html('');
                            }

                            if(this.Event.image.localeCompare("")===0){
                                $('#image').html('صورة الحدث اجبارية').css('color', 'red');

                            } else{
                                $('#image').html('');
                            }
                            if(this.Event.desc.localeCompare("")===0){
                                $('#desc').html('مضمون الحدث لا يمكن ان يكون فارغا').css('color', 'red');

                            }else{
                                $('#desc').html('');
                            }
                            return false;
                        }
                    }else{
                        if(this.Event.type.length===0  ||
                            this.Event.title.localeCompare("")===0 ||
                            this.Event.responsible.length===0 ||

                            this.time.localeCompare("")===0 ||
                            this.Event.location.localeCompare("")===0 ||
                            this.Event.image.localeCompare("")===0 ||
                            this.Event.desc.localeCompare("")===0
                        ){
                            this.$refs.valide.open();
                            if(this.Event.type.length===0 ){
                                $('#event_type').html(' اختر نوع الحدث').css('color', 'red');

                            }else{
                                $('#event_type').html('');
                            }

                            if(this.Event.title.localeCompare("")===0){
                                $('#event_title').html(' العنوان لا يمكن ان يكون فارغا').css('color', 'red');

                            }else{
                                $('#event_title').html('');
                            }
                            if(  this.Event.responsible.length===0){
                                $('#responsible').html(' اختر المسؤول').css('color', 'red');

                            }else{
                                $('#responsible').html('');
                            }

                            if(this.time.localeCompare("")===0){
                                $('#event_time').html(' حدد تاريخ الحدث').css('color', 'red');

                            }else{
                                $('#event_time').html('');
                            }
                            if(this.Event.location.localeCompare("")===0){
                                $('#location').html('حدد مكان الحدث').css('color', 'red');

                            }else{
                                $('#location').html('');
                            }

                            if(this.Event.image.localeCompare("")===0){
                                $('#image').html('صورة الحدث اجبارية').css('color', 'red');

                            } else{
                                $('#image').html('');
                            }
                            if(this.Event.desc.localeCompare("")===0){
                                $('#desc').html('مضمون الحدث لا يمكن ان يكون فارغا').css('color', 'red');

                            }else{
                                $('#desc').html('');
                            }
                            return false;
                        }
                    }
                }








           /* if(this.is_med()){
                if(this.Event.unit.localeCompare("")===0){
                    $('#unit').html('اختر الوحدة المقصودة بالحدث').css('color', 'red');
                    return false;
                }
            }*/
                return true;


            },
          dateformat(){
            var datetime = this.time;
            var dateArray = datetime.split("T");
             var date = dateArray[0];
             var time = dateArray[1].split(".")[0];
             this.Event.time = date.concat(" "+time);
          },
            postEvent(){
                this.show=true;
              if(this.validate()){
                  this.dateformat();

                  var vm = this;
                  axios.post('/api/postEvent',vm.Event).then(function (response) {
                      vm.show=true;
                      vm.$router.push('/dashboard/Events/MyEvents');

                  });
              }


            },
            customLabel ({ first_name, last_name }) {
                return ` ${last_name} ${first_name} `
            },
            setEventImage(e){
                var vm = this;
                var filereader = new FileReader();
                var img = new Image();
                filereader.readAsDataURL(e.target.files[0]);
                filereader.onload =(e)=>{



                 img.src = e.target.result;
                    img.onload = function() {

                         if(img.width>=1500 && img.height>=750){

                             vm.Event.image= e.target.result;
                         }else{
                             vm.$refs.image_size.open();
                         }

                    };

                };
            },
            is_gov(){

              if(this.current_user.localeCompare('gov')===0 ){
                return true;
              }
              return false;
            },
            is_med(){
                if(this.current_user.localeCompare('med')===0 || this.current_user.localeCompare('vmed')===0 ){
                    return true;
                }
                return false;
            }

    },

    }

</script>

<style scoped>
input[type=text],input[type=date]{
    border-top: 1px solid #9C9C9C;
    border-right: 1px solid #9C9C9C;
    border-left: 1px solid #9C9C9C;
    border-radius: 7px;
    padding:5px
}
#select,#select_unit,#select_unit_med{
    border: 1px solid #9C9C9C;
    border-radius: 7px;
}
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
.header{
    background-color: rgb(51, 181, 229);
    backdrop-filter: blur(5px);
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;

}
.header .title{
    color:white;
}



@media (max-width: 440px){

    .container{
        margin-left: 20px !important;
    }

}










</style>
