<template>
    <div style="margin: 20px">
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">رقــم البريــد الصادر </label>
            <input id="input1" maxlength="200" type="text" required="required"  placeholder="رقــم البريــد الصادر" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">التاريخ </label>
            <input id="input2" maxlength="200" type="text" required="required"  placeholder="التاريخ" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">الى الكشاف المحترم</label>
            <input id="input3" maxlength="200" type="text" required="required"  placeholder="الى الكشاف المحترم" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"> الموضوع</label>
            <input id="input4" maxlength="200" type="text" required="required"  placeholder="الموضوع "  value=": ف/ي دعوة لحضور اجتماع الشرفي" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">تحية كشفية و بعد: </label>
            <textarea  rows="24"  dir="rtl"></textarea>
        </div>

        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">ملاحظة </label>
            <input id="input5" maxlength="200" type="text" required="required"placeholder="ملاحظة "   dir="rtl" />
        </div>
        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">محـــافظ الفوج </label>
            <input id="input6" maxlength="200" type="text" required="required"  placeholder="محـــافظ الفوج  " dir="rtl" />
        </div>
    </div>
</template>

<script>
    export default {
        name: "Honorary_meeting"
    }
</script>

<style scoped>

    #input1,#input2,#input3,#input4,#input5,#input6{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }
</style>