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
            <label style="font-size: medium;float:right">الى السيد  المحترم</label>
            <select class="form-control"  dir="rtl" id="input3">
                <option style="margin-right: 20px">رئيس مركز الأمن الحضري الثالث</option>
                <option> رئيس مركز الأمن الحضري التاسع</option>
                <option>رئيس مركز الأمن الحضري الحادي عشر </option>
                <option>رئيس مركز الأمن الحضري الثاني عشر </option>
                <option>رئيس مركز الأمن الحضري الرابع عشر </option>




            </select>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"> الموضوع</label>
            <input id="input4" maxlength="200" type="text" required="required"  placeholder="الموضوع "  value=" ف/ي التعريف بالفوج وشراكة العمل" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">تحية كشفية و بعد: </label>
            <textarea  rows="24"  dir="rtl" style="height: 10rem;"></textarea>
        </div>


        <div class=" form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;text-align: center">محـــافظ الفوج </label>
            <div class="row">
                <div class="col-sm-6">
                    <input id="input6" maxlength="200" type="text" required="required"  placeholder="الاسم" dir="rtl" />
                </div>
                <div class="col-sm-6">
                    <input id="input7" maxlength="200" type="text" required="required"  placeholder="اللقب  " dir="rtl" />
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        name: "Honorary_meeting"
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