<template>
        <div class="container col-md-11 col-sm-11 col-xs-11 text-center card " style="padding:10px">
            <div  class="card-body" >
            <div class="row">
                <h1>التقرير الشهري</h1>
            </div>

            <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                <label style="font-size: medium;float:right">فوج الفلاح – وحــــــدة   </label>
                <select id="select" class="form-control"  dir="rtl">
                    <option> وحدة الاشبال</option>
                    <option>   وحدة الكشاف </option>
                    <option> وحدة الكشاف المتقدم</option>
                    <option> وحدة الجوالة</option>
                </select>

            </div>
            <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                <label style="font-size: medium;float:right">التاريخ  </label>
                <input id="Date" maxlength="200" type="date" required="required"  placeholder="التاريخ " />
            </div>
            <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                <label style="font-size: medium;float:right">تقرير شهر    </label>
                <input id="month" maxlength="200" type="text" required="required"  placeholder="تقرير شهر  " dir="rtl" />
            </div>
                <div class="table" style="padding-bottom: 10px;padding-top: 10px">
                    <div>
                        <label style="font-size: medium;text-align: center">الجانب التربوي  </label>
                        <div class="row">
                            <div class="col-md-6" >
                                <label style="font-size: medium;float:right">الأهــــــــداف المحققة  </label>
                                <div id="Educationalgoals">
                                    <input id="EDgoal1" maxlength="200" type="text" required="required"  placeholder="الهــــــــدف  " dir="rtl" />

                                </div>

                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('Educationalgoals','الهــــــــدف')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>

                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">المواضيع المقدمة  </label>
                                <div id="EducationalSubjects">
                                    <input id="EDsubject1" maxlength="200" type="text" required="required"  placeholder="الموضوع  " dir="rtl" />

                                </div>

                                <button  class="btn btn-primary a-btn-slide-text" v-on:click="add('EducationalSubjects','الموضوع')">

                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>
                            </div>

                    </div>


                    </div>
                    <div>
                        <label style="font-size: medium;text-align: center">الجانب الكشفي  </label>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">الأهــــــــداف المحققة  </label>
                                <div id="ScoutingSide-goals">

                                    <input id="SCgoal1" maxlength="200" type="text" required="required"  placeholder="الهــــــــدف  " dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('ScoutingSide-goals','الهــــــــدف')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">المواضيع المقدمة  </label>
                                <div id="ScoutingSide-subject">
                                    <input  id="SCsubject1" maxlength="200" type="text" required="required"  placeholder="الموضوع" dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('ScoutingSide-subject','الموضوع')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>


                            </div>

                    </div>


                    </div>
                    <div>
                        <label style="font-size: medium;text-align: center">الجانب الثقافي  </label>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">الأهــــــــداف المحققة  </label>
                                <div id="Culturalside-subjects">
                                    <input id="CULgoal1" maxlength="200" type="text" required="required"  placeholder="الهــــــــدف" dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('Culturalside-subjects','الهــــــــدف')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">المواضيع المقدمة  </label>
                                <div id="Culturalside-goals">
                                    <input id="CULsubject1" maxlength="200" type="text" required="required"  placeholder="الموضوع" dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('Culturalside-goals','الموضوع')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>

                            </div>

                    </div>
                    </div>
                    <div><label style="font-size: medium;text-align: center">الجانب المهاراتي</label>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">الأهــــــــداف المحققة  </label>
                                <div id="SkillsSide-goals">
                                    <input id="SKLgoal1" maxlength="200" type="text" required="required"  placeholder="الهــــــــدف " dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('SkillsSide-goals','الهــــــــدف')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>

                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">المواضيع المقدمة  </label>
                                <div id="SkillsSide-Subjects">
                                    <input id="SKLsubject1" maxlength="200" type="text" required="required"  placeholder="الموضوع  " dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('SkillsSide-Subjects','الموضوع')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>

                            </div>

                        </div></div>
                    <div>
                        <label style="font-size: medium;text-align: center">الأناشيد</label>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">الأهــــــــداف المحققة  </label>
                                <div id="songs-goals">
                                    <input id="SONGgoal1" maxlength="200" type="text" required="required"  placeholder="الهــــــــدف " dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('songs-goals','الهــــــــدف')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">المواضيع المقدمة  </label>
                                <div id="songs-subjects">
                                    <input id="SONGsubject1" maxlength="200" type="text" required="required"  placeholder="الموضوع  " dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('songs-subjects','الموضوع')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>

                            </div>

                        </div>
                    </div>
                    <div>
                        <label style="font-size: medium;text-align: center">الألعـــاب</label>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">الأهــــــــداف المحققة  </label>
                                <div id="games-goals">
                                    <input  id="GAMEgoal1" maxlength="200" type="text" required="required"  placeholder="الهــــــــدف  " dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('games-goals','الهــــــــدف')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: medium;float:right">المواضيع المقدمة  </label>
                                <div id="games-subjects">
                                    <input id="GAMEsubject1" maxlength="200" type="text" required="required"  placeholder="الموضوع  " dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('games-subjects','الموضوع')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                    <label style="font-size: medium;text-align: center">احصائيات عامة  </label>
                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">نسبة تطبيق البرنامج العربي  </label>
                        <input  maxlength="200" type="number" required="required"  placeholder="نسبة تطبيق البرنامج العربي " dir="rtl" />
                    </div>
                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">أكثر عدد حضور كشافين </label>
                        <input  maxlength="200" type="number" required="required"  placeholder="أكثر عدد حضور كشافين " dir="rtl" />
                    </div>

                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">أضعف عدد حضور كشافين  </label>
                        <input  maxlength="200" type="number" required="required"  placeholder="أضعف عدد حضور كشافين" dir="rtl" />
                    </div>


                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">أكثر عدد حضور قادة </label>
                        <input  maxlength="200" type="number" required="required"  placeholder="أكثر عدد حضور قادة " dir="rtl" />
                    </div>


                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">أضعف عدد حضور قادة  </label>
                        <input  maxlength="200" type="number" required="required"  placeholder="أضعف عدد حضور قادة " dir="rtl" />
                    </div>


                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">مجموع مصاريف الشهر  </label>
                        <input  maxlength="200" type="number" required="required"  placeholder="مجموع مصاريف الشهر " dir="rtl" />
                    </div>


                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">وضعية مالية الوحدة  </label>
                        <input  maxlength="200" type="text" required="required"  placeholder="وضعية مالية الوحدةي " dir="rtl" />
                    </div>

                </div>
                <div class="table" style="padding-bottom: 10px;padding-top: 10px" >
                    <label style="font-size: medium;text-align: center">تقييم العمل  </label>
                    <div class="row">
                        <div class="col-md-6">
                            <label style="font-size: medium;float:right">نقائص   </label>
                            <div>
                                <div id="Shortages">
                                    <input id="shortage1" maxlength="200" type="text" required="required"  placeholder="نقائص  " dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('Shortages','نقائص')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label style="font-size: medium;float:right">إيجابيات   </label>
                            <div>
                                <div id="Positives">
                                    <input id="positive1" maxlength="200" type="text" required="required"  placeholder="إيجابيات  " dir="rtl" />

                                </div>
                                <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('Positives','إيجابيات')">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                    <label style="font-size: medium;text-align: center">مداومة قادة الوحدة   </label>
                    <div>
                        <div class="row" style="padding-bottom: 10px;padding-top: 10px">

                            <div class="col-md-6">
                                <div >
                                    <label style="font-size: medium;text-align: right">الرياضة الأولى </label>
                                    <input  maxlength="200" type="date" required="required"  placeholder="DD/MM/YYYY " dir="rtl" />
                                </div>
                                <div >
                                    <label style="font-size: medium;float:right">	القادة الحاضرون   </label>
                                    <div style="padding-bottom: 10px;padding-top: 10px">
                                        <div id="presentleaders-sport1">
                                            <input id="LEAD-sp1-PR" maxlength="200" type="text" required="required"  placeholder="القادة الحاضرون  " dir="rtl" />

                                        </div>
                                        <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('presentleaders-sport1','القادة الحاضرون')">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div  class="col-md-6" >
                                <label style="font-size: medium;text-align: right">النشاط الأول  </label>
                                <input  maxlength="200" type="date" required="required"  placeholder="DD/MM/YYYY " dir="rtl" />
                                <div  >
                                    <label style="font-size: medium;float:right">	القادة الحاضرون   </label>
                                    <div style="padding-bottom: 10px;padding-top: 10px">
                                        <div id="presentleaders-act-1">
                                            <input id="LEAD-act1-PR" maxlength="200" type="text" required="required"  placeholder="القادة الحاضرون  " dir="rtl" />

                                        </div>
                                        <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('presentleaders-act-1','القادة الحاضرون')">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row" style="padding-bottom: 10px;padding-top: 10px">

                            <div class="col-md-6">
                                <div >
                                    <label style="font-size: medium;text-align: right">الرياضة الثانية </label>
                                    <input  maxlength="200" type="date" required="required"  placeholder="DD/MM/YYYY " dir="rtl" />
                                </div>
                                <div >
                                    <label style="font-size: medium;float:right">	القادة الحاضرون   </label>
                                    <div style="padding-bottom: 10px;padding-top: 10px">
                                        <div id="presentleaders-sport2">
                                            <input id="LEAD-sp2-PR" maxlength="200" type="text" required="required"  placeholder="القادة الحاضرون  " dir="rtl" />

                                        </div>
                                        <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('presentleaders-sport2','القادة الحاضرون')">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div  class="col-md-6" >
                                <label style="font-size: medium;text-align: right">النشاط الثاني  </label>
                                <input  maxlength="200" type="date" required="required"  placeholder="DD/MM/YYYY " dir="rtl" />
                                <div  >
                                    <label style="font-size: medium;float:right">	القادة الحاضرون   </label>
                                    <div style="padding-bottom: 10px;padding-top: 10px">
                                        <div id="presentleaders-act-2">
                                            <input id="LEAD-act2-PR" maxlength="200" type="text" required="required"  placeholder="القادة الحاضرون  " dir="rtl" />

                                        </div>
                                        <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('presentleaders-act-2','القادة الحاضرون')">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row" style="padding-bottom: 10px;padding-top: 10px">

                            <div class="col-md-6">
                                <div >
                                    <label style="font-size: medium;text-align: right">الرياضة الثالثة </label>
                                    <input  maxlength="200" type="date" required="required"  placeholder="DD/MM/YYYY " dir="rtl" />
                                </div>
                                <div >
                                    <label style="font-size: medium;float:right">	القادة الحاضرون   </label>
                                    <div style="padding-bottom: 10px;padding-top: 10px">
                                        <div id="presentleaders-sport3">
                                            <input   id="LEAD-sp3-PR" maxlength="200" type="text" required="required"  placeholder="القادة الحاضرون  " dir="rtl" />

                                        </div>
                                        <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('presentleaders-sport3','القادة الحاضرون')">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div  class="col-md-6" >
                                <label style="font-size: medium;text-align: right">النشاط الثالث  </label>
                                <input  maxlength="200" type="date" required="required"  placeholder="DD/MM/YYYY " dir="rtl" />
                                <div  >
                                    <label style="font-size: medium;float:right">	القادة الحاضرون   </label>
                                    <div style="padding-bottom: 10px;padding-top: 10px">
                                        <div id="presentleaders-act-3">
                                            <input  id="LEAD-act3-PR" maxlength="200" type="text" required="required"  placeholder="القادة الحاضرون  " dir="rtl" />

                                        </div>
                                        <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('presentleaders-act-3','القادة الحاضرون')">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row" style="padding-bottom: 10px;padding-top: 10px">

                            <div class="col-md-6">
                                <div >
                                    <label style="font-size: medium;text-align: right">الرياضة الرابعة </label>
                                    <input  maxlength="200" type="date" required="required"  placeholder="DD/MM/YYYY " dir="rtl" />
                                </div>
                                <div >
                                    <label style="font-size: medium;float:right">	القادة الحاضرون   </label>
                                    <div style="padding-bottom: 10px;padding-top: 10px">
                                        <div id="presentleaders-sport4">
                                            <input  id="LEAD-sp4-PR" maxlength="200" type="text" required="required"  placeholder="القادة الحاضرون  " dir="rtl" />

                                        </div>
                                        <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('presentleaders-sport4','القادة الحاضرون')">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div  class="col-md-6" >
                                <label style="font-size: medium;text-align: right">النشاط الرابع  </label>
                                <input   maxlength="200" type="date" required="required"  placeholder="DD/MM/YYYY " dir="rtl" />
                                <div  >
                                    <label style="font-size: medium;float:right">	القادة الحاضرون   </label>
                                    <div style="padding-bottom: 10px;padding-top: 10px">
                                        <div id="presentleaders-act-4">
                                            <input id="LEAD-act4-PR" maxlength="200" type="text" required="required"  placeholder="القادة الحاضرون  " dir="rtl" />

                                        </div>
                                        <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('presentleaders-act-4','القادة الحاضرون')">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>




                    </div>































                    <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: center">بعض المقترحات للشهر القادم الى إدارة الفوج  </label>
                        <textarea style="height: 10rem"></textarea>
                    </div>

                </div>
                <button  class="btn btn-primary a-btn-slide-text" style="float:left">
                    <span>حفظ</span>
                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>

                </button>
            </div>
        </div>

    </template>

    <script>
        var     EDsubject=1,EDgoal=1,
            SCsubject=1,SCgoal=1,
            CULsubject=1,CULgoal=1,
            SKLsubject=1,SKLgoal=1,
            SONGsubject=1,SONGgoal=1,
            GAMEsubject=1,GAMEgoal=1,
            shortage=1,positive=1,
            LEAD_act1_PR=1,LEAD_act2_PR=1,
            LEAD_act3_PR=1,LEAD_act4_PR=1,
            LEAD_sp1_PR=1,LEAD_sp2_PR=1,
            LEAD_sp3_PR=1,LEAD_sp4_PR=1;
        export default {
            name: "NewRapport",
            data:{
                EDsubject :1
            },
            methods: {

                add: function (inputtype,placeholde) {
                    var element,input,type,direction,placeholder,id,style;

                    input = document.createElement("input");

                    console.log(inputtype);

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
                        case 'Educationalgoals':{
                            EDgoal +=1;
                            input.id="EDgoal"+EDgoal;

                            break;

                        }


                        case 'ScoutingSide-subject':{
                            SCsubject +=1;
                            input.id="SCsubject"+SCsubject;

                            break;

                        }
                        case 'ScoutingSide-goals':{
                            SCgoal +=1;
                            input.id="SCgoal"+SCgoal;

                            break;

                        }





                        case 'Culturalside-subjects':{
                            CULsubject +=1;
                            input.id="CULsubject"+CULsubject;

                            break;

                        }
                        case 'Culturalside-goals':{
                            CULgoal +=1;
                            input.id="CULgoal"+CULgoal;

                            break;

                        }
                        case 'SKLgoal1':{
                            SKLgoal +=1;
                            input.id="SKLgoal"+SKLgoal;

                            break;

                        }
                        case 'SkillsSide-Subjects':{
                            SKLsubject +=1;
                            input.id="SKLsubject"+SKLsubject;

                            break;

                        }
                        case 'songs-goals':{
                            SONGgoal +=1;
                            input.id="SONGgoal"+SONGgoal;

                            break;

                        }
                        case 'songs-subjects':{
                            SONGsubject +=1;
                            input.id="SONGsubject"+SONGsubject;

                            break;

                        }
                        case ' games-goals':{
                            GAMEgoal +=1;
                            input.id="GAMEgoal"+GAMEgoal;

                            break;

                        }
                        case 'games-subjects':{
                            GAMEsubject +=1;
                            input.id="GAMEsubject"+GAMEsubject;

                            break;

                        }
                        case 'Shortages':{
                            shortage +=1;
                            input.id="shortage"+shortage;

                            break;

                        }
                        case 'Positives':{
                            positive +=1;
                            input.id="positive"+positive;

                            break;

                        }

                        case ' presentleaders-sport1':{
                            LEAD_sp1_PR +=1;
                            input.id="LEAD_sp1_PR"+LEAD_sp1_PR;

                            break;

                        }
                        case ' presentleaders-sport2':{
                            LEAD_sp2_PR +=1;
                            input.id="LEAD_sp2_PR"+LEAD_sp2_PR;

                            break;

                        }
                        case ' presentleaders-sport3':{
                            LEAD_sp3_PR +=1;
                            input.id="LEAD_sp3_PR"+LEAD_sp3_PR;

                            break;

                        }
                        case ' presentleaders-sport4':{
                            LEAD_sp4_PR +=1;
                            input.id="LEAD_sp4_PR"+LEAD_sp4_PR;

                            break;

                        }
                        case ' presentleaders-act-1':{
                            LEAD_act1_PR +=1;
                            input.id="LEAD_act1_PR"+LEAD_act1_PR;

                            break;

                        }
                        case ' presentleaders-act-2':{
                            LEAD_act2_PR +=1;
                            input.id="LEAD_act2_PR"+LEAD_act2_PR;

                            break;

                        }
                        case ' presentleaders-act-3':{
                            LEAD_act3_PR +=1;
                            input.id="LEAD_act3_PR"+LEAD_act3_PR;

                            break;

                        }
                        case ' presentleaders-act-4':{
                            LEAD_act4_PR +=1;
                        input.id="LEAD_act4_PR"+LEAD_act4_PR;

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
</style>