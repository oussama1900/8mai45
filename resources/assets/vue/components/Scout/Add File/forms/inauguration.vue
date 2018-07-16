<template>
    <div style="margin:20px">
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">انعقد مجلس فوج الفلاح بتاريخ </label>
            <input id="input1"  maxlength="200" type="text" required="required"    placeholder="MM/DD/YYY"  dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"> على الساعة </label>
            <input id="input2" maxlength="200" type="text" required="required"  placeholder="00:00" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"> المكان </label>
            <input id="input3" maxlength="200" type="text" required="required"  placeholder="المكان" dir="rtl" />
        </div>

        <div class=" form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;text-align: center">تم انتخاب السيد</label>
            <div class="row">
                <div class="col-sm-6">
                    <input id="input5" maxlength="200" type="text" required="required"  placeholder="الاسم" dir="rtl" />
                </div>
                <div class="col-sm-6">
                    <input id="input6" maxlength="200" type="text" required="required"  placeholder="اللقب  " dir="rtl" />
                </div>
            </div>
            <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                <Scout-Function></Scout-Function>
            </div>
        </div>
        <div class=" form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;text-align: center">بحضور</label>
            <input id="input7" maxlength="200" type="text" required="required"  placeholder="المنصب  " dir="rtl" />

        <div class="row">
            <div class="col-sm-6">
                <input id="input8" maxlength="200" type="text" required="required"  placeholder="الاسم" dir="rtl" />
            </div>
            <div class="col-sm-6">
                <input id="input9" maxlength="200" type="text" required="required"  placeholder="اللقب  " dir="rtl" />
            </div>
        </div>
        </div>


    </div>
</template>

<script>
    export default {
        name: "inauguration"
    }



</script>


<style scoped>
    #input1,#input2,#input3,#input5,#input6,#input7,#input8,#input9{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }

</style>