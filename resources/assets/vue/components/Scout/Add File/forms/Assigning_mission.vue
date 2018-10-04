<template>
    <div style="margin:20px">

        <div  style="padding-bottom: 10px;padding-top: 10px">
            <label class="label_title" style="font-size: medium;float:right">رقــم  </label>
            <input id="input1" maxlength="200" type="text" required="required"  placeholder="رقــم " onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" dir="rtl" v-model="outing_mail" />
        </div>
        <div  style="padding-bottom: 10px;padding-top: 10px">
            <label  class="label_title" style="font-size: medium;float:right">التاريخ  </label>
            <datetime type="date" class="label_title" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="date" format="yyyy/MM/dd" style="margin-right:-10px;margin-left:10px"></datetime>
        </div>
        <div  style="margin-bottom: 10px;margin-top: 10px">
            <label class="label_title" style="font-size: medium;text-align: center">أنا الممضي أسفله السيد</label>
            <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" class="label_title" v-model="fullname" :options="Captains"  :multiple="true" :close-on-select="false" :clear-on-select="false"  :hide-selected="true" :preserve-search="true"   placeholder="أنا الممضي أسفله السيد" :max="1" :show-labels="false"  :custom-label="customLabel" :preselect-first="false">

                <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;" class="label_title">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove label_title" style="cursor: pointer;"  @click="props.remove(props.option)">❌</span></span></template>

            </multiselect>
            </div>




        <div  style="margin-bottom: 10px;margin-top: 10px">
            <label  class="label_title" style="font-size: medium;text-align: center">أكلف السيد</label>
            <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" class="label_title" v-model="charged" :options="Captains"  :multiple="true" :close-on-select="false" :clear-on-select="false"  :hide-selected="true" :preserve-search="true"   placeholder="أكلف السيد" :max="1" :show-labels="false"  :custom-label="customLabel" :preselect-first="false">

                <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;" class="label_title">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove label_title" style="cursor: pointer;"  @click="props.remove(props.option)">❌</span></span></template>

            </multiselect>

        </div>

        <div  style="padding-bottom: 10px;padding-top: 10px">
            <label  class="label_title" style="font-size: medium;float:right">المهمـة الموكلــة </label>

            <input id="input9" maxlength="200" type="text" required="required"  placeholder="المهمـة الموكلــة" dir="rtl" v-model="mission"/>
        </div>
        <div  style="margin-bottom: 10px;margin-top: 10px">
            <label  class="label_title" style="font-size: medium;float:right">الجهة المنظمة</label>
            <input id="input10" maxlength="200" type="text" required="required"  placeholder="الجهة المنظمة" dir="rtl"  v-model="organiser"/>
        </div>
        <div style="margin-bottom: 10px;margin-top: 10px">
            <label class="label_title" style="font-size: medium;float:right">الجهة المؤطرة</label>
            <input id="input11" maxlength="200" type="text" required="required"  placeholder="الجهة المؤطرة" dir="rtl" v-model="framed" />
        </div>
        <div style="margin-bottom: 10px;margin-top: 10px">
            <div>
                <label  class="label_title" style="font-size: medium;float:right">المكان</label>
                <input id="input12" maxlength="200" type="text" required="required"  placeholder="المكان" dir="rtl" v-model="location"/>
            </div>
           <div>

               <label  class="label_title" style="font-size: medium;float:right">من</label>
               <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="from" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
               <label  class="label_title" style="font-size: medium;float:right">الى</label>

               <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="to" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
           </div>
        </div>
        <button class="btn btn-primary label_title"  style="text-align: center;margin-top: 20px" type="button" @click="download">تحميل</button>
        <sweet-modal icon="warning" ref="warn">
            <h3  class="label_title">لم يتم ادخال جميع المعلومات اللازمة</h3>
        </sweet-modal>
        <loading
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
        name: "Assigning_mission",

        data(){
            return{
                show: false,
                label: '....الرجاء الإنتظار',
                placeholder:"التاريخ ",
                direction:'rtl',
                value:"UTC+2",
               Captains:[],
               fullname:[],
                charged:[],
                from:'',
                to:'',
                framed:'',
                location:'',
                organiser:'',
                mission:'',
                outing_mail:'',
                date:'',
                date_temp:'',
                from_temp:'',
                to_temp:'',
            }
        },
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
        methods: {
            customLabel({first_name, last_name}) {
                return `${last_name} ${first_name}`
            },
            download(){
                if(this.from.localeCompare("")===0 ||
                    this.location.localeCompare("")===0 ||
                    this.charged.length === 0 ||
                    this.fullname.length ===0 ||
                    this.to.localeCompare("")===0||
                    this.framed.localeCompare("")===0||
                    this.date.localeCompare("")===0||
                    this.outing_mail.localeCompare("")===0||
                    this.mission.localeCompare("")===0||
                    this.organiser.localeCompare("")===0 ){
                    this.$refs.warn.open();


                }else{


                    this.show =true;

                    var temp_date = this.from.slice(0,10),
                        cut_date = temp_date.split("-");
                    this.from_temp  = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];


                    var temp_date2 = this.to.slice(0,10),
                        cut_date2 = temp_date2.split("-");
                    this.to_temp  = cut_date2[0]+"/"+cut_date2[1]+"/"+cut_date2[2];

                    var temp_date3 = this.date.slice(0,10),
                        cut_date3 = temp_date3.split("-");
                    this.date_temp  = cut_date3[0]+"/"+cut_date3[1]+"/"+cut_date3[2];
                    var vm  =this;
                    axios({
                        url:  '/api/downloadAssigning_missionPDF',
                        method: 'put',
                        responseType: 'blob',
                        data:{
                            fullname:vm.fullname,
                            charged :vm.charged,
                            location : vm.location,
                            from_temp:vm.from,
                            to_temp:vm.to,
                            framed:vm.framed,
                            organiser:vm.organiser,
                            mission : vm.mission,
                            outing_mail : vm.outing_mail,
                            date_temp : vm.date,
                        }


                    }).then(function (response) {

                        let blob = new Blob([response.data], { type:  'application/pdf' } );

                        let link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'تكليف بمهمة.pdf';
                        link.click();

                        vm.show =false;





                    });
                }



            }
        }
    }

</script>

<style scoped>
    #input1,#input2,#input3,#input4,#input5,#input6,#input7,#input8,#input9,#input10,#input11,#input12,#input13,#input14{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
    .label_title{
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
</style>