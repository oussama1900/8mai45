<template>
    <div style="margin:20px">
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <select class="form-control label_title" v-model="mission_type" dir="rtl">
                <option value="travel" class="label_title">رحلة</option>
                <option value="else" class="label_title">مهمة أخرى</option>
            </select>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title">أنا الممضي أسفله السيد </label>
            <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" class="label_title" v-model="fullname" :options="Captains"  :multiple="true" :close-on-select="false" :clear-on-select="false"  :hide-selected="true" :preserve-search="true"   placeholder="أنا الممضي أسفله السيد" :max="1" :show-labels="false"  :custom-label="customLabel"  track-by="last_name" :preselect-first="true">

                <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;" class="label_title">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove label_title" style="color:white;cursor: pointer;"  @click="props.remove(props.option)">❌</span></span></template>

            </multiselect>
        </div>

        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title">  أكلف السيد </label>
            <input id="input3" class="label_title"  maxlength="200" type="text"    placeholder="أكلف السيد" dir="rtl" v-model="charged"/>
        </div>
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title" >الحامل ل </label>
            <select class="form-control label_title"   v-model="paper_name" dir="rtl">
                <option value="بطاقة التعريف" class="label_title">بطاقة التعريف</option>
                <option value="رخصة السياقة" class="label_title">رخصة السياقة</option>

            </select>

        </div>
        <div>
            <label style="font-size: medium;float:right" class="label_title" >{{paper_name}} رقم</label>
            <input class="label_title" id="input4" maxlength="200" type="text"    :placeholder="paper_name+'رقم'" dir="rtl" v-model="paper_code"/>
        </div>

        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title">الصادرة عن دائرة </label>
            <input  class="label_title" id="input6" maxlength="200" type="text"    placeholder="الدائرة "   dir="rtl" v-model="Issued_by"/>
        </div>



        <div class="form-group" style="margin-bottom: 10px;margin-top: 10px" v-if="mission_type.localeCompare('travel')===0" >
            <label class="label_title" style="font-size: medium;float:right" >الرقم التسلسلي للمركبة</label>
            <input  class="label_title" id="input8" maxlength="200" type="text"    placeholder="الرقم التسلسلي للمركبة" dir="rtl" v-model="serial_number"/>
        </div>
        <
        <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">

            <label style="font-size: medium;float:right" class="label_title">المهمـة الموكلــة </label>
            <input  class="label_title" id="input2"  type="text"    placeholder="المهمة الموكلة" dir="rtl" v-model="mission"/>
        </div>

<div class="btn btn-primary" style="text-align: center" @click="download">
    تحميل
</div>
        <loading
                class="label_title"
                :show="show"
                :label="label">
        </loading>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';
    import loading from 'vue-full-loading';
    import 'vue-multiselect/dist/vue-multiselect.min.css';
    import 'vue-multiselect/dist/vue-multiselect.min.js';
    import { VueEditor } from 'vue2-editor';
    export default {
        components:{
            loading,
            VueEditor,
            Multiselect
        },
        created:function(){
            var vm = this;
            axios.get('/api/getCaptains').then(function (response) {

                vm.Captains = response.data.captain[0];

            });
        },
        name: "Assigning_mission",
        data(){
            return{
                show: false,
                label: '....الرجاء الإنتظار',
                Captains:[],
                fullname:'',
                charged:'',
                mission_type:'travel',
                paper_name:'رخصة السياقة',
                paper_code:"",
                Issued_by:'',
                mission:'',
                serial_number:''
            }
        },
        methods:{
            customLabel({first_name, last_name}) {
                return `${last_name} ${first_name}`
            },
            download(){
                this.show = true;
                var vm = this;
                axios({
                    url:'/api/Assigning_mission_travel',
                    responseType:'blob',
                    method:'put',
                    data:{
                        fullname:vm.fullname,
                        charged:vm.charged,
                        mission_type:vm.mission_type,
                        paper_name:vm.paper_name,
                        paper_code:vm.paper_code,
                        issued_by : vm.Issued_by,
                        mission:vm.mission,
                        serial_number:vm.serial_number,
                    }
                }).then(function (response) {
                    let blob = new Blob([response.data], { type:  'application/pdf' } );

                    let link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'تكليف بمهمة.pdf';
                    link.click();

                    vm.show =false;

                })

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
    .form-control{
        border: 1px solid #9C9C9C;
        border-radius: 7px;
    }
    .label_title{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
</style>