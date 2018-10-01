<template>
        <div class="container col-md-11 col-sm-11 col-xs-11 text-center card " style="padding-right: 0px;padding-left:0px">
            <div class="header">

                <h4 class="title">التقرير الشهري</h4>
            </div>
            <div  class="card-body" style="margin:10px;">



            <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                <label style="font-size: medium;float:right">التاريخ  </label>
                <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="date" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
            </div>
            <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                <label style="font-size: medium;float:right">تقرير شهر    </label>
								<select id="month" class="form-control" dir="rtl" v-model="month">
									<option value="جانفي">جانفي</option>
									<option value="فيفري">فيفري</option>
									<option value="مارس">مارس</option>
									<option value="أفريل">أفريل</option>
									<option value="ماي">ماي</option>
									<option value="جوان">جوان</option>
									<option value="جويلية">جويلية</option>
									<option value="أوت">أوت</option>
									<option value="سبتمبر">سبتمبر</option>
									<option value="أكتوبر">أكتوبر</option>
									<option value="نوفمبر">نوفمبر</option>
									<option value="ديسمبر">ديسمبر</option>
								</select>

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
                        <input  maxlength="3" type="text" required="required"  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="نسبة تطبيق البرنامج العربي " dir="rtl" v-model="arprog_perc"/>
                    </div>
                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">أكثر عدد حضور كشافين </label>
                        <input  maxlength="3" type="text" required="required" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="أكثر عدد حضور كشافين " dir="rtl" v-model="max_scout_pres"/>
                    </div>

                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">أضعف عدد حضور كشافين  </label>
                        <input  maxlength="200" type="text" required="required" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"  placeholder="أضعف عدد حضور كشافين" dir="rtl" v-model="min_scout_pres"/>
                    </div>


                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">أكثر عدد حضور قادة </label>
                        <input  maxlength="200" type="text" required="required" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="أكثر عدد حضور قادة " dir="rtl" v-model="max_cap_pres"/>
                    </div>


                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">أضعف عدد حضور قادة  </label>
                        <input  maxlength="200" type="text" required="required" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="أضعف عدد حضور قادة " dir="rtl" v-model="min_scout_pres"/>
                    </div>


                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">مجموع مصاريف الشهر  </label>
                        <input  maxlength="200" type="text" required="required"  placeholder="مجموع مصاريف الشهر " dir="rtl" v-model="total_monthly_expenses"/>
                    </div>


                    <div  class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: right">وضعية مالية الوحدة  </label>
                        <input  maxlength="200" type="text" required="required"  placeholder="وضعية مالية الوحدة " dir="rtl" v-model="unit_fin_pos"/>
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
                                    <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="first_sport" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
                                </div>
                                <div  >
                                    <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="first_sport_cap_pres" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder=" القادة الحاضرون" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                        <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                    </multiselect>
                                </div>
                            </div>
                            <div  class="col-md-6" >
                                <label style="font-size: medium;text-align: right">النشاط الأول  </label>
                                <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="first_activity" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
                                <div  >
                                    <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="first_activ_cap_pres" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder=" القادة الحاضرون" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                        <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                    </multiselect>
                                </div>

                            </div>

                        </div>
                        <div class="row" style="padding-bottom: 10px;padding-top: 10px">

                            <div class="col-md-6">
                                <div >
                                    <label style="font-size: medium;text-align: right">الرياضة الثانية </label>
                                    <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="second_sport" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
                                </div>
                                <div  >
                                    <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="second_sport_cap_pres" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder=" القادة الحاضرون" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                        <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                    </multiselect>
                                </div>
                            </div>
                            <div  class="col-md-6" >
                                <label style="font-size: medium;text-align: right">النشاط الثاني  </label>
                                <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="second_activity" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
                                <div  >
                                    <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="second_activ_cap_pres" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder=" القادة الحاضرون" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                        <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                    </multiselect>
                                </div>

                            </div>

                        </div>
                        <div class="row" style="padding-bottom: 10px;padding-top: 10px">

                            <div class="col-md-6">
                                <div >
                                    <label style="font-size: medium;text-align: right">الرياضة الثالثة </label>
                                    <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="third_sport" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
                                </div>
                                <div  >
                                    <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="third_sport_cap_pres" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder=" القادة الحاضرون" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                        <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                    </multiselect>
                                </div>
                            </div>
                            <div  class="col-md-6" >
                                <label style="font-size: medium;text-align: right">النشاط الثالث  </label>
                                <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="third_activity" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
                                <div  >
                                    <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="third_activ_cap_pres" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder=" القادة الحاضرون" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                        <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                    </multiselect>
                                </div>

                            </div>

                        </div>
                        <div class="row" style="padding-bottom: 10px;padding-top: 10px">

                            <div class="col-md-6">
                                <div >
                                    <label style="font-size: medium;text-align: right">الرياضة الرابعة </label>
                                    <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="fourth_sport" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
                                </div>
                                <div  >
                                    <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="fourth_sport_cap_pres" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder=" القادة الحاضرون" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                        <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                    </multiselect>
                                </div>
                            </div>
                            <div  class="col-md-6" >
                                <label style="font-size: medium;text-align: right">النشاط الرابع  </label>
                                <datetime type="date" :dir="direction" :placeholder="placeholder" :value-zone="value"  v-model="fourth_activity" format="yyyy/MM/dd " style="margin-right:-10px;margin-left:10px"></datetime>
                                <div  >
                                    <multiselect style="border: 1px solid #9C9C9C;border-radius: 7px;" v-model="fourth_activ_cap_pres" :options="Captains" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" placeholder=" القادة الحاضرون" :custom-label="customLabel" :show-labels="false"  track-by="last_name" :preselect-first="true">

                                        <template slot="tag" slot-scope="props"><span class="multiselect__tag" style="padding-right:5px" ><span style="padding-right:5px;">{{props.option.last_name}} {{props.option.first_name}}  </span><span class="custom__remove" style="cursor: pointer;" @click="props.remove(props.option)">❌</span></span></template>

                                    </multiselect>
                                </div>

                            </div>

                        </div>




                    </div>































                    <div class="form-group" style="padding-bottom: 10px;padding-top: 10px">
                        <label style="font-size: medium;text-align: center">بعض المقترحات للشهر القادم الى إدارة الفوج  </label>
                        <div style="padding-bottom: 10px;padding-top: 10px">
                            <div id="few-proposals">
                                <input  id="proposal1" maxlength="200" type="text" required="required"  placeholder="مقترح" dir="rtl" />

                            </div>
                            <button  class="btn btn-primary a-btn-slide-text"  v-on:click="add('few-proposals','مقترح')">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

                            </button>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-6">
                            <label style="float:right;font-size: medium">
                                اسم {{young_leader}}
                            </label>
                            <input  id="last_name" maxlength="200" type="text"   placeholder="الاسم" dir="rtl" v-model="last_name"/>

                        </div>
                        <div class="col-md-6">
                            <label style="float:right;font-size: medium">
                                لقب {{young_leader}}
                            </label>
                            <input  id="first_name" maxlength="200" type="text"   placeholder="اللقب" dir="rtl"  v-model="first_name"/>

                        </div>

                    </div>

                </div>
                <button  class="btn btn-primary a-btn-slide-text" style="text-align: center" @click="downloadReport('send')">
                    <span>ارسال التقرير</span>
                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>

                </button>
                <button  class="btn btn-primary a-btn-slide-text" style="text-align: center" @click="downloadReport('download')">
                <span>تحميل</span>
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span>

            </button>

            </div>
            <sweet-modal icon="success" ref="send_successfully">
                <h3>تم ارسال التقرير بنجاح تام</h3>
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
            LEAD_sp3_PR=1,LEAD_sp4_PR=1,
            proposal=1;
        export default {
            name: "NewRapport",
            components: {
                Multiselect,
                loading
            },
            created:function(){


                var vm = this;
                axios.get('/api/getCaptains').then(function (response) {

                    vm.Captains = response.data.captain[0];
                    vm.current_user_unit = response.data.captain[2];
                    if(vm.current_user_unit.localeCompare('cubs')===0)
                        vm.young_leader = "السدوس الأكبر";
                    else{
                        if(vm.current_user_unit.localeCompare('sct')===0 || vm.current_user_unit.localeCompare('asct')===0)
                            vm.young_leader = "العريف الأكبر";
                        else{
                            if(vm.current_user_unit.localeCompare('tvlr')===0)
                                vm.young_leader = "الرائد الأكبر";
                                }
                    }

                });


            },
            data(){
                return{
                    show: false,
                    label: '....الرجاء الإنتظار',
                    EDsubject :1,
                    placeholder:"التاريخ ",
                    direction:'rtl',
                    value:"UTC+2",
                    Captains:[],
                    date:'',
                    date_temp:'',
                    month:'',
                    EDSubjects:[],
                    EDGoals:[],
                    SCSubjects:[],
                    SCGoals:[],
                    CULSubjects:[],
                    CULGoals:[],
                    SKLSubjects:[],
                    SKLGoals:[],
                    SONGSubjects:[],
                    SONGgoals:[],
                    GAMESubjects:[],
                    GAMEGoals:[],
                    arprog_perc:'',
                    max_scout_pres:'',
                    min_scout_pres:'',
                    max_cap_pres:'',
                    min_cap_pres:'',
                    total_monthly_expenses:'',
                    unit_fin_pos:'',

                    first_sport:'',
                    second_sport:'',
                    third_sport:'',
                    fourth_sport:'',

                    first_activity:'',
                    second_activity:'',
                    third_activity:'',
                    fourth_activity:'',

                    first_sport_cap_pres:[],
                    second_sport_cap_pres:[],
                    third_sport_cap_pres:[],
                    fourth_sport_cap_pres:[],

                    first_activ_cap_pres:[],
                    second_activ_cap_pres:[],
                    third_activ_cap_pres:[],
                    fourth_activ_cap_pres:[],

                    Shortages:[],
                    Positives:[],
                    Proposales:[],
                    first_name:'',
                    last_name:'',
                    current_user_unit:'',
                    young_leader:''

                }


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
                    case 'few-proposals':{
                            proposal +=1;
                        input.id="proposal"+proposal;

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
                downloadReport(msg){
                    this.show = true;
                    var vm = this;
                    this.insertData();
                    var date ="",
                        first_sport="",
                        second_sport="",
                        third_sport="",
                        fourth_sport="",
                        first_activity="",
                        second_activity="",
                        third_activity="",
                        fourth_activity="",
                        first_activ_cap_pres= [],
                        second_activ_cap_pres= [],
                        third_activ_cap_pres= [],
                        fourth_activ_cap_pres= [],

                        first_sport_cap_pres= [],
                        second_sport_cap_pres= [],
                        third_sport_cap_pres= [],
                        fourth_sport_cap_pres= [],
                        temp_date,
                        cut_date,

                        i;
                    if(this.date.localeCompare("")!==0){

                        temp_date =this.date.slice(0,10);
                        cut_date = temp_date.split("-");
                        date = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];

                    }

                    if(this.first_activity.localeCompare("")!==0){
                         temp_date =this.first_activity.slice(0,10);
                            cut_date = temp_date.split("-");
                        first_activity = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                    }

                    if(this.second_activity.localeCompare("")!==0){
                         temp_date =this.second_activity.slice(0,10);
                            cut_date = temp_date.split("-");
                        second_activity = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                    }

                      if(this.third_activity.localeCompare("")!==0){
                          temp_date =this.third_activity.slice(0,10);
                          cut_date = temp_date.split("-");
                          third_activity = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];

                      }

                      if(this.fourth_activity.localeCompare("")!==0){
                          temp_date =this.fourth_activity.slice(0,10);
                          cut_date = temp_date.split("-");
                          fourth_activity = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                      }

                      if(this.first_sport.localeCompare("")!==0){
                          temp_date =this.first_sport.slice(0,10);
                          cut_date = temp_date.split("-");
                          first_sport = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                      }

                      if(this.second_sport.localeCompare("")!==0){
                          temp_date =this.second_sport.slice(0,10);
                          cut_date = temp_date.split("-");
                          second_sport = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                      }

                      if(this.third_sport.localeCompare("")!==0){
                          temp_date =this.third_sport.slice(0,10);
                          cut_date = temp_date.split("-");
                          third_sport = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                      }

                      if(this.fourth_sport.localeCompare("")!==0){
                          temp_date =this.fourth_sport.slice(0,10);
                          cut_date = temp_date.split("-");
                          fourth_sport = cut_date[0]+"/"+cut_date[1]+"/"+cut_date[2];
                      }

                    for( i =0;i<this.first_activ_cap_pres.length;i++){
                        first_activ_cap_pres[i] = this.first_activ_cap_pres[i].last_name+" "+this.first_activ_cap_pres[i].first_name;

                    }
                    for( i =0;i<this.second_activ_cap_pres.length;i++){
                        second_activ_cap_pres[i] = this.second_activ_cap_pres[i].last_name+" "+this.second_activ_cap_pres[i].first_name;

                    }
                    for( i =0;i<this.third_activ_cap_pres.length;i++){
                        third_activ_cap_pres[i] = this.third_activ_cap_pres[i].last_name+" "+this.third_activ_cap_pres[i].first_name;

                    }
                    for( i =0;i<this.fourth_activ_cap_pres.length;i++){
                        fourth_activ_cap_pres[i] = this.fourth_activ_cap_pres[i].last_name+" "+this.fourth_activ_cap_pres[i].first_name;

                    }
                    for( i =0;i<this.first_sport_cap_pres.length;i++){
                        first_sport_cap_pres[i] = this.first_sport_cap_pres[i].last_name+" "+this.first_sport_cap_pres[i].first_name;

                    }
                    for( i =0;i<this.second_sport_cap_pres.length;i++){
                        second_sport_cap_pres[i] = this.second_sport_cap_pres[i].last_name+" "+this.second_sport_cap_pres[i].first_name;

                    }
                    for( i =0;i<this.third_sport_cap_pres.length;i++){
                        third_sport_cap_pres[i] = this.third_sport_cap_pres[i].last_name+" "+this.third_sport_cap_pres[i].first_name;

                    }
                    for( i =0;i<this.fourth_sport_cap_pres.length;i++){
                        fourth_sport_cap_pres[i] = this.fourth_sport_cap_pres[i].last_name+" "+this.fourth_sport_cap_pres[i].first_name;

                    }
                    if(msg.localeCompare('download')===0){
                        axios({
                            url:  '/api/manageMonthlyRapportPDF',
                            method: 'PUT',
                            responseType: 'blob',
                            data:{
                                date:date,
                                month : vm.month,
                                first_activity :first_activity,
                                second_activity :second_activity,
                                third_activity :third_activity,
                                fourth_activity :fourth_activity,
                                first_sport :first_sport,
                                second_sport :second_sport,
                                third_sport :third_sport,
                                fourth_sport :fourth_sport,

                                first_activ_cap_pres :first_activ_cap_pres,
                                second_activ_cap_pres :second_activ_cap_pres,
                                third_activ_cap_pres :third_activ_cap_pres,
                                fourth_activ_cap_pres :fourth_activ_cap_pres,

                                first_sport_cap_pres :first_sport_cap_pres,
                                second_sport_cap_pres :second_sport_cap_pres,
                                third_sport_cap_pres :third_sport_cap_pres,
                                fourth_sport_cap_pres :fourth_sport_cap_pres,



                                EDSubjects:vm.EDSubjects,
                                EDGoals:vm.EDGoals,
                                SCSubjects:vm.SCSubjects,
                                SCGoals:vm.SCGoals,
                                CULSubjects:vm.CULSubjects,
                                CULGoals:vm.CULGoals,
                                SKLSubjects:vm.SKLSubjects,
                                SKLGoals:vm.SKLGoals,
                                SONGSubjects:vm.SONGSubjects,
                                SONGgoals:vm.SONGgoals,
                                GAMESubjects:vm.GAMESubjects,
                                GAMEGoals:vm.GAMEGoals,
                                Shortages:vm.Shortages,
                                Positives:vm.Positives,
                                Proposales:vm.Proposales,

                                arprog_perc :vm.arprog_perc,
                                max_scout_pres:vm.max_scout_pres,
                                min_scout_pres:vm.min_scout_pres,
                                max_cap_pres:vm.max_cap_pres,
                                min_cap_pres:vm.min_cap_pres,
                                total_monthly_expenses : vm.total_monthly_expenses,
                                unit_fin_pos : vm.unit_fin_pos,
                                first_name:vm.first_name,
                                last_name : vm.last_name,
                                operation_type:'download'
                            }


                        }).then(function (response) {

                            let blob = new Blob([response.data], { type:  'application/pdf' } );

                            let link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = 'تقرير شهري.pdf';
                            link.click();
                            vm.show = false;






                        });
                    }else{
                        axios({
                            url:  '/api/manageMonthlyRapportPDF',
                            method: 'PUT',
                            data:{
                                date:date,
                                month : vm.month,
                                first_activity :first_activity,
                                second_activity :second_activity,
                                third_activity :third_activity,
                                fourth_activity :fourth_activity,
                                first_sport :first_sport,
                                second_sport :second_sport,
                                third_sport :third_sport,
                                fourth_sport :fourth_sport,

                                first_activ_cap_pres :first_activ_cap_pres,
                                second_activ_cap_pres :second_activ_cap_pres,
                                third_activ_cap_pres :third_activ_cap_pres,
                                fourth_activ_cap_pres :fourth_activ_cap_pres,

                                first_sport_cap_pres :first_sport_cap_pres,
                                second_sport_cap_pres :second_sport_cap_pres,
                                third_sport_cap_pres :third_sport_cap_pres,
                                fourth_sport_cap_pres :fourth_sport_cap_pres,



                                EDSubjects:vm.EDSubjects,
                                EDGoals:vm.EDGoals,
                                SCSubjects:vm.SCSubjects,
                                SCGoals:vm.SCGoals,
                                CULSubjects:vm.CULSubjects,
                                CULGoals:vm.CULGoals,
                                SKLSubjects:vm.SKLSubjects,
                                SKLGoals:vm.SKLGoals,
                                SONGSubjects:vm.SONGSubjects,
                                SONGgoals:vm.SONGgoals,
                                GAMESubjects:vm.GAMESubjects,
                                GAMEGoals:vm.GAMEGoals,
                                Shortages:vm.Shortages,
                                Positives:vm.Positives,
                                Proposales:vm.Proposales,

                                arprog_perc :vm.arprog_perc,
                                max_scout_pres:vm.max_scout_pres,
                                min_scout_pres:vm.min_scout_pres,
                                max_cap_pres:vm.max_cap_pres,
                                min_cap_pres:vm.min_cap_pres,
                                total_monthly_expenses : vm.total_monthly_expenses,
                                unit_fin_pos : vm.unit_fin_pos,
                                first_name:vm.first_name,
                                last_name : vm.last_name,
                                operation_type:'send'
                            }


                        }).then(function (response) {

                            vm.show = false;
                            vm.$refs.send_successfully.open();
                        });
                    }

                },
                customLabel ({ first_name, last_name }) {
                    return ` ${last_name} ${first_name} `
                },
                insertData(){
                   var i;
                    for( i =1;i<=EDsubject;i++){
                        this.EDSubjects[i-1] = $('#EDsubject'+i).val();

                    }
                    for( i =1;i<=EDgoal;i++){
                        this.EDGoals[i-1] = $('#EDgoal'+i).val();

                    }
                    for( i =1;i<=SCsubject;i++){
                        this.SCSubjects[i-1] = $('#SCsubject'+i).val();

                    }
                    for( i =1;i<=SCgoal;i++){
                        this.SCGoals[i-1] = $('#SCgoal'+i).val();

                    }
                    for( i =1;i<=CULsubject;i++){
                        this.CULSubjects[i-1] = $('#CULsubject'+i).val();

                    }
                    for( i =1;i<=CULgoal;i++){
                        this.CULGoals[i-1] = $('#SCgoal'+i).val();

                    }
                    for( i =1;i<=SKLsubject;i++){
                        this.SKLSubjects[i-1] = $('#SKLsubject'+i).val();

                    }
                    for( i =1;i<=SKLgoal;i++){
                        this.SKLGoals[i-1] = $('#SKLgoal'+i).val();

                    }
                    for( i =1;i<=SONGsubject;i++){
                        this.SONGSubjects[i-1] = $('#SONGsubject'+i).val();

                    }
                    for( i =1;i<=SONGgoal;i++){
                        this.SONGgoals[i-1] = $('#SONGgoal'+i).val();

                    }
                    for( i =1;i<=GAMEsubject;i++){
                        this.GAMESubjects[i-1] = $('#GAMEsubject'+i).val();

                    }
                    for( i =1;i<=GAMEgoal;i++){
                        this.GAMEGoals[i-1] = $('#GAMEgoal'+i).val();

                    }

                    for( i =1;i<=shortage;i++){
                        this.Shortages[i-1] = $('#shortage'+i).val();

                    }
                    for( i =1;i<=positive;i++){
                        this.Positives[i-1] = $('#positive'+i).val();

                    }
                    for( i =1;i<=proposal;i++){
                        this.Proposales[i-1] = $('#proposal'+i).val();

                    }
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
    #month{
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
