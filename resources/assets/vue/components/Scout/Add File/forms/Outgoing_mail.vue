<template>
    <div style="margin: 20px">
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">رقــم البريــد الصادر </label>
            <input id="input1" maxlength="200" type="text" required="required"  placeholder="رقــم البريــد الصادر" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" dir="rtl" v-model="outing_mail"/>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">التاريخ </label>
            <datetime :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="date" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">إلـــى  </label>
            <input id="input3" maxlength="200" type="text" required="required"  placeholder="إلـــى " dir="rtl" v-model="to"/>
        </div>


        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"> الموضوع</label>
            <input id="input5" maxlength="200" type="text" required="required"  placeholder="الموضوع "  dir="rtl" v-model="subject" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">تحية كشفية و بعد: </label>
            <vue-editor   v-model="content" :toolbar="toolbar" ></vue-editor>
        </div>


        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">محـــافظ الفوج </label>
            <input id="input6" disabled="true" maxlength="200" type="text" required="required"  placeholder="محـــافظ الفوج  " dir="rtl" v-model="governor" />
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
                outing_mail:'',
                to:'',
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
                        outing_mail:vm.outing_mail,
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
                    url:  '/api/downloadOuting_mailPDF',
                    method: 'put',
                    responseType: 'blob',
                    data:{
                        content:vm.content,
                        date :full_date,
                        gov : vm.governor,
                        subject:vm.subject,
                        outing_mail:vm.outing_mail,
                        to:vm.to,
                    }


                }).then(function (response) {

                    let blob = new Blob([response.data], { type:  'application/pdf' } );

                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'مراسلة البريد الصادر.pdf';
                    link.click();
                    vm.show = false;






                });


            }
        }
    }
</script>

<style scoped>

    input[type=text]{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }


</style>