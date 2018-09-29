<template>
    <div style="margin: 20px">
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">رقــم البريــد الصادر </label>
            <input id="input1" maxlength="200" type="text" required="required"  placeholder="رقــم البريــد الصادر" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" dir="rtl" v-model="outing_mail"/>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">التاريخ </label>
            <datetime :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="date" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
            <span id="event_time" style="float: right"></span>
        </div>

        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">الى الكشاف المحترم</label>
            <input id="input3" maxlength="200" type="text" required="required"  placeholder="الى الكشاف المحترم" dir="rtl" v-model="toscout"/>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"> الموضوع</label>
            <input id="input4" maxlength="200" type="text" required="required"  :disabled="true" placeholder="الموضوع "  value=": ف/ي دعوة لحضور اجتماع الشرفي" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"></label>
            <vue-editor   v-model="content" :toolbar="toolbar" ></vue-editor>
        </div>

        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">محـــافظ الفوج </label>
            <input id="input6" disabled="true" maxlength="200" type="text" required="required"  placeholder="محـــافظ الفوج  " dir="rtl" v-model="governor" />
        </div>
        <button class="btn btn-primary nextBtn pull-right" type="button" @click="save()" v-if="saveit">حفظ</button>
        <button class="btn btn-primary nextBtn pull-right" type="button" @click="preview()" v-if="preview_button">معاينة</button>
        <button class="btn btn-primary nextBtn pull-left" type="button" @click="download()" v-if="download_button">تحميل</button>
    <sweet-modal icon="warning" ref="warn">
        <h3>لم يتم ادخال جميع المعلومات اللازمة</h3>
    </sweet-modal>
    </div>
</template>

<script>
    import { VueEditor } from 'vue2-editor'
    export default {
        components:{
            VueEditor
        },
        name: "Honorary_meeting",
        data(){
            return{
                placeholder:"تاريخ الحدث",
                direction:'rtl',
                value:"UTC+2",
                date:'',
                content:"<p dir=\"RTL\" style=\"text-align:right\">تحية كشفية وبعد:</p><p dir=\"RTL\" style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; يسرني أخي الكشاف أن أدعوكم لحضور الاجتماع الشرفي الذي سيعقد يوم السبت&nbsp; 10 مارس 2018 على الساعة العاشرة صباحا بمقر المحافظة الولائية وذلك من أجل تقييم المرحة السابقة والتباحث في ما هو قادم وعليه فإن حضوركم ضروري ومهم.</p><p dir=\"RTL\" style=\"text-align:right\">ملحوظة: -&nbsp; الحضور بالزي الكشفي ضروري.</p><p dir=\"rtl\" style=\"text-align: right;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- احضار سجل اجتماعات مجلس الشرف.</p>",
                governor :'',
                outing_mail:'',
                toscout:'',
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
            });
        },
        methods:{
            save(){
                if(this.date.localeCompare("")===0 || this.outing_mail.localeCompare("")===0 || this.toscout.localeCompare("")===0 || this.content.localeCompare("")===0){
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
                        url:  '/api/previewHonorary_pdf',
                        method: 'Post',
                        responseType: 'blob',
                        data:{
                            content:vm.content,
                            date :full_date,
                            gov : vm.governor,
                            outing_mail:vm.outing_mail,
                            toscout:vm.toscout,
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
            download(){
                if(this.outing_mail<10){
                    if(!this.outing_mail.includes('0'))
                    this.outing_mail = "0"+this.outing_mail;
                }

                    var temp_date = this.date.slice(0,10),
                        cut_date = temp_date.split("-"),
                        full_date = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                    var vm  =this;
                    axios({
                        url:  '/api/downloadHonoraryPDF',
                        method: 'Post',
                        responseType: 'blob',
                        data:{
                            content:vm.content,
                            date :full_date,
                            gov : vm.governor,
                            outing_mail:vm.outing_mail,
                            toscout:vm.toscout,
                        }


                    }).then(function (response) {

                        let blob = new Blob([response.data], { type:  'application/pdf' } );

                        let link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'اجتماع مجلس شرف.pdf';
                        link.click();







                    });


            }
        }
    }
</script>

<style scoped>

    #input1,#input3,#input5{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }
    #input4,#input6{
        border: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }
</style>