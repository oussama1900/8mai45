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
                <option style="margin-right: 20px">مدير(ة) المؤسسة التربويـــة</option>
                <option> مدير(ة) متوسطة محمد الصالح بلعباس</option>
                <option>مدير(ة) متوسطة قـــارة بشير  </option>
                <option>مدير(ة) متوسطة لغوق عبد الحميد </option>
                <option>مدير(ة) متوسطة محمد صفي الديــــن </option>
                <option>مدير(ة) ثانويــة عمار مرناش – حي يحياوي </option>




            </select>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right"> الموضوع</label>
            <input id="input4" maxlength="200" type="text" required="required"  placeholder="الموضوع "  value=" ف/ي التعريف بالفوج وشراكة العمل" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">تحية كشفية و بعد: </label>
            <textarea  rows="24"  dir="rtl" style="height: 18rem;">
                       في إطار العمل التربوي المشترك بيننا كفوج للكشافة الإسلامية الجزائرية "الفلاح" وبينكم كمؤسسة تربوية تعنى بتربية النشأ يسعدني سيدي الكريم أن أؤكد لكم استعدادنا التام على التعاون لتحقيق هذه الغاية النبيلة من خلال مشاركتكم في نشاطاتكم الثقافية والتربوية الهادفة وكذا المناسبات الوطنية والدينية التي تقومون بإحيائها على مستوى مؤسستكم خصوصا وأن فوجنا يحتوي على طاقم قيادي شاب مؤهل للتعامل مع مختلف الفئات السنية.
     تجدر الإشارة سيدي الكريم أن فوجنا يعتبر من بين الأفواج الرائدة على مستوى الولاية حيث يعتبر من بين أكثر الأفواج عضوية بتعداد يصل لـ 200 منخرط إضافة الى أنه يزاول نشاطاته منذ سنة 1989 م في منطقة (حي طانجة، حي حشمي الشطر الأول والثاني والثالث، حي 500 مسكن) وقد أرفقت لكم رفقة هذه المراسلة نسخة من اعتماد الفوج ونسخة من قوائم المنخرطين وكذا التقرير الأدبي للثلاثي الأول من الموسم الحالي

            </textarea>
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