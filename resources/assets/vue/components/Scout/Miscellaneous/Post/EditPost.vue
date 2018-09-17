<template>

    <div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">عنوان الخبر</h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> عنوان النشاط</label>
                        <input id="post_title" type="text"  dir="rtl"  placeholder="عنوان الخبر" v-model="post.post_title">
                    </div>

                </div>
                <span id="title" style="float: right"></span>

            </div>

        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">التاريخ و المكان </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">

                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium">المكان </label>
                        <input id="activity_place" type="text"   dir="rtl"  placeholder=" المكان " v-model="post.location">
                        <span id="location" style="float: right"></span>

                    </div>
                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium">التاريخ </label>
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
                        <div  class="text-center" style="padding: 10px;" v-if="show_summ">
                            <div class="btn btn-primary ladda-button"  @click="show_summary()">

                                <span class="ladda-spinner">  اظهر النص السابق</span>




                            </div>

                        </div>
                        <vue-editor v-model="summary" :editorToolbar="customToolbar" lang="20"></vue-editor>

                    </div>
                    <span id="post_summary" style="float: right"></span>
                </div>


            </div>




        </div>



        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title" >تحرير الخبر</h4>

            </div>
            <div style="margin: 20px;margin-right: 30px;padding-top:40px;padding-bottom: 30px ">
                <div class="row">
                    <div class="col-md-12" >
                        <div  class="text-center" style="padding: 10px;" v-if="show_desc">
                            <div class="btn btn-primary ladda-button"  @click="show_description()">

                                <span class="ladda-spinner">  اظهر النص السابق</span>




                            </div>

                        </div>
                        <vue-editor v-model="description" :editorToolbar="customToolbar"></vue-editor>


                    </div>
                    <span id="post_desc" style="float: right"></span>
                </div>


            </div>




        </div>

        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title"> نوع الخبر </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">

                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium">نوع النشاط </label>
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

                <h4 class="title"> الصورة الرئيسية للخبر </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">

                    <div class="col-md-12" >

                        <div id="cover_image_container" v-if="post.cover_image.length!==0">

                            <img :src="'/images/PostCover/'+post.cover_image"  style="width:100%;" v-if="post.cover_image.includes('PostCover')">
                            <img :src="post.cover_image"  style="width:100%;" v-else>


                        </div>
                        <div class="input-group input-group-file" style="margin-top:15px">
                            <input type="text"  class="form-control" name="image_name" readonly="true" placeholder="اختر صورة" dir="rtl" >
                            <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" accept="image/*"
                                                   @change="setPostCover($event)"
                                            >

                                        </span>
                                    </span>
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
                            <input type="text"  class="form-control" name="image_name" readonly="true" placeholder="اختر صورة" dir="rtl" >
                            <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="true"  accept="image/*"  id="titleImage"
                                                   @change="setPostImages($event)"
                                            >

                                        </span>
                                    </span>
                        </div>

                    </div>
                    <div class="row" id="post_images_container" v-if="post_images.length!==0" style="margin:20px">
                        <div v-for="post_image in post_images" class="col-md-4" >
                            <a v-if="post_image.image !==undefined">
                                <img  :src=" '/images/Postimages/'+ post_image.image" style="height: 100px;width:100%;margin-bottom:10px" >
                                <span id="delete_image" class="fa fa-remove" style=" line-height: 18px;" @click="remove_image(post_image)"></span>
                            </a>
                            <a v-else>
                                <img  :src="post_image" style="height: 100px;width:100%;margin-bottom:10px" >
                                <span id="delete_image2" class="fa fa-remove" style=" line-height: 18px;" @click="remove_image(post_image)"></span>
                            </a>
                        </div>


                    </div>

                </div>


            </div>


            <div class="text-center" style="padding: 10px;">
                <button type="submit" ng-disabled="postForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="EditPost()">

                    <span class="ladda-spinner"> نشر</span>
                    <i class="fa fa-save"></i>



                </button>
            </div>
        </div>
        <sweet-modal ref="valide" icon="warning">
            <h3>لم يتم ادخال كل المعلومات اللازمة لنشر الخبر </h3>
            <h3>الرجاء التأكد من ادخالك لجميع المعومات </h3>
        </sweet-modal>


        <sweet-modal ref="image_size" icon="warning">
            <h3>يجب أن تكون دقة الصورة اكثر من   </h3>  <h3> 1280 X 750  </h3>


        </sweet-modal>
    </div>






</template>

<script>





    import Multiselect from 'vue-multiselect';

    import 'vue-multiselect/dist/vue-multiselect.min.css';
    import 'vue-multiselect/dist/vue-multiselect.min.js';

    import { VueEditor } from 'vue2-editor'




    export default{
        components: {
            Multiselect,
            VueEditor
        },
        data(){
            return {
              placeholder:"التاريخ",
              direction:'rtl',
              value:"UTC+2",
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
                    description:'',
                    post_summary:'',
                    post_type:'',
                    cover_image:'',
                    date:''






                },
                post_images_deleted:[],
                post_images:[],
                new_post_images:[],
                description:'',
                summary:'',
                show_desc:true,
                show_summ:true,

                customToolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],

                ],

            }
        },
        created:function(){
          this.getData();
        },
        methods:{
            validate(){
                if(
                    this.post.post_title.localeCompare("")===0 ||
                    this.summary.localeCompare("")===0||
                    this.post.post_type.length===0  ||
                    this.post.post_date.localeCompare("")===0 ||
                    this.post.location.localeCompare("")===0 ||
                    this.post.cover_image.localeCompare("")===0 ||
                    this.description.localeCompare("")===0
                ){
                    this.$refs.valide.open();
                    if(this.post.post_type.length===0 ){
                        $('#post_type').html(' اختر نوع الخبر').css('color', 'red');

                    }else{
                        $('#post_type').html('');
                    }


                    if(this.post.post_title.localeCompare("")===0){
                        $('#title').html(' العنوان لا يمكن ان يكون فارغا').css('color', 'red');

                    }else{
                        $('#title').html('');
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
                    if(this.summary.localeCompare("")===0){
                        $('#post_summary').html('الملخص لا يمكن أن يكون فارغا').css('color', 'red');

                    }else{
                        $('#post_summary').html('');
                    }

                    if(this.description.localeCompare("")===0){
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









                return true;


            },
            getData(){
                var vm = this;
                var post_id = this.$route.params.id;
                axios.get('/api/getPost/'+post_id).then(function (response) {
                    vm.post = response.data.post[0];
                    vm.post_images =response.data.post[1];


                     var datetime = vm.post.post_date.split(" ");
                     var date = datetime[0];
                     var time = datetime[1];
                   vm.post.post_date   =  date+"T"+time;
                });
            },
            dateformat(){
              var datetime = this.post.post_date;
              var dateArray = datetime.split("T");
               var date = dateArray[0];
               var time = dateArray[1].split(".")[0];
               this.post.date = date.concat(" "+time);
            },

            EditPost(){
                if(this.validate()){
                    this.dateformat();
                    this.post.description = this.description;
                    this.post.post_summary = this.summary;
                    var vm = this;
                    var post_id = this.$route.params.id;
                    axios.post('/api/EditPost/'+post_id,{post:vm.post,new_post_images:vm.new_post_images,post_images_deleted:vm.post_images_deleted}).then(function (response) {

                        vm.$router.go(-1);
                    });
                }

            },
            setPostCover(e){
                var filereader = new FileReader();
                filereader.readAsDataURL(e.target.files[0]);
                filereader.onload =(e)=>{
                    this.post.cover_image =  e.target.result;
                };

            },
            setPostImages(e){
                var  image_count=  e.target.files.length;
                var filereader = new Array();

                for(var i = 0 ;i<image_count;i++){
                    filereader.push(new FileReader());

                    filereader[i].readAsDataURL(e.target.files[i]);
                    filereader[i].onload =(e)=>{
                        this.post_images.push(e.target.result);
                        this.new_post_images.push(e.target.result);
                    };
                }




            },
            show_summary(){
                 this.summary = this.post.post_summary ;
                this.show_summ = false;
            },
            show_description(){
              this.description =  this.post.description ;
                this.show_desc = false;
            },
            remove_image(post_image){
                if(post_image.image ===undefined){
                    var image_postion = this.post_images.indexOf(post_image);
                    var new_image_pos = this.post_images.indexOf(post_image);
                    this.post_images.splice(image_postion,1);
                    this.new_post_images.splice(new_image_pos,1);

                }else{

                    this.post_images_deleted.push(post_image);
                    var position = this.post_images.indexOf(post_image);
                    this.post_images.splice(position,1);
                }

            }

        },


    }




</script>


















<style>
#post_title,#activity_place{
    border-top: 1px solid #9C9C9C;
    border-right: 1px solid #9C9C9C;
    border-left: 1px solid #9C9C9C;
    border-radius: 7px;
    padding:5px
}
    #delete_image,#delete_image2{
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
    #delete_image:hover ,#delete_image2:hover{
        color:black;
        background-color:#C8C8C8;
    }
    #cover_image_container_model{

        margin : -64px -32px ;
        overflow-x:hidden;


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
    }
</style>
