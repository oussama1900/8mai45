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
            <label style="font-size: medium;float:right">الحامل لرخصة السياقة رقم </label>
            <input id="input4" maxlength="200" type="text" required="required"  placeholder="رقم رخصة السياقة   " dir="rtl" />
        </div>

        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">الصادرة عن دائرة </label>
            <input id="input6" maxlength="200" type="text" required="required"  placeholder="الدائرة "   dir="rtl" />
        </div>



        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">الرقم التسلسلي للحافلة</label>
            <input id="input8" maxlength="200" type="text" required="required"  placeholder="الرقم التسلسلي للحافلة" dir="rtl" />
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right">المهمـة الموكلــة </label>

            <input id="input7" maxlength="200" type="text" required="required"  placeholder="المهمـة الموكلــة" dir="rtl" />
        </div>

        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">

           <div>

               <label style="font-size: medium;float:right">من</label>
               <input id="input11" class="form-control"  name="date" placeholder="MM/DD/YYY" type="text" dir="rtl" />
               <label style="font-size: medium;float:right">الى</label>

               <input id="input12" class="form-control"  name="date" placeholder="MM/DD/YYY" type="text" dir="rtl" />
           </div>
        </div>
        <loading
                :show="show"
                :label="label">
        </loading>
    </div>
</template>

<script>
    import loading from 'vue-full-loading';
    export default {
        components:{
            loading
        },
        name: "Assigning_mission",
        data(){
            return{
                show: false,
                label: '....الرجاء الإنتظار',
            }
        }
    }

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