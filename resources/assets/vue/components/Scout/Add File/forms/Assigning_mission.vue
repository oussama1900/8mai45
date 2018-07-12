<template>
    <div style="margin:20px">
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">أنا الممضي أسفله السيد </label>
            <input id="input1" maxlength="200" type="text" required="required"  placeholder="أنا الممضي أسفله السيد" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">الوظيفة الكشفية</label>
            <input id="input2" maxlength="200" type="text" required="required"  placeholder="الوظيفة الكشفية" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">  أكلف السيد </label>
            <input id="input3" maxlength="200" type="text" required="required"  placeholder="أكلف السيد" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">الوظيفة الكشفية</label>
            <input id="input4" maxlength="200" type="text" required="required"  placeholder="الوظيفة الكشفية" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">تاريخ الازدياد</label>
            <input  id="input5" class="form-control"  name="date" placeholder="MM/DD/YYY" type="text" dir="rtl" />

        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">مكان الازدياد</label>
            <input id="input6" maxlength="200" type="text" required="required"  placeholder="مكان الازدياد "   dir="rtl" />
        </div>


        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">المهمـة الموكلــة </label>

            <input id="input7" maxlength="200" type="text" required="required"  placeholder="المهمـة الموكلــة" dir="rtl" />
        </div>
        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">الجهة المنظمة</label>
            <input id="input8" maxlength="200" type="text" required="required"  placeholder="الجهة المنظمة" dir="rtl" />
        </div>
        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">الجهة المؤطرة</label>
            <input id="input9" maxlength="200" type="text" required="required"  placeholder="الجهة المؤطرة" dir="rtl" />
        </div>
        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <div>
                <label style="font-size: medium;float:right">المكان</label>
                <input id="input10" maxlength="200" type="text" required="required"  placeholder="المكان" dir="rtl" />
            </div>
           <div>

               <label style="font-size: medium;float:right">من</label>
               <input id="input11" class="form-control"  name="date" placeholder="MM/DD/YYY" type="text" dir="rtl" />
               <label style="font-size: medium;float:right">الى</label>

               <input id="input12" class="form-control"  name="date" placeholder="MM/DD/YYY" type="text" dir="rtl" />
           </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Assigning_mission"
    }
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

<style scoped>
    #input1,#input2,#input3,#input4,#input5,#input6,#input7,#input8,#input9,#input10,#input11,#input12{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }
</style>