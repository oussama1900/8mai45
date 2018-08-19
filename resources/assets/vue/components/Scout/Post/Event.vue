<template>
  <!--  <div class="container  col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px">
        <div class="card-body">
           <h3 style="text-align: center">الحدث</h3>
            <div class="form-group">
                <label style="float: right;font-size:medium">نوع النشاط </label>
                <select id="select" class="form-control" dir="rtl" >
                    <option>	اداري</option>
                    <option>	اعلامي</option>
                    <option>	خدمة عامة</option>
                    <option>	رحلة خلوية</option>
                    <option>	ندوة</option>
                    <option>	تربص</option>
                    <option>مهرجان	</option>
                    <option>	مخيم</option>
                    <option>دورة تربوية	</option>
                    <option>دورة تدريبية	</option>
                    <option>	اجتماع مكتب</option>
                    <option>	اجتماع مجلس</option>
                    <option>	مبيت</option>
                    <option>	افطار جماعي </option>
                    <option>	اعتكاف</option>
                    <option>عملية جمع اللحوم	</option>
                    <option>	عيد ديني </option>
                    <option>عيد وطني </option>
                    <option>رياضة</option>

                </select>

            </div>
            <div class="form-group col-sm-12">
                <label style="float: right;font-size:medium">	العنوان </label>
                <input type="text" dir="rtl" class="form-control" id="event_title" name="activity_place" placeholder="العنوان" >
            </div>
            <div class="form-group col-sm-12">
                <label style="float: right;font-size:medium">  المكان</label>
                <input type="text" dir="rtl" class="form-control" id="event_place" name="activity_place" placeholder="المكان " >
            </div>

            <div class="form-group col-sm-12">
                <label style="float: right;font-size:medium">	الزمان</label>
                <input type="date" dir="rtl" class="form-control" id="date"   >
            </div>
            <div class="form-group col-sm-12">
                <label style="float: right;font-size:medium">الوحدة او اللجنة</label>
               <Scout-Function></Scout-Function>
            </div>
            <div>
                <label style="float: right;font-size:medium">	وصف للنشاط</label>
            <textarea  dir="rtl" name="content" id="resume" maxlength="100" style="height: 7rem">
                                </textarea>
        </div>


            <div class="form-group col-sm-12">
                <label style="text-align: center;font-size:medium">المسؤول</label>
                <div class="row">
                    <div class="col-md-6">
                        <label style="float: right;font-size:medium">الاسم</label>
                        <input type="text" maxlength="100" dir="rtl" class="form-control"   placeholder="الاسم " >
                    </div>
                    <div class="col-md-6">
                        <label style="float: right;font-size:medium">اللقب</label>
                        <input type="text" maxlength="100" dir="rtl" class="form-control"   placeholder="اللقب" >
                    </div>
                </div>

            </div>
            <div style="float: left;">
                <button type="submit" ng-disabled="postForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">

                    <span class="ladda-spinner"></span>
                    نشر
                    <div class="ladda-progress" style="width: 0px;"></div>
                    <i class="fa fa-save"></i>

                </button>
            </div>
        </div>
    </div>-->


    <div>


        <div class="container   col-md-11 col-sm-11 col-xs-11 text-center card" style="margin:10px;margin-top: 22px;border-radius: 5px;margin-left: 40px;padding-left: 0px;padding-right: 0px" >

            <div class="header">

                <h4 class="title">نوع الحدث</h4>
            </div>
            <div style="margin: 20px;margin-right: 30px">
                <div class="row">
                    <div class="col-md-12" >

                        <label  style="float:right;font-size:medium"> نوع الحدث</label>
                        <select id="select" class="form-control" dir="rtl" >
                            <option>	اداري</option>
                            <option>	اعلامي</option>
                            <option>	خدمة عامة</option>
                            <option>	رحلة خلوية</option>
                            <option>	ندوة</option>
                            <option>	تربص</option>
                            <option>مهرجان	</option>
                            <option>	مخيم</option>
                            <option>دورة تربوية	</option>
                            <option>دورة تدريبية	</option>
                            <option>	اجتماع مكتب</option>
                            <option>	اجتماع مجلس</option>
                            <option>	مبيت</option>
                            <option>	افطار جماعي </option>
                            <option>	اعتكاف</option>
                            <option>عملية جمع اللحوم	</option>
                            <option>	عيد ديني </option>
                            <option>عيد وطني </option>
                            <option>رياضة</option>

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
                                                                             padding: 5px" dir="rtl"  placeholder=" عنوان الحدث ">
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
                        <input id="event_place" type="text"  style="   border: 1px solid #CCC5B9;
                                                                             border-radius: 7px;
                                                                             padding: 5px" dir="rtl"  placeholder=" مكان الحدث ">
                    </div>

                    <div class="col-md-6" >

                        <label  style="float:right;font-size:medium">  تاريخ الحدث</label>
                        <input id="event_date" type="date"  style="   border: 1px solid #CCC5B9;
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
                        <vue-editor v-model="content" :editorToolbar="customToolbar"></vue-editor>


                    </div>
                </div>

                <div class="text-center" style="padding: 10px;">
                    <button type="submit" ng-disabled="postForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" @click="postEvent()">

                        <span class="ladda-spinner"> نشر</span>
                        <i class="fa fa-save"></i>



                    </button>
                </div>
            </div>




        </div>









    </div>
</template>

<script>
    import { VueEditor } from 'vue2-editor'
    export default {
        components: {
            VueEditor
        },
        data(){
            return{
                Event:{
                  title:'',
                  desc:'',
                  type:'',
                  responible:'',
                  time:'',
                  location:'',

                },
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

                });
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