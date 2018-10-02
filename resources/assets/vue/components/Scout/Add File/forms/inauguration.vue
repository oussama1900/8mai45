<template>
    <div style="margin:20px">
        <div  style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title">انعقد مجلس فوج الفلاح بتاريخ </label>
            <datetime type="datetime" class="label_title" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="date" format="yyyy/MM/dd HH:mm" style="margin-right:-10px;margin-left:10px"></datetime>
        </div>

        <div style="padding-bottom: 10px;padding-top: 10px">
            <label style="font-size: medium;float:right" class="label_title"> المكان </label>
            <input id="input3" maxlength="200" type="text"   placeholder="المكان" dir="rtl" v-model="location"/>
        </div>

        <div  style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;text-align: center" class="label_title">تم انتخاب السيد</label>
            <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" class="label_title" v-model="elected" :options="Captains"  :multiple="true" :close-on-select="false" :clear-on-select="false"  :hide-selected="true" :preserve-search="true"   placeholder="اختر الشخص المنتخب" :max="1" :show-labels="false"  :custom-label="customLabel" :preselect-first="false">

                <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;" class="label_title">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove label_title"  style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

            </multiselect>
            <div  style="padding-bottom: 10px;padding-top: 10px">
                <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" class="label_title" v-model="role" :options="roles" :multiple="true"  placeholder="الدور" :close-on-select="false" :clear-on-select="false"  :hide-selected="true" :preserve-search="true"    :show-labels="false"  :max="1" :preselect-first="false">

                    <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;" class="label_title">{{props.option}}   </span><span class="custom__remove label_title"  style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                </multiselect>

            </div>
        </div>
        <div  style="margin-bottom: 10px;margin-top: 10px">
            <label style="font-size: medium;text-align: center" class="label_title">بحضور</label>
            <input id="input7" maxlength="200" type="text"   placeholder="بحضور  " dir="rtl" v-model="presence"/>



        </div>
            <button class="btn btn-primary label_title"   style="text-align: center;margin-top: 20px" type="button" @click="download">تحميل</button>
        <sweet-modal icon="warning" ref="warn">
            <h3 class="label_title">لم يتم ادخال جميع المعلومات اللازمة</h3>
        </sweet-modal>
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
    export default {
        components:{
            Multiselect,
            loading
        },
        created:function(){
            var vm = this;
            axios.get('/api/getCaptains').then(function (response) {

                vm.Captains = response.data.captain[0];
            });
        },
       data(){
           return{
               show: false,
               label: '....الرجاء الإنتظار',
               placeholder:"التاريخ و الوقت",
               direction:'rtl',
               value:"UTC+2",
               date:'',
               time:'',
               location:'',
               elected:[],
               presence:'',
               Captains:[],
               role:[],
               roles:[
                   'قائد الفوج ',
                   'نائب قائد الفوج ',
                   'مسؤول المالية والوسائل ',
                   'مسؤول الاعلام و الاتصال ',
                   'مسؤول متابعة البرامج ',
                   'قائد وحدة الاشبال ',
                   'قائد وحدة الكشاف ',
                   'قائد وحدة الكشاف المتقدم ',
                   'قائد وحدة الجوالة ',
               ],
           }
       },
        methods:{
            customLabel ({ first_name, last_name }) {
                return `${last_name} ${first_name}`
            },
            download(){
                if(this.date.localeCompare("")===0 ||
                    this.location.localeCompare("")===0 ||
                    this.elected.length===0 || this.role.length===0 ||
                    this.presence.localeCompare("")===0 ){


                }else{
                    this.show = true;
                    var datetime = this.date;
                  datetime =  datetime.split('T');


                    this.time = datetime[1].slice(0,5);
                    var temp_date = this.date.slice(0,10),
                        cut_date = temp_date.split("-");
                        this.date  = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];


                    var vm  =this;
                   axios({
                        url:  '/api/downloadInaugurationPDF',
                        method: 'put',
                        responseType: 'blob',
                        data:{
                            date:vm.date,
                            time :vm.time,
                            location : vm.location,
                            elected:vm.elected,
                            role:vm.role,
                            presence:vm.presence,
                        }


                    }).then(function (response) {

                        let blob = new Blob([response.data], { type:  'application/pdf' } );

                        let link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'محضر تنصيب.pdf';
                        link.click();
                       vm.show = false;






                    });

                }


            }
         }
    }



</script>


<style scoped>
    #input1,#input2,#input3,#input5,#input6,#input7,#input8,#input9{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
    #select{
        border:1px solid #9C9C9C;
        border-radius: 7px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .label_title{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }

</style>