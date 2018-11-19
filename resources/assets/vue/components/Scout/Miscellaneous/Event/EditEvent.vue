<template>



    <div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">نوع الحدث</h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium" class="label_title"> نوع الحدث</label>
                        <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" class="label_title" v-model="Event.type" :options="EventType" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="ابحث عن نشاط" :max="1" :show-labels="false"   :preselect-first="false">

                            <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;" class="label_title">{{props.option}}  </span><span class="custom__remove label_title" style="cursor: pointer;" @click="props.remove(props.option)" >❌</span></span></template>

                        </multiselect>

                    </div>
                </div>
                <span id="event_type" style="float: right" class="label_title"></span>

            </div>

        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title" >  عنوان الحدث </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium" class="label_title"> عنوان الحدث</label>
                        <input class="label_title" type="text"   dir="rtl" v-model="Event.title" placeholder=" عنوان الحدث ">
                    </div>


                </div>
                <span id="event_title" style="float: right" class="label_title"></span>

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
                            <label  style="float:right;font-size:medium" class="label_title">  القائد المسؤول </label>

                            <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" class="label_title" v-model="Event.responsible" :options="Captains" :multiple="true" :max="1" :close-on-select="true" :clear-on-select="true" :hide-selected="true" :preserve-search="true" placeholder="ابحث عن قائد" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;" class="label_title">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove label_title"  style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                            </multiselect>


                        </div>

                    </div>


                </div>
                <span id="responsible" style="float: right" class="label_title"></span>

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
                            <label  style="float:right;font-size:medium" class="label_title">  القادة المعنيون </label>
                            <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;"  class="label_title" v-model="Concerned" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="ابحث عن قائد" :custom-label="customLabel" :show-labels="true"  track-by="last_name" :preselect-first="false">

                                <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;" class="label_title">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove label_title"  style="cursor: pointer;" @click="props.remove(props.option)" >❌</span></span></template>

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

                        <label  style="float:right;font-size:medium" class="label_title">  مكان الحدث</label>
                        <input class="label_title" v-model="Event.location" id="event_place" type="text"   dir="rtl"  placeholder=" مكان الحدث ">
                        <span id="location" style="float: right" class="label_title"></span>
                    </div>

                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium" class="label_title">  تاريخ الحدث</label>
                        <datetime  class="label_title" :dir="direction" :placeholder="placeholder" :value-zone="value" type="datetime" v-model="Event.event_time" format="yyyy-MM-dd HH:mm"></datetime>
                        <span id="event_time" style="float: right" class="label_title"></span>
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
                        <div  class="text-center" style="padding: 10px;" v-if="show_desc">
                            <div class="btn btn-primary ladda-button"  @click="show_description()">

                                <span class="ladda-spinner label_title" >  اظهر النص السابق</span>




                            </div>

                        </div>
                        <vue-editor   v-model="desc"  class="label_title"></vue-editor>


                    </div>
                    <span id="desc" style="float: right" class="label_title"></span>
                </div>

            </div>




            </div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title" >رفع صورة للحدث </h4>

            </div>

            <div  v-if="image.localeCompare('')!==0">
                <div v-if="image.includes('Event')">

                <img :src="'/images/EventImages/'+image"  style="width:100%;">
                </div>
                <div v-else>

                    <img :src="image"  style="width:100%;">
                </div>

            </div>
            <div class="input-group input-group-file"  style="z-index:0;float:right;margin-top:20px">

                <input   class="form-control label_title" name="image_name"
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

            <div class="text-center" style="padding: 10px;">
                <button type="submit" ng-disabled="postForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="update_event()">

                    <span class="ladda-spinner label_title"   > تحديث</span>
                    <i class="fa fa-save"></i>



                </button>

            </div>


        </div>
        <sweet-modal ref="EditedSuccessfully" icon="success">
            <h3 class="label_title">تم التعديل بنجاح </h3>

        </sweet-modal>

        <sweet-modal ref="image_size" icon="warning">
            <h3>يجب أن تكون دقة الصورة اكثر من   </h3>  <h3> 1280 X 750  </h3>
        </sweet-modal>

        <sweet-modal ref="valide" icon="warning">
            <h3 class="label_title">لم يتم ادخال كل المعلومات اللازمة لنشر الحدث </h3>
            <h3 class="label_title">الرجاء التأكد من ادخالك لجميع المعومات </h3>
        </sweet-modal>
        <loading
                class="label_title"
                :show="show"
                :label="label">
        </loading>
        <sweet-modal ref="imagesize" icon="error">
            <h3><span>حجم الصورة كبير </span></h3>
            <h3> 4 <span>Mo</span> <span>حجم الصورة يجب ان يكون اقل من </span>    </h3>
        </sweet-modal>
        </div>







</template>

