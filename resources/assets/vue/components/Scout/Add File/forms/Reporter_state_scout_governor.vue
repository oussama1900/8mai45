<template>
    <div style="margin: 20px">
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">رقــم البريــد الصادر</label>
            <input id="input1"  maxlength="200" type="text" required="required" class=" input-style" placeholder="رقــم البريــد الصادر"  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" dir="rtl" v-model="outing_mail"/>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">التاريخ </label>
            <datetime :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="date" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">المحافظ الولائي</label>
            <input id="input3"  maxlength="200" type="text" required="required" class=" input-style" placeholder="المحافظ الولائي " dir="rtl" v-model="state_scout_gov"/>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">الموضوع </label>
            <input id="input4"  maxlength="200" type="text" required="required" class=" input-style" placeholder="الموضوع " dir="rtl" v-model="subject" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"> </label>
            <vue-editor   v-model="content" :toolbar="toolbar" ></vue-editor>
        </div>
        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">محـــافظ الفوج </label>
            <input id="input5"  maxlength="200" type="text" required="required" class=" input-style" placeholder="محـــافظ الفوج  " dir="rtl" v-model="governor" disabled="true" />
        </div>

        <button class="btn btn-primary nextBtn pull-left" style="text-align: center" type="button" @click="download()" >تحميل</button>
        <sweet-modal icon="warning" ref="warn">
            <h3>لم يتم ادخال جميع المعلومات اللازمة</h3>
        </sweet-modal>
        <loading
                :show="show"
                :label="label">
        </loading>
    </div>
</template>

<script>
    import loading from 'vue-full-loading';
    import { VueEditor } from 'vue2-editor'
    export default {
        name: "Reporter_state_scout_governor",
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
                subject:'',
                content:"<p dir=\"RTL\" style=\"text-align:right\">تحية كشفية وبعد:</p><p dir=\"RTL\" style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; يسرني قائدي الكريم أن ارفع إلى سمو مقامكم كتابي هذا المتمثل في تقرير أدبي للثلاثي الأول لما يقوم به الفوج من أنشطة نوعية وتربوية هادفة قصد تقيمكم لنا بعد اعلانكم عن انطلاق مسابقة أحسن فوج على المستوى الولائي، كما أدعوكم قائدي الكريم على لعمل زيارة ميدانية لفوجنا قصد الوقوف على حالته وكذا اطلاعكم على بعض الصعوبات التي تواجه قادة الفوج وتشجيعهم على المضي قدما في سبيل العمل الكشفي.</p><p dir=\"RTL\" style=\"text-align:justify\">&nbsp;</p><p dir=\"RTL\" style=\"text-align:center\">&nbsp;وفي انتظار ردكم الإيجابي تقبلوا مني قائدي أسمى عبارات الاحترام والتقدير  </p>",
                governor :'',
                outing_mail:'',
                state_scout_gov:'',
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
                    url:  '/api/previewReporte_Scout_state_gov',
                    method: 'Post',
                    responseType: 'blob',
                    data:{
                        content:vm.content,
                        date :full_date,
                        gov : vm.governor,
                        outing_mail:vm.outing_mail,
                        state_scout_gov:vm.state_scout_gov,
                        subject : vm.subject
                    }


                }).then(function (response) {

                    let blob = new Blob([response.data], { type:  'application/pdf' } );
                    const fileURL = URL.createObjectURL(blob);
                    window.open(fileURL);

                });


            },
            download(){
                this.show = true;
                if(this.outing_mail<10){
                    if(!this.outing_mail.includes('0'))
                    this.outing_mail = "0"+this.outing_mail;
                }
                var temp_date = this.date.slice(0,10),
                    cut_date = temp_date.split("-"),
                    full_date = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                var vm  =this;
                axios({
                    url:  '/api/downloadReporte_Scout_state_gov',
                    method: 'put',
                    responseType: 'blob',
                    data:{
                        content:vm.content,
                        date :full_date,
                        gov : vm.governor,
                        outing_mail:vm.outing_mail,
                        state_scout_gov:vm.state_scout_gov,
                        subject : vm.subject
                    }


                }).then(function (response) {

                    let blob = new Blob([response.data], { type:  'application/pdf' } );

                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'مراسلة المحافظ الولائي.pdf';
                    link.click();
                    vm.show = false;

                });


            }
        }
    }
</script>

<style scoped>

  #input1,#input2,#input3,#input4,#input5{
      border-top: 1px solid #9C9C9C;
      border-right: 1px solid #9C9C9C;
      border-left: 1px solid #9C9C9C;
      border-radius: 7px;
      padding: 5px
  }
</style>