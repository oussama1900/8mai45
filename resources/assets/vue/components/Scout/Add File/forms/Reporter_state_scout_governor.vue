<template>
    <div style="margin: 20px">
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">رقــم البريــد الصادر</label>
            <input id="input1"  maxlength="200" type="text" required="required" class=" input-style" placeholder="رقــم البريــد الصادر" dir="rtl"  />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">التاريخ </label>
            <input id="input2"  maxlength="200" type="text" required="required" class=" input-style" placeholder="التاريخ" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">المحافظ الولائي</label>
            <input id="input3"  maxlength="200" type="text" required="required" class=" input-style" placeholder="المحافظ الولائي " dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">الموضوع </label>
            <input id="input4"  maxlength="200" type="text" required="required" class=" input-style" placeholder="الموضوع " dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">تحية كشفية و بعد:  </label>
            <textarea  rows="50"  dir="rtl" ></textarea>
        </div>
        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">محـــافظ الفوج </label>
            <input id="input5"  maxlength="200" type="text" required="required" class=" input-style" placeholder="محـــافظ الفوج  " dir="rtl" />
        </div>

    </div>
</template>

<script>
    export default {
        name: "Reporter_state_scout_governor"
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