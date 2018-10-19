<template>
    <div  class="container col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px">
        <div class="header">

            <h4 class="title">مراسلة</h4>
        </div>
        <div class="card-body">

    <div style="margin: 20px">

        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title">التاريخ </label>
            <datetime class="label_title" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="date" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title">إلـــى  </label>
            <input id="input3" maxlength="200" type="text" required="required"  placeholder="إلـــى " dir="rtl" v-model="to"/>
        </div>


        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title"> الموضوع</label>
            <input id="input5" maxlength="200" type="text" required="required"  placeholder="الموضوع "  dir="rtl" v-model="subject" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"> </label>
            <vue-editor   v-model="content" :toolbar="toolbar" class="label_title" ></vue-editor>
        </div>


        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right" class="label_title">محـــافظ الفوج </label>
            <input id="input6" disabled="true" maxlength="200" type="text" required="required"  placeholder="محـــافظ الفوج  " dir="rtl" v-model="governor" />
        </div>


        <button class="btn btn-primary nextBtn pull-left label_title" style="text-align: center;margin-top: 10px" type="button" @click="PDF_Operation('download')" >تحميل</button>
        <button class="btn btn-primary nextBtn pull-right label_title" style="text-align: center;margin-top: 10px" type="button" @click="PDF_Operation('send')" >طلب المصادقة</button>


        <sweet-modal icon="warning" ref="warn">
            <h3 class="label_title">لم يتم ادخال جميع المعلومات اللازمة</h3>
        </sweet-modal>
        <sweet-modal icon="success" ref="sent">
            <h3 class="label_title">الرجاء انتظار المصادقة على الوثيقة من طرف الجهة المخولة</h3>
        </sweet-modal>
        <loading
                class="label_title"
                :show="show"
                :label="label">
        </loading>
    </div>
        </div>
    </div>
</template>

<script>
    import loading from 'vue-full-loading';
    import { VueEditor } from 'vue2-editor'
    export default {
        components:{
            VueEditor,
            loading
        },
        data(){
            return{
                show: false,
                label: '....الرجاء الإنتظار',
                placeholder:"تاريخ الحدث",
                direction:'rtl',
                value:"UTC+2",
                date:'',
                content:'',
                subject:'',
                governor :'',
                to:'',
                current_user:'',
                saveit:true,
                preview_button:false,
                download_button:false,
                toolbar: [
                    { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                    { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                    { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                    { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                    { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
                    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                    { name: 'about', items: [ 'About' ] }
                ]
            }
        },
        created:function(){
            var vm = this;
            axios.get('/api/getGovernor').then(function (response) {
                vm.governor = response.data.governor;
                axios.get('/api/getcurrentuser').then(function (response) {
                    vm.current_user = response.data.user_role;
                });
            });
        },
        methods:{
            save(){
                if(this.date.localeCompare("")===0 || this.outing_mail.localeCompare("")===0 || this.to.localeCompare("")===0 || this.content.localeCompare("")===0){
                    this.$refs.warn.open();
                }else{
                    this.saveit =false;
                    this.preview_button=true;
                    this.download_button=true;
                }

            },
            preview(){
                if(this.outing_mail<10){
                    if(!this.outing_mail.includes('0'))
                        this.outing_mail = "0"+this.outing_mail;
                }

                var temp_date = this.date.slice(0,10),
                    cut_date = temp_date.split("-"),
                    full_date = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];


                var vm  =this;
                axios({
                    url:  '/api/previewOuting_mailPDF',
                    method: 'Post',
                    responseType: 'blob',
                    data:{
                        content:vm.content,
                        date :full_date,
                        gov : vm.governor,
                        subject:vm.subject,
                        to:vm.to,
                    }


                }).then(function (response) {

                    let blob = new Blob([response.data], { type:  'application/pdf' } );

                    //  let link = document.createElement('a');
                    /* link.href = window.URL.createObjectURL(blob);
                     link.download = 'Report.pdf';
                     link.click();*/

                    const fileURL = URL.createObjectURL(blob);




                    var newWin =   window.open(fileURL);





                });


            },
            PDF_Operation(type){
                this.show = true;



                   if( this.date.localeCompare('')===0){
                    var full_date = "";
                   }else{
                       var temp_date = this.date.slice(0,10),
                           cut_date = temp_date.split("-"),
                           full_date = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                   }

                var vm  =this;
                if(type.localeCompare('download')===0){
                    axios({
                        url:  '/api/downloadOuting_mailPDF',
                        method: 'put',
                        responseType: 'blob',
                        data:{
                            content:vm.content,
                            date :full_date,
                            gov : vm.governor,
                            to:vm.to,
                            subject:vm.subject,
                        }


                    }).then(function (response) {

                        let blob = new Blob([response.data], { type:  'application/pdf' } );

                        let link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'مراسلة.pdf';
                        link.click();

                        vm.show = false;





                    });
                }else{
                    axios({
                        url:  '/api/SendOuting_mail_forAgree',
                        method: 'put',
                        data:{
                            content:vm.content,
                            date :full_date,
                            gov : vm.governor,
                            subject:vm.subject,
                            outing_mail:vm.outing_mail,
                            to:vm.to,
                            type:type,
                        }


                    }).then(function (response) {

                        vm.show = false;
                          vm.$refs.sent.open();





                    });
                }



            }
        }
    }
</script>

<style scoped>
    .card{
        margin-top:7%;
        margin-bottom:7%;
        padding-bottom:2%;
        margin-left: 50px;
        background-color: white;
    }
    input[type=text]{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
    .label_title{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
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
</style>