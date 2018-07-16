<template>
    <div class="container  col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px">

        <div class="page-header" >
            <h1 class="page-title font_kufi">نشر النشاط</h1></div>
        <div class="card-body" style="padding: 0px;">
            <div class="card-body">
                <ul>

                    <li>
                        <div class="page-content"  >

                            <div class=" container-fluid">
                                <!------------------------start insert, update, delete message  ---------------->
                                <div class="row">

                                    <form  name="postForm"   novalidate  id="demo-form2" data-parsley-validate="" method="post" >

                                        <div class="row row-lg">
                                            <ul>
                                                <li>
                                                    <div class="row ">
                                                        <div class="col-sm-12">
                                                            <p class="font-size-20 blue-grey-700">تفاصيل النشاط</p>
                                                        </div>

                                                        <div class="form-group col-sm-12">
                                                            <h5 style="text-align: right">عنوان النشاط </h5>
                                                            <input type="text" dir="rtl" class="form-control" id="post_title" name="post_title" placeholder="عنوان النشاط" >
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <h5 style="text-align: right">	تاريخ النشاط </h5>
                                                            <input type="date" dir="rtl" class="form-control" id="post_date" name="post_date" placeholder="تاريخ النشاط " >
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <h5 style="text-align: right">مكان النشاط </h5>
                                                            <input type="text" dir="rtl" class="form-control" id="activity_place" name="activity_place" placeholder="مكان النشاط " >
                                                        </div>

                                                    </div>
                                                </li>

                                                <li>
                                                    <div>
                                                        <h5 style="text-align: right"> الخبر  </h5>
                                    <textarea  dir="rtl" name="content" id="editor" rows="20" style="height: 10rem">
                                </textarea>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <h5 style="text-align: right">	ملخص  الخبر</h5>
                                                        <textarea  dir="rtl" name="content" id="resume" rows="20" style="height: 7rem">
                                </textarea>
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
                                            <!-- Example Basic Form -->



                                        </div>
                                    </form>

                                </div>

                            </div>
                            <!-- /.panel -->

                            <!-- /.col-lg-12 -->
                        </div>
                    </li>

                </ul>


            </div>
        </div>

    </div>
</template>

<style>
    #post_title,#post_date,#activity_place{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
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

</style>


<script>









    export default{


    }




</script>