<script>

    import Multiselect from 'vue-multiselect';
    import loading from 'vue-full-loading';
    import 'vue-multiselect/dist/vue-multiselect.min.css';
    import 'vue-multiselect/dist/vue-multiselect.min.js';
    import { Datetime } from 'vue-datetime';
        import 'vue-datetime/dist/vue-datetime.css'
    import { VueEditor } from 'vue2-editor'
    import { SweetModal, SweetModalTab  } from 'sweet-modal-vue'
    export default {



        components: {
            Multiselect,
            VueEditor,
            SweetModal,
            loading

        },
        data(){
            return{

                show: false,
                label: '....الرجاء الإنتظار',
              placeholder:"تاريخ الحدث",
              direction:'rtl',
              value:"UTC+2",
                EventType:[
                    "اجتماع مجلس الشرف",
                    "نشاط ولائي",
                    "نشاط بلدي",
                    "نشاط وطني",
                    "نشاط دولي",
                    "نشاط اداري",
                    "نشاط اعلامي",
                    "نشاط اسبوعي",
                    "رياضة",
                    "خدمة عامة",
                    "رحلة خلوية",
                    "ندوة",
                    "دورة تدريبية",
                    "اجتماع مكتب",
                    "اجتماع مجلس",
                    "عملية جمع اللحوم",
                    "عيد ديني",
                    "عيد وطني",
                    "مهرجان الشارات",
                    "حفل قبول",
                    "حفل اجتياز مرحلة",
                ],
                Concerned: [],
                Captains: [],

                Event:{
                  title:'',
                  type:'',

                    responsible:'',
                  event_time:'',
                  location:'',

                    Concerned: [],


                },
                image:'',
                desc:'',

                show_desc:true,
                customToolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],

                ],


            }
        },
        created:function(){
var vm =this;
            this.getdata();



        },
        methods:{
            validate(){
                if(this.Event.type.length===0  ||
                    this.Event.title.localeCompare("")===0 ||
                    this.Event.responsible.length===0 ||

                    this.Event.event_time.localeCompare("")===0 ||
                    this.Event.location.localeCompare("")===0 ||
                    this.image.localeCompare("")===0 ||
                    this.desc.localeCompare("")===0
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

                    if(this.Event.event_time.localeCompare("")===0){
                        $('#event_time').html(' حدد تاريخ الحدث').css('color', 'red');

                    }else{
                        $('#event_time').html('');
                    }
                    if(this.Event.location.localeCompare("")===0){
                        $('#location').html('حدد مكان الحدث').css('color', 'red');

                    }else{
                        $('#location').html('');
                    }

                    if(this.image.localeCompare("")===0){
                        $('#image').html('صورة الحدث اجبارية').css('color', 'red');

                    } else{
                        $('#image').html('');
                    }
                    if(this.desc.localeCompare("")===0){
                        $('#desc').html('مضمون الحدث لا يمكن ان يكون فارغا').css('color', 'red');

                    }else{
                        $('#desc').html('');
                    }
                    return false;
                }







                return true;


            },
            deleteitem(props){

              this.Event.Concerned.splice(this.Event.Concerned.indexOf(props),1);

            },
            customLabel ({ first_name, last_name }) {
                return ` ${last_name} ${first_name} `
            },
            setEventImage(e){
                if(e.target.files.length===0){

                }else{
                    var vm = this;
                    var imagesize =((e.target.files[0].size)/1024)/1024;
                    if(Math.floor(imagesize)<4){
                        var filereader = new FileReader();
                        filereader.readAsDataURL(e.target.files[0]);
                        var img = new Image();
                        filereader.onload =(e)=>{

                            img.src = e.target.result;
                            img.onload = function() {
                                vm.image= e.target.result;
                               /* if(img.width>=1280 && img.height>=720){

                                    vm.image= e.target.result;
                                }else{
                                    vm.$refs.image_size.open();
                                }*/
                            };



                        };
                    }else{
                        vm.$refs.imagesize.open();
                    }



                }

            },
            getCaptains(){
                var vm = this;
                axios.get('/api/getCaptains').then(function (response) {

                    vm.Captains = response.data.captain[0];
                });
            },
            getdata(){
                var vm =this;

                axios.get('/api/getEvent/'+vm.$route.params.id).then(function (response) {

                    vm.Event = response.data.event[0];
                    vm.image = vm.Event.event_image;
                    vm.Event.responsible = response.data.event[2];

                    vm.Event.Concerned = response.data.event[1];
                    vm.Concerned = vm.Event.Concerned;




                      var datetime = vm.Event.event_time.split(" ");
                      var date = datetime[0];
                      var time = datetime[1];
                    vm.Event.event_time   =  date+"T"+time;
                    vm.getCaptains();
                });
            },

            show_description(){
                this.desc = this.Event.description;
                this.show_desc=false;

            },
            update_event(){
                this.Event.description = this.desc;
                if(this.validate()) {
                    this.show=true;
                    this.dateformat();
                    var vm = this;
                    this.Event.Concerned = this.Concerned;

                    axios.post('/api/UpdateEvent',vm.Event).then(function (response) {
                        vm.show = false;
                        vm.$router.go(-1);





                    });
                }

            },

            dateformat(){
              var datetime = this.Event.event_time;
              var dateArray = datetime.split("T");
               var date = dateArray[0];
               var time = dateArray[1].split(".")[0];
               this.Event.event_time = date.concat(" "+time);
            },


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
#select{
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
    font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

}


.label_title{
    font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

}












</style>
