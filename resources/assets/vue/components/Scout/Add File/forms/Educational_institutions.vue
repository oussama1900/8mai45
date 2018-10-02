<template>
    <div style="margin: 20px">
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title">رقــم البريــد الصادر </label>
            <input id="input1" maxlength="200" type="text" required="required"  placeholder="رقــم البريــد الصادر" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" dir="rtl" v-model="outing_mail" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title">التاريخ </label>
            <datetime class="label_title" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="date" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
        </div>
        <div class="form-group " style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"  class="label_title">(الى السيد(ة) المحترم(ة </label>
            <select class="form-control label_title"  dir="rtl" id="input3" v-model="toperson">
                <option value="مدير(ة) المؤسسة التربويـــة" class="label_title">مدير(ة) المؤسسة التربويـــة</option>
                <option value="مدير(ة) متوسطة محمد الصالح بلعباس" class="label_title"> مدير(ة) متوسطة محمد الصالح بلعباس</option>
                <option value="مدير(ة) متوسطة قـــارة بشير" class="label_title">مدير(ة) متوسطة قـــارة بشير  </option>
                <option value="مدير(ة) متوسطة لغوق عبد الحميد" class="label_title">مدير(ة) متوسطة لغوق عبد الحميد </option>
                <option value="مدير(ة) متوسطة محمد صفي الديــــن" class="label_title">مدير(ة) متوسطة محمد صفي الديــــن </option>
                <option value="مدير(ة) ثانويــة عمار مرناش – حي يحياوي" class="label_title">مدير(ة) ثانويــة عمار مرناش – حي يحياوي </option>




            </select>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title"> الموضوع</label>
            <input id="input4"  maxlength="200" type="text" required="required" class=" input-style" placeholder="الموضوع " dir="rtl" v-model="subject" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"></label>
            <vue-editor   v-model="content" :toolbar="toolbar" class="label_title"></vue-editor>
        </div>


        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right" class="label_title">محـــافظ الفوج </label>
            <input id="input6"  maxlength="200" type="text" required="required" class=" input-style" placeholder="محـــافظ الفوج  " dir="rtl" v-model="governor" disabled="true" />
        </div>

        <button class="btn btn-primary nextBtn pull-left label_title" type="button" @click="download()" >تحميل</button>
        <sweet-modal icon="warning" ref="warn">
            <h3 class="label_title">لم يتم ادخال جميع المعلومات اللازمة</h3>
        </sweet-modal>
        <loading
                class="label_title"
                :show="show"
                :label="label">
        </loading>
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
                subject:'ف/ي التعريف بالفوج وشراكة العمل',
                content:"<p dir=\"RTL\" style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تحية كشفية وبعد: </p><p dir=\"RTL\" style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; في إطار العمل التربوي المشترك بيننا كفوج للكشافة الإسلامية الجزائرية \"الفلاح\" وبينكم كمؤسسة تربوية تعنى بتربية النشأ يسعدني سيدي (تي) الكريم (ة) أن أؤكد لكم استعدادنا التام على التعاون لتحقيق هذه الغاية النبيلة من خلال مشاركتكم في نشاطاتكم الثقافية والتربوية الهادفة وكذا المناسبات الوطنية والدينية التي تقومون بإحيائها على مستوى مؤسستكم خصوصا وأن فوجنا يحتوي على طاقم قيادي شاب مؤهل للتعامل مع مختلف الفئات السنية.</p><p dir=\"RTL\" style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp; تجدر الإشارة سيدي (تي) الكريم (ة) أن فوجنا يعتبر من بين الأفواج الرائدة على مستوى الولاية حيث يعتبر من بين أكثر الأفواج عضوية بتعداد يصل لـ 200 منخرط إضافة الى أنه يزاول نشاطاته منذ سنة 1989 م في منطقة (حي طانجة، حي حشمي الشطر الأول والثاني والثالث، حي 500 مسكن) وقد أرفقت لكم رفقة هذه المراسلة نسخة من اعتماد الفوج.</p><p dir=\"RTL\" style=\"text-align:center\">وفي الأخير تقبلوا مني سيدي (تي) أسمى عبارات الشكر والتقدير ​​​​​​​</p>",
                governor :'',
                outing_mail:'',
                toperson:'',
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
                if(this.date.localeCompare("")===0 || this.outing_mail.localeCompare("")===0 || this.toperson.localeCompare("")===0 || this.content.localeCompare("")===0 || this.subject.localeCompare("")===0){
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
                    url:  '/api/previewEducational_Institutions',
                    method: 'Post',
                    responseType: 'blob',
                    data:{
                        content:vm.content,
                        date :full_date,
                        gov : vm.governor,
                        outing_mail:vm.outing_mail,
                        toperson:vm.toperson,
                        subject : vm.subject
                    }


                }).then(function (response) {

                    let blob = new Blob([response.data], { type:  'application/pdf' } );
                    const fileURL = URL.createObjectURL(blob);
                    window.open(fileURL);

                });


            },
            download(){
                this.show =true;
                if(this.outing_mail<10){
                    if(!this.outing_mail.includes('0'))
                        this.outing_mail = "0"+this.outing_mail;
                }
                var temp_date = this.date.slice(0,10),
                    cut_date = temp_date.split("-"),
                    full_date = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                var vm  =this;
                axios({
                    url:  '/api/downloadEducational_Institutions',
                    method: 'put',
                    responseType: 'blob',
                    data:{
                        content:vm.content,
                        date :full_date,
                        gov : vm.governor,
                        outing_mail:vm.outing_mail,
                        toperson:vm.toperson,
                        subject : vm.subject
                    }


                }).then(function (response) {

                    let blob = new Blob([response.data], { type:  'application/pdf' } );

                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'مراسلة '+vm.toperson+'.pdf';
                    link.click();
                    vm.show =false;
                });


            }
        }
    }
</script>

<style scoped>

    #input1,#input2,#input4,#input6,#input7{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
    #champ5{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;


    }
    #input3{
        border: 1px solid #9C9C9C;
        border-radius: 7px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .label_title{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }

</style>