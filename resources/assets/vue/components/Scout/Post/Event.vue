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
                        <select id="select" class="form-control" dir="rtl"  v-model="Event.type" >
                            <option value="اداري">	اداري</option>
                            <option value="اعلامي">	اعلامي</option>
                            <option value="خدمة عامة">	خدمة عامة</option>
                            <option value="رحلة خلوية">	رحلة خلوية</option>
                            <option value="ندوة">	ندوة</option>
                            <option value="تربص">	تربص</option>
                            <option value="مهرجان">مهرجان	</option>
                            <option value="مخيم">	مخيم</option>
                            <option value="دورة تربوية">دورة تربوية	</option>
                            <option value="دورة تدريبية">دورة تدريبية	</option>
                            <option value="اجتماع مكتب">	اجتماع مكتب</option>
                            <option value="اجتماع مجلس">	اجتماع مجلس</option>
                            <option value="مبيت">	مبيت</option>
                            <option value="افطار جماعي">	افطار جماعي </option>
                            <option value="اعتكاف">	اعتكاف</option>
                            <option value="عملية جمع اللحوم">عملية جمع اللحوم	</option>
                            <option value="عيد ديني ">	عيد ديني </option>
                            <option value="عيد وطني">عيد وطني </option>
                            <option value="رياضة">رياضة</option>

                        </select>
                    </div>
                </div>


            </div>

        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">  عنوان الحدث </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> عنوان الحدث</label>
                        <input id="event_title" type="text"  style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl" v-model="Event.title" placeholder=" عنوان الحدث ">
                    </div>


                </div>


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
                            <select style="border: 1px solid #9C9C9C;border-radius: 7px;" class="form-control" v-model="Event.responsible">
                                <option v-for="captain in Captains" :value="captain.scout_id">{{captain.last_name}} {{captain.first_name}} </option>

                            </select>

                        </div>

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
                        <input v-model="Event.location" id="event_place" type="text"  style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl"  placeholder=" مكان الحدث ">
                    </div>

                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium">  تاريخ الحدث</label>
                        <input v-model="Event.time" id="event_date" type="date"  style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl"  placeholder=" تاريخ الحدث ">
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
                </div>

            </div>



            </div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title"> الوحدة المقصودة بالحدث </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> الوحدة المقصودة بالحدث</label>
                        <select id="select_unit" class="form-control" dir="rtl"  v-model="Event.unit" >
                            <option value="cubs">	الأشبال</option>
                            <option value="sct">	الكشاف</option>
                            <option value="asct">	الكشاف المتقدم</option>
                            <option value="tvlr">	الجوالة</option>
                            <option value="cap">	القادة</option>
                            <option value="">وحدة أخرى</option>


                        </select>

                </div>


            </div>

        </div>


        </div>

        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">  اختر صورة الحدث </h4>
            </div>

            <div style="margin: 20px;margin-right: 30px;">
                <div class="row">
                    <div class="col-md-12" style="margin-top:30px">


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
    </div>




</template>

<script>

    import Multiselect from 'vue-multiselect';
    import vueMultiSelect from 'vue-multi-select';
    import 'vue-multiselect/dist/vue-multiselect.min.css';
    import 'vue-multiselect/dist/vue-multiselect.min.js';

    import { VueEditor } from 'vue2-editor'
    export default {



        components: {
            Multiselect,
            VueEditor

        },
        created:function(){
            var vm = this;
          axios.get('/api/getCaptains').then(function (response) {

             vm.Captains = response.data.captain;
          });
        },
        data(){
            return{



                Captains: [],

                Event:{
                  title:'',
                  desc:'<h3 style="text-align: right" dir="rtl"> وصف النشاط</h3>',
                  type:'',
                    responsible:{},
                  time:'',
                  location:'',
                    image:'',
                    Concerned: [],
                    unit:'',


                },
                current_user:'',
                content:'<h5 style="text-align: right" dir="rtl"> وصف النشاط</h5>',
                customToolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],

                ],


            }
        },
        methods:{
            postEvent(){
                var vm = this;
                axios.post('/api/postEvent',vm.Event).then(function (response) {

               vm.$router.push('/Events/MyEvents');

                });
            },
            customLabel ({ first_name, last_name }) {
                return ` ${last_name} ${first_name} `
            },
            setEventImage(e){
                var filereader = new FileReader();
                filereader.readAsDataURL(e.target.files[0]);
                filereader.onload =(e)=>{
                    this.Event.image= e.target.result;
                };
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
#select,#select_unit{
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














</style>
