<template>

    <div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">عنوان الخبر</h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> عنوان الخبر</label>
                        <input id="title" type="text"  dir="rtl"  placeholder="عنوان الخبر" v-model="post.post_title">
                    </div>

                </div>

                <span id="post_title" style="float: right"></span>
            </div>

        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">التاريخ و المكان</h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">

                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium">المكان  </label>
                        <input id="activity_place" type="text" dir="rtl"  placeholder="المكان" v-model="post.location">
                        <span id="location" style="float: right"></span>
                    </div>
                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium">التاريخ</label>
                          <datetime :dir="direction" :placeholder="placeholder" :value-zone="value" type="datetime" v-model="post.post_date" format="yyyy-MM-dd HH:mm"></datetime>
                        <span id="post_time" style="float: right"></span>
                    </div>

                </div>


            </div>

        </div>



        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title" >ملخص الخبر</h4>

            </div>
            <div style="margin: 20px;margin-right: 30px;padding-top:40px;padding-bottom: 30px ">
                <div class="row">
                    <div class="col-md-12" >
                        <vue-editor v-model="post.post_summary" :editorToolbar="customToolbar" lang="20"></vue-editor>

                    </div>

                </div>
                <span id="post_summary" style="float: right"></span>

            </div>




        </div>



        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title" >تحرير الخبر</h4>

            </div>
            <div style="margin: 20px;margin-right: 30px;padding-top:40px;padding-bottom: 30px ">
                <div class="row">
                    <div class="col-md-12" >
                        <vue-editor v-model="post.description" :editorToolbar="customToolbar"></vue-editor>


                    </div>

                </div>

                <span id="post_desc" style="float: right"></span>
            </div>




        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" v-if="is_gov()">

            <div class="header">

                <h4 class="title"> الوحدة المقصودة  </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> الوحدة المقصودة </label>
                        <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="post.linked_unit" :options="unit_for_gov" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="ابحث عن وحدة" :max="1"  :show-labels="false"   :preselect-first="false">

                            <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                        </multiselect>


                    </div>


                </div>
                <span id="concerned_unit" style="float:right"></span>

            </div>


        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" v-if="is_med()">

            <div class="header">

                <h4 class="title"> الوحدة المقصودة  </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> الوحدة المقصودة </label>
                        <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="post.linked_unit" :options="unit_for_med" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="ابحث عن وحدة" :max="1"  :show-labels="false"   :preselect-first="false">

                            <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                        </multiselect>


                    </div>


                </div>
                <span id="concerned_unit_med" style="float:right"></span>

            </div>


        </div>

        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">نوع الخبر </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">

                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium">نوع الخبر </label>


                        <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="post.post_type" :options="  news_type" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="ابحث عن خبر" :max="1"  :show-labels="false"   :preselect-first="false">

                            <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                        </multiselect>

                    </div>

                </div>
                <span id="post_type" style="float: right"></span>

            </div>

        </div>



        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title"> الصورة الرئيسية للخبر</h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">

                    <div class="col-md-12" >

                        <div class="input-group input-group-file" style="margin-top:15px">
                            <input type="text"  class="form-control" name="image_name" readonly="true" style="z-index:0" placeholder="اختر صورة" dir="rtl" >
                            <span class="input-group-btn">
                                        <span class="btn btn-success btn-file" style="z-index:0">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" accept="image/*"
                                                   @change="setPostCover($event)">

                                        </span>
                                    </span>

                        </div>

                        <div id="cover_image_container" v-if="post.cover_image.localeCompare('')!==0">
                            <img :src="post.cover_image"  style="width:100%;">

                        </div>




                    </div>

                </div>
                <span id="cover_image" style="float: right"></span>


            </div>



        </div>

        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title"> صور الخبر </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">

                    <div class="col-md-12" >

                        <div class="input-group input-group-file" style="margin-top:15px">
                            <input type="text"  class="form-control" name="image_name" readonly="true"  placeholder="اختر صورة" dir="rtl" >
                            <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="true"  accept="image/*"  id="titleImage"
                                                   @change="setPostImages($event)"
                                            >

                                        </span>
                                    </span>
                        </div>
                        <div class="row" id="post_images_container" v-if="post.post_images.length!==0">
                            <div v-for="image in post.post_images" class="col-md-4" >
                                <a>
                                    <img  :src="image" style="height: 100px;width:100%;margin-bottom:10px" >
                                    <span id="delete_image" class="fa fa-remove" style=" line-height: 18px;" @click="remove_image(image)"></span>
                                </a>
                            </div>


                        </div>


                    </div>

                </div>


            </div>


            <div class="text-center" style="padding: 10px;">
                <button type="submit" ng-disabled="postForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="postNews()">

                    <span class="ladda-spinner"> نشر</span>
                    <i class="fa fa-save"></i>



                </button>
            </div>
            <sweet-modal ref="valide" icon="warning">
                <h3>لم يتم ادخال كل المعلومات اللازمة لنشر الخبر </h3>
                <h3>الرجاء التأكد من ادخالك لجميع المعومات </h3>
            </sweet-modal>


            <sweet-modal ref="image_size" icon="warning">
                <h3>يجب أن تكون دقة الصورة اكثر من   </h3>  <h3> 1280 X 750  </h3>


            </sweet-modal>
            <loading
                    :show="show"
                    :label="label">
            </loading>
        </div>

    </div>






</template>

<script>


    import Multiselect from 'vue-multiselect';
    import loading from 'vue-full-loading';
    import 'vue-multiselect/dist/vue-multiselect.min.css';
    import 'vue-multiselect/dist/vue-multiselect.min.js';

    import { SweetModal, SweetModalTab  } from 'sweet-modal-vue'


    import { VueEditor } from 'vue2-editor'




    export default{
        components: {
            Multiselect,
            VueEditor,
            SweetModal,
            SweetModalTab,
            loading
        },
        data(){
            return {
                show: false,
                label: '....الرجاء الإنتظار',
              placeholder:"التاريخ",
              direction:'rtl',
              value:"UTC+2",
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

                news_type:[
                    "نشاط اسبوعي ",
                    "رياضةاسبوعية ",
                    "اجتماع مجلس الشرف ",
                    "نشاط ولائي",
                    "نشاط بلدي",
                    "نشاط وطني",
                    "نشاط دولي",
                ],
                post:{
                    post_title:'',
                    post_date:'',
                    location:'',
                    description:'<h5 style="text-align: right" dir="rtl"> الخبر</h5>',
                    post_summary:'<h5 style="text-align: right" dir="rtl">ملخص الخبر</h5>',
                    post_type:'',
                    cover_image:'',
                    post_images:[],
                    linked_unit:''



                },
                current_user:'',
                customToolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],

                ],

            }
        },
        created:function(){
            var vm = this;
           axios.get('/api/current_user').then(function (response) {
               vm.current_user = response.data.current_user;

           })
        },
        methods:{
            validate(){
                if(this.is_gov()){
                    if(this.post.post_type.length===0  ||
                        this.post.post_title.localeCompare("")===0 ||
                        this.post.post_summary.localeCompare("")===0||

                        this.post.post_date.localeCompare("")===0 ||
                        this.post.location.localeCompare("")===0 ||
                        this.post.cover_image.localeCompare("")===0 ||
                        this.post.description.localeCompare("")===0  ||
                        this.post.linked_unit.length===0
                    ){
                        this.$refs.valide.open();
                        if(this.post.linked_unit.length===0 ){
                            $('#concerned_unit').html('يجب تحديد الوحدة').css('color', 'red');

                        }else{
                            $('#concerned_unit').html('');
                        }
                        if(this.post.post_type.length===0 ){
                            $('#post_type').html(' اختر نوع الخبر').css('color', 'red');

                        }else{
                            $('#post_type').html('');
                        }

                        if(this.post.post_title.localeCompare("")===0){
                            $('#post_title').html(' العنوان لا يمكن ان يكون فارغا').css('color', 'red');

                        }else{
                            $('#post_title').html('');
                        }
                        if(  this.post.location.localeCompare("")===0){
                            $('#location').html('حدد المكان ').css('color', 'red');

                        }else{
                            $('#location').html('');
                        }

                        if(this.post.post_date.localeCompare("")===0){
                            $('#post_time').html(' حدد التاريخ ').css('color', 'red');

                        }else{
                            $('#post_time').html('');
                        }
                        if(this.post.post_summary.localeCompare("")===0){
                            $('#post_summary').html('الملخص لا يمكن أن يكون فارغا').css('color', 'red');

                        }else{
                            $('#post_summary').html('');
                        }

                        if(this.post.description.localeCompare("")===0){
                            $('#post_desc').html('محتوى لا يمكن أن يكون فارغا').css('color', 'red');

                        } else{
                            $('#post_desc').html('');
                        }
                        if(this.post.cover_image.localeCompare("")===0){
                            $('#cover_image').html('الصورة الرئيسية اجبارية').css('color', 'red');

                        }else{
                            $('#cover_image').html('');
                        }
                        return false;
                    }
                }else{
                    if(this.is_med()){
                        if(this.post.linked_unit.length===0  ||
                            this.post.post_title.localeCompare("")===0 ||
                            this.post.post_summary.localeCompare("")===0||
                            this.post.post_type.length===0  ||
                            this.post.post_date.localeCompare("")===0 ||
                            this.post.location.localeCompare("")===0 ||
                            this.post.cover_image.localeCompare("")===0 ||
                            this.post.description.localeCompare("")===0
                        ){
                            this.$refs.valide.open();
                            if(this.post.post_type.length===0 ){
                                $('#post_type').html(' اختر نوع الخبر').css('color', 'red');

                            }else{
                                $('#post_type').html('');
                            }
                            if(this.post.linked_unit.length===0 ){
                                $('#concerned_unit_med').html('يجب تحديد الوحدة').css('color', 'red');

                            }else{
                                $('#concerned_unit_med').html('');
                            }

                            if(this.post.post_title.localeCompare("")===0){
                                $('#post_title').html(' العنوان لا يمكن ان يكون فارغا').css('color', 'red');

                            }else{
                                $('#post_title').html('');
                            }
                            if(  this.post.location.localeCompare("")===0){
                                $('#location').html('حدد المكان ').css('color', 'red');

                            }else{
                                $('#location').html('');
                            }

                            if(this.post.post_date.localeCompare("")===0){
                                $('#post_time').html(' حدد التاريخ ').css('color', 'red');

                            }else{
                                $('#post_time').html('');
                            }
                            if(this.post.post_summary.localeCompare("")===0){
                                $('#post_summary').html('الملخص لا يمكن أن يكون فارغا').css('color', 'red');

                            }else{
                                $('#post_summary').html('');
                            }

                            if(this.post.description.localeCompare("")===0){
                                $('#post_desc').html('محتوى لا يمكن أن يكون فارغا').css('color', 'red');

                            } else{
                                $('#post_desc').html('');
                            }
                            if(this.post.cover_image.localeCompare("")===0){
                                $('#cover_image').html('الصورة الرئيسية اجبارية').css('color', 'red');

                            }else{
                                $('#cover_image').html('');
                            }
                            return false;
                        }
                    }else{
                        if(
                            this.post.post_title.localeCompare("")===0 ||
                            this.post.post_summary.localeCompare("")===0||
                            this.post.post_type.length===0  ||
                            this.post.post_date.localeCompare("")===0 ||
                            this.post.location.localeCompare("")===0 ||
                            this.post.cover_image.localeCompare("")===0 ||
                            this.post.description.localeCompare("")===0
                        ){
                            this.$refs.valide.open();
                            if(this.post.post_type.length===0 ){
                                $('#post_type').html(' اختر نوع الخبر').css('color', 'red');

                            }else{
                                $('#post_type').html('');
                            }


                            if(this.post.post_title.localeCompare("")===0){
                                $('#post_title').html(' العنوان لا يمكن ان يكون فارغا').css('color', 'red');

                            }else{
                                $('#post_title').html('');
                            }
                            if(  this.post.location.localeCompare("")===0){
                                $('#location').html('حدد المكان ').css('color', 'red');

                            }else{
                                $('#location').html('');
                            }

                            if(this.post.post_date.localeCompare("")===0){
                                $('#post_time').html(' حدد التاريخ ').css('color', 'red');

                            }else{
                                $('#post_time').html('');
                            }
                            if(this.post.post_summary.localeCompare("")===0){
                                $('#post_summary').html('الملخص لا يمكن أن يكون فارغا').css('color', 'red');

                            }else{
                                $('#post_summary').html('');
                            }

                            if(this.post.description.localeCompare("")===0){
                                $('#post_desc').html('محتوى لا يمكن أن يكون فارغا').css('color', 'red');

                            } else{
                                $('#post_desc').html('');
                            }
                            if(this.post.cover_image.localeCompare("")===0){
                                $('#cover_image').html('الصورة الرئيسية اجبارية').css('color', 'red');

                            }else{
                                $('#cover_image').html('');
                            }
                            return false;
                        }
                    }
                }









                return true;


            },
          dateformat(){
            var datetime = this.post.post_date;
            var dateArray = datetime.split("T");
             var date = dateArray[0];
             var time = dateArray[1].split(".")[0];
             this.post.post_date = date.concat(" "+time);
          },
            postNews(){
                if(this.validate()){
                    this.show=true;
                    this.dateformat();
                    var vm = this;
                    axios.post('/api/newpost',vm.post).then(function (response) {
                        vm.show=true;
                        vm.$router.push('/dashboard/posts/myposts');

                    });
                }

            },
            setPostCover(e){
               var vm = this;
                var filereader = new FileReader();
                var img = new Image();
                filereader.readAsDataURL(e.target.files[0]);
                filereader.onload =(e)=>{
                    img.src = e.target.result;
                    img.onload = function() {

                        if(img.width>=1280 && img.height>=720){

                            vm.post.cover_image =  e.target.result;
                        }else{
                            vm.$refs.image_size.open();
                        }

                    };

                };

            },
            setPostImages(e){

                var  image_count=  e.target.files.length;
                var filereader = new Array();

                for(var i = 0 ;i<image_count;i++){
                    filereader.push(new FileReader());

                    filereader[i].readAsDataURL(e.target.files[i]);
                    filereader[i].onload =(e)=>{
                        this.post.post_images.push(e.target.result);
                    };

                }




            },
            remove_image(image){
                var image_postion = this.post.post_images.indexOf(image);
                this.post.post_images.splice(image_postion,1);
            },
            is_gov(){

                if(this.current_user.localeCompare('gov')===0  ){
                    return true;
                }
                return false;
            },
            is_med(){
                if(this.current_user.localeCompare('med')===0  || this.current_user.localeCompare('vmed')===0  ){
                    return true;
                }
                return false;
            }

        },


    }




</script>


















<style>
#activity_place,#title{
    border-top: 1px solid #9C9C9C;
    border-right: 1px solid #9C9C9C;
    border-left: 1px solid #9C9C9C;
    border-radius: 7px;
    padding:5px
}
    #delete_image,#delete_image_model{
        position: absolute;
        top: 10%;
        right: 3%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        color: white;

        font-size: 16px;
        border: none;
        cursor: pointer;
        background: transparent;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        text-align: center;

        vertical-align: middle;


    }
    #delete_image:hover ,#delete_image_model:hover{
        color:black;
        background-color:#C8C8C8;
    }
    #cover_image_container_model{

        margin : -64px -32px ;
        overflow-x:hidden;


    }
    #cover_image_agree{
        position: absolute;
        top: 90%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        color: white;
        background-color: #039BE5;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 50px;
    }

    #select,#select_unit_med,#select_unit_gov{
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
