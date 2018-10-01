<template>
        <div class="container col-md-11 col-sm-11 col-xs-11 text-center card " style="padding-right: 0px;padding-left:0px">
            <div class="header">

                <h4 class="title">ورقة النشاط</h4>
            </div>
            <div  class="card-body" style="margin:10px;" >

                <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                    <label style="font-size: medium;float:right">التاريخ  </label>
                    <datetime type="datetime" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="date" format="yyyy/MM/dd HH:mm" style="margin-right:-10px;margin-left:10px"></datetime>
                </div>
                <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                    <label style="font-size: medium;float:right">المكان  </label>
                    <input id="location" maxlength="200" type="text" required="required"  dir="rtl" placeholder="المكان " v-model="location"/>
                </div>
                <div  style="padding-bottom: 10px;padding-top: 10px">
                    <label style="font-size: medium;float:right">رقــم النشاط </label>
                    <input id="input1" maxlength="200" type="text" required="required"  placeholder="رقــم النشاط " onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" dir="rtl" v-model="activity_number" />
                </div>

                <div class="table" style="padding-bottom: 10px;padding-top: 10px">
                    <div>

                        <div class="row">

                            <div class="col-md-12">
                                <label style="font-size: medium;float:right">المواضيع المقدمة  </label>
                                <div id="EducationalSubjects">
                                    <input id="EDsubject1" maxlength="200" type="text" required="required"  placeholder="الموضوع  " dir="rtl" />

                                </div>

                                <button  class="btn btn-primary a-btn-slide-text"  @click="add('EducationalSubjects','الموضوع')">

                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>
                            </div>

                    </div>


                    </div>



                </div>
                <div style="margin: 20px;margin-right: 30px">
                    <div class="row">
                        <div class="col-md-12" >

                            <div>

                                <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="presence" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="القــادة الحاضرون" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                    <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                </multiselect>

                            </div>

                        </div>


                    </div>


                </div>
                <div style="margin: 20px;margin-right: 30px">
                    <div class="row">
                        <div class="col-md-12" >

                            <div>

                                <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="scout_presence" :options="MyScout" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="الكشـــافون الحاضرون" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                    <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                </multiselect>

                            </div>

                        </div>


                    </div>


                </div>
                <div style="margin: 20px;margin-right: 30px">
                    <div class="row">

                        <div class="col-md-6" >

                            <div>

                                <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="scout_absence_cause" :options="MyScout" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder="الغياب بعذر " :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                    <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                </multiselect>

                            </div>

                        </div>


                        <div class="col-md-6" >

                            <div>

                                <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="scout_absence" :options="MyScout" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder=" الغياب بغير عذر" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                    <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                </multiselect>

                            </div>

                        </div>
                    </div>


                </div>
                <div class="table" style="padding-bottom: 10px;padding-top: 10px">
                    <div>

                        <div class="row">

                            <div class="col-md-12">
                                <label style="font-size: medium;float:right">ملاحظات  </label>
                                <div id="Notes">
                                    <input id="note1" maxlength="200" type="text" required="required"  placeholder="ملاحظة  " dir="rtl" />

                                </div>

                                <button  class="btn btn-primary a-btn-slide-text"  @click="add('Notes','ملاحظة')">

                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>
                            </div>

                        </div>


                    </div>



                </div>
                <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                    <label style="font-size: medium;float:right">اختتم النشاط على الساعة   </label>
                    <datetime  type="datetime" :dir="direction" :placeholder="placeholder2" :value-zone="value"  v-model="end_time" format="HH:mm"
                                 style="margin-right:-10px;margin-left:10px"></datetime>
                </div>

                <button  class="btn btn-primary a-btn-slide-text" style="text-align: center" @click="download">
                    <span>تحميل</span>
                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>

                </button>
                <button  class="btn btn-primary a-btn-slide-text" style="text-align: center" @click="send">
                    <span>ارسال</span>
                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>

                </button>
            </div>
            <sweet-modal icon="success" ref="send_successfully">
                <h3>تم ارسال ورقة النشاط بنجاح تام</h3>
            </sweet-modal>
            <loading
                    :show="show"
                    :label="label">
            </loading>
        </div>

    </template>

    <script>
        var     EDsubject=1,
                note=1;
        import Multiselect from 'vue-multiselect';
        import loading from 'vue-full-loading';
        import 'vue-multiselect/dist/vue-multiselect.min.css';
        import 'vue-multiselect/dist/vue-multiselect.min.js';
        export default {
            components: {
                Multiselect,
                loading
            },
            data(){
                return{
                    show: false,
                    label: '....الرجاء الإنتظار',
                    placeholder:"التاريخ ",
                    placeholder2:"اختتم النشاط على الساعة  ",
                    direction:'rtl',
                    value:"UTC+2",
                    activity_number:'',
                    goals:[],
                    date:'',
                    location:'',
                    Captains:[],
                    presence:[],
                    cap_presence:[],
                    scout_presence:[],
                    scout_presence_temp:[],
                    scout_absence:[],
                    scout_absence_temp:[],
                    scout_absence_cause:[],
                    scout_absence_cause_temp:[],
                    end_time:'',
                    date_temp:'',
                    end_time_temp:'',
                    notes:[],
                    time:'',
                    MyScout:[],

                    EDsubject :1
                }

            },
            created:function(){


                var vm = this;
                axios.get('/api/getCaptains').then(function (response) {

                    vm.Captains = response.data.captain[0];
                    axios.get('/api/getMyScout').then(function (response) {

                        vm.MyScout = response.data.myscout;

                    });

                });


            },
            methods: {

                add: function (inputtype,placeholde) {
                    var element,input,type,direction,placeholder,id,style;

                    input = document.createElement("input");

                     type = document.createAttribute("type");
                    direction = document.createAttribute("dir");
                    placeholder = document.createAttribute("placeholder");
                    style = document.createAttribute("style");

                    type.value="text";
                    direction.value="rtl";
                    placeholder.value=placeholde;

                    style.value=" border-top: 1px solid #9C9C9C;\n" +
                        "       border-right: 1px solid #9C9C9C;\n" +
                        "        border-left: 1px solid #9C9C9C;\n" +
                        "        border-radius: 7px;\n" +
                        "        padding: 5px";
                    switch(inputtype){
                        case 'EducationalSubjects':{
                            EDsubject +=1;
                            input.id="EDsubject"+EDsubject;

                            break;

                        }
                        case 'Notes':{
                            note +=1;
                            input.id="note"+note;

                            break;

                        }

                    }
                    input.setAttributeNode(type);
                    input.setAttributeNode(direction);
                    input.setAttributeNode(placeholder);



                    input.setAttributeNode(style);


                     element = document.getElementById(inputtype);
                    element.appendChild(input);
                },
                download(){
                    this.show = true;
                    if(this.activity_number.localeCompare("")===1){

                        if(this.activity_number<10)
                            if(this.activity_number>0)
                            if(!this.activity_number.includes("0"))
                                this.activity_number = "0"+this.activity_number;

                    }
                    var vm = this;
                    if(this.date.localeCompare("")===1){
                        var temp_date = this.date.slice(0,10),
                            cut_date = temp_date.split("-");
                        this.time =this.date.slice(11,16);
                        this.date_temp  = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                    }




                     this.end_time_temp = this.end_time.slice(11,16);
                     for(var i =1;i<=EDsubject;i++){
                        this.goals[i-1] = $('#EDsubject'+i).val();

                     }
                     for(var j =1;j<=note;j++){
                         this.notes[j-1]= $('#note'+j).val();
                     }
                    for(var x =0;x<this.presence.length;x++){
                        this.cap_presence[x]= this.presence[x].last_name +" "+ this.presence[x].first_name ;
                    }
                    for(var y =0;y<this.scout_presence.length;y++){
                        this.scout_presence_temp[y]= this.scout_presence[y].last_name +" "+ this.scout_presence[y].first_name ;
                    }
                    for(var z =0;z<this.scout_absence.length;z++){
                        this.scout_absence_temp[z]= this.scout_absence[z].last_name +" "+ this.scout_absence[z].first_name ;
                    }
                    for(var u =0;u<this.scout_absence_cause.length;u++){
                        this.scout_absence_cause_temp[u]= this.scout_absence_cause[u].last_name +" "+ this.scout_absence_cause[u].first_name ;
                    }
                    axios({
                        url:  '/api/downloadActivityPaperPDF',
                        method: 'Post',
                        responseType: 'blob',
                        data:{
                            date:vm.date_temp,
                            time : vm.time,
                            location : vm.location,
                            activity_number:vm.activity_number,
                            goals :vm.goals,
                            cap_presence:vm.cap_presence,
                            scout_presence:vm.scout_presence_temp,
                            scout_absence:vm.scout_absence_temp,
                            scout_absence_cause : vm.scout_absence_cause_temp,
                            notes : vm.notes,
                            end_time : vm.end_time_temp,

                        }


                    }).then(function (response) {

                        let blob = new Blob([response.data], { type:  'application/pdf' } );

                        let link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'ورقة النشاط.pdf';
                        link.click();
                        vm.show = false;






                    });
                },
                send(){
                    this.show = true;
                    if(this.activity_number.localeCompare("")===1){

                        if(this.activity_number<10)
                            if(this.activity_number>0)
                                if(!this.activity_number.includes("0"))
                                    this.activity_number = "0"+this.activity_number;

                    }
                    var vm = this;
                    if(this.date.localeCompare("")===1){
                        var temp_date = this.date.slice(0,10),
                            cut_date = temp_date.split("-");
                        this.time =this.date.slice(11,16);
                        this.date_temp  = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                    }




                    this.end_time_temp = this.end_time.slice(11,16);
                    for(var i =1;i<=EDsubject;i++){
                        this.goals[i-1] = $('#EDsubject'+i).val();

                    }
                    for(var j =1;j<=note;j++){
                        this.notes[j-1]= $('#note'+j).val();
                    }
                    for(var x =0;x<this.presence.length;x++){
                        this.cap_presence[x]= this.presence[x].last_name +" "+ this.presence[x].first_name ;
                    }
                    for(var y =0;y<this.scout_presence.length;y++){
                        this.scout_presence_temp[y]= this.scout_presence[y].last_name +" "+ this.scout_presence[y].first_name ;
                    }
                    for(var z =0;z<this.scout_absence.length;z++){
                        this.scout_absence_temp[z]= this.scout_absence[z].last_name +" "+ this.scout_absence[z].first_name ;
                    }
                    for(var u =0;u<this.scout_absence_cause.length;u++){
                        this.scout_absence_cause_temp[u]= this.scout_absence_cause[u].last_name +" "+ this.scout_absence_cause[u].first_name ;
                    }
                    axios({
                        url:  '/api/SendActivityPaperPDF',
                        method: 'Post',
                        responseType: 'blob',
                        data:{
                            date:vm.date_temp,
                            time : vm.time,
                            location : vm.location,
                            activity_number:vm.activity_number,
                            goals :vm.goals,
                            cap_presence:vm.cap_presence,
                            scout_presence:vm.scout_presence_temp,
                            scout_absence:vm.scout_absence_temp,
                            scout_absence_cause : vm.scout_absence_cause_temp,
                            notes : vm.notes,
                            end_time : vm.end_time_temp,

                        }


                    }).then(function (response) {

                       vm.$refs.send_successfully.open();
                       vm.show =false;







                    });
                },
                customLabel ({ first_name, last_name }) {
                    return ` ${last_name} ${first_name} `
                },

            }
        }

    </script>






<style scoped>
    input[type=text],input[type=number],input[type=date],input[type=month]{
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;
        border-radius: 7px;
        padding: 5px
    }
    #select{
        border: 1px solid #9C9C9C;
        border-radius: 7px;
    }

    .card{
        margin-top:7%;
        margin-left: 50px;
        background-color: white;
    }



    a.btn:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1);
    }
    a.btn {
        -webkit-transform: scale(0.8);
        -moz-transform: scale(0.8);
        -o-transform: scale(0.8);
        -webkit-transition-duration: 0.5s;
        -moz-transition-duration: 0.5s;
        -o-transition-duration: 0.5s;
    }
    .header{
        background-color: rgb(51, 181, 229);
        backdrop-filter: blur(5px);
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;

    }
    .header .title{
        color:white;
    }

</style>