<template>
    <div style="margin: 20px">
        <div class="form-group" style="margin-top: 10px">

           <label style="font-size: medium;float:right">طلب التخييم بولاية </label>
            <Algerian-States ></Algerian-States>


        </div>

        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">رقم الفاكس </label>
            <input id="input1"  maxlength="200" type="text" required="required" class=" input-style" placeholder="رقم الفاكس " dir="rtl" />
        </div>
        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">رقم الهاتف </label>
            <input id="input2"  maxlength="200" type="text" required="required" class=" input-style" placeholder="رقم الهاتف  1" dir="rtl" />
            <input id="input3"  maxlength="200" type="text"  class=" input-style" placeholder="رقم الهاتف 2  " dir="rtl" />
        </div>
        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">السيد محافظ الفوج </label>
            <input id="input4"  maxlength="200" type="text" required="required" class=" input-style" placeholder="محافظ الفوج" dir="rtl" />
        </div>

        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">البريد الالكتروني</label>
            <input id="input5"  maxlength="200" type="text" required="required" class=" input-style" placeholder="البريد الالكتروني" dir="rtl" />
        </div>
        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;float:right">رقم الحساب الجاري: القرض الشعبي البلدي cpa</label>
            <input id="input6"  maxlength="200" type="text" required="required" class=" input-style" placeholder="رقم الحساب الجاري" dir="rtl" />
        </div>
        <loading
                :show="show"
                :label="label">
        </loading>
    </div>
</template>

<script>
    import loading from 'vue-full-loading';
    import AlgerianStates from "./AlgerianStates";
    export default {
        name: "Camping_request",
        components: {AlgerianStates,loading},
        data(){
            return{
                show: false,
                label: '....الرجاء الإنتظار',
            }
        }
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