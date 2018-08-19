<template>

    <div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">عنوان النشاط</h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> عنوان النشاط</label>
                        <input id="post_title" type="text"  style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl"  placeholder="عنوان النشاط">
                    </div>
                </div>


            </div>

        </div>
        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">تاريخ و مكان النشاط</h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium">تاريخ النشاط </label>
                        <input id="activity_date" type="date"  style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl"  placeholder="تاريخ النشاط  ">
                    </div>
                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium">مكان النشاط </label>
                        <input id="activity_place" type="text"  style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl"  placeholder="مكان النشاط ">
                    </div>

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
                        <vue-editor v-model="content" :editorToolbar="customToolbar"></vue-editor>


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
                        <vue-editor v-model="resume" :editorToolbar="customToolbar"></vue-editor>

                    </div>
                </div>


            </div>




        </div>




        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title"> نوع النشاط </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">

                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium">نوع النشاط </label>
                        <select id="select" class="form-control" dir="rtl" >
                            <option>	نشاط اسبوعي</option>
                            <option>	رياضة اسبوعية</option>
                            <option>	اجتماع مجلس الشرف</option>
                            <option>	نشاط ولائي</option>
                            <option>	نشاط بلدي</option>
                            <option>	نشاط وطني</option>
                            <option>	نشاط دولي</option>
                        </select>
                    </div>

                </div>


            </div>

        </div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title"> صورة النشاط </h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">

                    <div class="col-md-12" >

                        <div class="input-group input-group-file" style="margin-top:15px">
                            <input type="text"  class="form-control" name="image_name" readonly="true" placeholder="اختر صورة" dir="rtl" >
                            <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="false"  accept="image/*" onchange="SpecificSize()" id="titleImage" ng-model="titleImage">
                                        </span>
                                    </span>
                        </div>

                    </div>

                </div>


            </div>


            <div class="text-center" style="padding: 10px;">
                <button type="submit" ng-disabled="postForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">

                    <span class="ladda-spinner"> نشر</span>
                    <i class="fa fa-save"></i>



                </button>
            </div>
        </div>

    </div>






  <!--  <div class="container  col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px">

        <div class="page-header" >
            <h1 class="page-title font_kufi">نشر النشاط</h1></div>
        <div class="card-body" style="padding: 0px;">
            <div class="card-body">
                <ul>

                    <li>
                        <div class="page-content"  >

                            <div class=" container-fluid">

                                <div class="row">

                                    <form  name="postForm"   novalidate  id="demo-form2" data-parsley-validate="" method="post" >

                                        <div class="row row-lg">
                                            <ul>
                                                <li>
                                                    <div class="row ">

                                                        <div class="form-group col-md-12">
                                                            <h5 style="text-align: right">عنوان النشاط </h5>
                                                           <input type="text"  dir="rtl" class="form-control" id="post_title" required name="post_title" placeholder="عنوان النشاط" >
                                                            </div>
                                                        <div class="row">

                                                            <div class="form-group col-md-6">
                                                                <h5 style="text-align: right">مكان النشاط </h5>
                                                                <input type="text" dir="rtl" class="form-control" id="activity_place" name="activity_place" placeholder="مكان النشاط " >
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <h5 style="text-align: right">	تاريخ النشاط </h5>
                                                                <input type="date" dir="rtl" class="form-control" id="post_date" name="post_date" placeholder="تاريخ النشاط " >
                                                            </div>
                                                        </div>





                                                    </div>
                                                </li>

                                                <li>
                                                    <div>
                                                        <h5 style="text-align: right"> الخبر  </h5>
                                                        <vue-editor v-model="content"></vue-editor>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <h5 style="text-align: right">	ملخص  الخبر</h5>
                                                        <vue-editor v-model="resume"></vue-editor>

                                                    </div>
                                                </li>
                                                <li style="margin-top: 25px">
                                                    <div>
                                                        <h5 style="text-align: right"> نوع النشاط</h5>
                                                    <select id="select" class="form-control" dir="rtl" >
                                                        <option>	نشاط اسبوعي</option>
                                                        <option>	رياضة اسبوعية</option>
                                                        <option>	اجتماع مجلس الشرف</option>
                                                        <option>	نشاط ولائي</option>
                                                        <option>	نشاط بلدي</option>
                                                        <option>	نشاط وطني</option>
                                                        <option>	نشاط دولي</option>
                                                    </select>
                                                    </div>
                                                </li>
                                                <li style="margin-top:15px">
                                                    <h5 style="text-align: right"> تحميل صورة للنشاط</h5>
                                                    <div class="input-group input-group-file" style="margin-top:15px">
                                                        <input type="text"  class="form-control" name="image_name" readonly="true" placeholder="اختر صورة" dir="rtl" >
                                                        <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="false"  accept="image/*" onchange="SpecificSize()" id="titleImage" ng-model="titleImage">
                                        </span>
                                    </span>
                                                    </div>
                                                </li>
                                                <li style="margin-top: 30px">
                                                    <button type="submit" ng-disabled="postForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">

                                                        <span class="ladda-spinner"></span>
                                                        نشر
                                                        <div class="ladda-progress" style="width: 0px;"></div>
                                                        <i class="fa fa-save"></i>

                                                    </button>
                                                </li>
                                            </ul>




                                        </div>
                                    </form>

                                </div>

                            </div>



                        </div>
                    </li>

                </ul>


            </div>
        </div>

    </div>-->
</template>

<script>


    import VueCkeditor from 'vue-ckeditor2';




    import { VueEditor } from 'vue2-editor'

    // Advanced Use - Hook into Quill's API for Custom Functionality





    export default{
        components: {
            VueEditor
        },
        data(){
            return {
                content:'<h5 style="text-align: right" dir="rtl"> الخبر</h5>',
                resume: '<h5 style="text-align: right" dir="rtl">ملخص الخبر</h5>',
                post:{
                    post_title:'',
                    post_date:'',
                    activity_place:'',
                    news_description:'',
                    news_Summary:'',
                    activity_type:'',
                    image:''



                },

                customToolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],

                ],

            }
        },
        created:function(){

        },
        methods:{
            onBlur(editor) {
                console.log(editor);
            },
            onFocus(editor) {
                console.log(editor);
            }

        },


    }




</script>


















<style>

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


