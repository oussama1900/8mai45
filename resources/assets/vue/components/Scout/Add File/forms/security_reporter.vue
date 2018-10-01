<template>
    <div style="margin: 20px">
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">رقــم البريــد الصادر </label>
            <input id="input1" maxlength="200" type="text" required="required"  placeholder="رقــم البريــد الصادر"  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" dir="rtl" v-model="outing_mail"/>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">التاريخ </label>
            <datetime :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="date" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">الى السيد  المحترم</label>
            <select class="form-control"  dir="rtl" id="input3" v-model="urban_security_center_president">
                <option value="رئيس مركز الأمن الحضري الثالث">رئيس مركز الأمن الحضري الثالث</option>
                <option value="رئيس مركز الأمن الحضري التاسع"> رئيس مركز الأمن الحضري التاسع</option>
                <option value="رئيس مركز الأمن الحضري الحادي عشر">رئيس مركز الأمن الحضري الحادي عشر </option>
                <option value="رئيس مركز الأمن الحضري الثاني عشر">رئيس مركز الأمن الحضري الثاني عشر </option>
                <option value="رئيس مركز الأمن الحضري الرابع عشر">رئيس مركز الأمن الحضري الرابع عشر </option>




            </select>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"> الموضوع</label>
            <input id="input4" maxlength="200" type="text" required="required"  placeholder="الموضوع "   dir="rtl" v-model="subject" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">

            <vue-editor   v-model="content" :toolbar="toolbar" ></vue-editor>
        </div>


        <div class=" form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;text-align: center">محـــافظ الفوج </label>
            <div class="row">
                <div class="col-sm-12">
                    <input id="input6" maxlength="200" type="text" required="required"   dir="rtl" v-model="governor" disabled="true"/>
                </div>

            </div>

        </div>


        <button class="btn btn-primary nextBtn pull-left" type="button" style="text-align: center" @click="download()" >تحميل</button>
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
                date:"",
                governor:'',
                subject:'ف/ي التعريف بالفوج وشراكة العمل',
                content:"<p dir=\"RTL\" style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تحية كشفية وبعد: </p><p dir=\"RTL\" style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; في إطار الاتفاقية المبرمة بين المديرية العامة للأمن الوطني والقيادة العامة للكشافة الإسلامية الجزائرية المؤرخة بتاريخ 05/09/2015 وكذا الاتفاقية المبرمة بين المديرية الولائية للأمن والمحافظة الولائية للكشافة الإسلامية الجزائرية لولاية سطيف، يسرني سيدي الكريم أن أبلغكم أن فوجنا على استعداد لتجسيد هذه الشراكة على أرض الواقع وذلك من خلال الحملات الجوارية وتوعية الفتية المنخرطين في الفوج ويأتي هذا العمل في إطار الحد من الآفات الاجتماعية والمخاطر التي تهدد المجتمع.</p><p dir=\"RTL\" style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp; تجدر الإشارة سيدي الكريم أن فوجنا يعتبر من بين الأفواج الرائدة على مستوى الولاية حيث يعتبر من بين أكثر الأفواج عضوية بتعداد يصل لـ 200 منخرط إضافة الى أنه يزاول نشاطاته منذ سنة 1989 م في منطقة (حي طانجة، حي حشمي الشطر الأول والثاني والثالث، حي 500 مسكن) وقد أرفقت لكم رفقة هذه المراسلة نسخة من اعتماد الفوج وكذا قائمة المنخرطين إضافة الى تقرير الثلاثي الأول من الموسم الكشفي الحالي.</p>",
                outing_mail:'',
                urban_security_center_president:'',
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
                    url:  '/api/PreviewSecurity_ReporterPDF',
                    method: 'Post',
                    responseType: 'blob',
                    data:{
                        content:vm.content,
                        date :full_date,
                        gov : vm.governor,
                        outing_mail:vm.outing_mail,
                        urban_security_center_president:vm.urban_security_center_president,
                        subject:vm.subject
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
                    url:  '/api/downloadSecurity_ReporterPDF',
                    method: 'put',
                    responseType: 'blob',
                    data:{
                        content:vm.content,
                        date :full_date,
                        gov : vm.governor,
                        outing_mail:vm.outing_mail,
                        urban_security_center_president:vm.urban_security_center_president,
                        subject:vm.subject
                    }


                }).then(function (response) {

                    let blob = new Blob([response.data], { type:  'application/pdf' } );

                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'مراسلة الأمن.pdf';
                    link.click();
                    vm.show = false;






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
        padding: 5px
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

    }
</style>