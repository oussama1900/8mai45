<template>

    <div id = "app" class="container col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px">

    <div class="card-body">


   <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-6 col-md-6">
                <a href="#step-1"  class="btn btn-success btn-circle header-title"  >1</a>
                <p><small class="header-title">نوع الاستمارة</small></p>
            </div>
            <div class="stepwizard-step col-xs-6 col-md-6">
                <a href="#step-2"  class="btn btn-default btn-circle header-title" disabled="true">2</a>
                <p><small class="header-title">ملء الاستمارة</small></p>
            </div>

        </div>
    </div>

    <form role="form">
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading" style="    border-top-left-radius:7px ;    border-top-right-radius:7px">
                <h3 class="panel-title header-title" >نوع الاستمارة</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">

                   <div style="margin :20px">
                    <select  id="forms" class="form-control header-title" dir="rtl" >
                        <option class="header-title">	الاجتماع الشرفي</option>
                        <option class="header-title">	تكليف بمهمة</option>
                        <option class="header-title">	 محضر تنصيب </option>
                       <!-- <option class="header-title">	مراسلة الامن</option>
                        <option class="header-title">	مراسلة المؤسسات التربوية</option>-->
                        <option class="header-title">	مراسلة البريد الصادر</option>
                        <!-- <option class="header-title">	مراسلة المحافظ الولائي</option>
                         <option class="header-title">	نموذج التأمين </option>-->
                     </select>
                 </div>

                 </div>

                 <button class="btn btn-primary nextBtn pull-right header-title" type="button">التالي</button>
             </div>
         </div>

         <div class="panel panel-primary setup-content" id="step-2" >
             <div class="panel-heading">
                 <h3 class="panel-title header-title" >ملء الاستمارة</h3>
             </div>
             <div  class="panel-body">

                 <!--  <div id="Reporter-state-scout" v-if="Reporter_state_scout">
                      <reporter-state-scout ></reporter-state-scout>
                  </div>-->
                  <div id="Honorary-meeting" v-if="Honorary_meeting">
                      <Honorary-meeting></Honorary-meeting>
                  </div>

                  <div id="Assigning_mission" v-if="Assigning_mission">
                      <Assigning-mission></Assigning-mission>
                  </div>

                  <!-- <div id="Security_reporter" v-if="Security_reporter">
                       <Security-reporter></Security-reporter>
                   </div>-->
                  <div id="Inauguration" v-if="Inauguration">
                      <Inauguration></Inauguration>
                  </div>
                <!--  <div id="Educational_Institutions" v-if="Educational_Institutions">
                      <Educational-Institutions></Educational-Institutions>
                  </div>-->
                 <div id="Outgoing_mail" v-if="Outgoing_mail">
                     <Outgoing-mail></Outgoing-mail>
                 </div>

             </div>
         </div>




     </form>
 </div>
     </div>
 </template>

 <script>
     import Camping_request from "./forms/Camping_request";






     export default {
         components: {Camping_request},
         data(){
           return{
               Reporter_state_scout:false,
               Honorary_meeting:false,
               Assigning_mission:false,
               Security_reporter:false,
               Inauguration:false,
               Educational_Institutions:false,
               Outgoing_mail:false,

           }
         },
         mounted:function(){
             var vm = this;
             var forms;
             $(document).ready(function () {

                 var navListItems = $('div.setup-panel div a'),
                     allWells = $('.setup-content'),
                     allNextBtn = $('.nextBtn');

                 allWells.hide();

                 navListItems.click(function (e) {
                     e.preventDefault();
                     var $target = $($(this).attr('href')),
                         $item = $(this);

                     if (!$item.hasClass('disabled')) {
                         navListItems.removeClass('btn-success').addClass('btn-default');
                         $item.addClass('btn-success');
                         allWells.hide();
                         $target.show();
                         $target.find('input:eq(0)').focus();
                     }
                 });

                 allNextBtn.click(function () {
                     forms=$('#forms').val();
                     var curStep = $(this).closest(".setup-content"),
                         curStepBtn = curStep.attr("id"),
                         nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                         curInputs = curStep.find("input[type='text'],input[type='url']"),
                         isValid = true;
                       if(curStepBtn.localeCompare('step-1')===0){
                          vm.showforms(forms)
                       }


                     if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
                 });

                 $('div.setup-panel div a.btn-success').trigger('click');
             });
         },
         methods:{
             showforms(form){
         switch (form){
             case 'مراسلة المحافظ الولائي':{
                 this.Reporter_state_scout=true;
                 this.Honorary_meeting=false;
                 this.Assigning_mission=false;
                 this.Security_reporter=false;
                 this.Inauguration=false;
                 this.Educational_Institutions=false;
                 this.Outgoing_mail=false;
                 break;
             }


             case 'الاجتماع الشرفي':{
                 this.Reporter_state_scout=false;
                 this.Honorary_meeting=true;
                 this.Assigning_mission=false;
                 this.Security_reporter=false;
                 this.Inauguration=false;
                 this.Educational_Institutions=false;
                 this.Outgoing_mail=false;

                 break;
             }

             case 'تكليف بمهمة':{
                 this.Reporter_state_scout=false;
                 this.Honorary_meeting=false;
                 this.Assigning_mission=true;
                 this.Security_reporter=false;
                 this.Inauguration=false;
                 this.Educational_Institutions=false;
                 this.Outgoing_mail=false;


                 break;
             }

             case 'مراسلة الامن':{
                 this.Reporter_state_scout=false;
                 this.Honorary_meeting=false;
                 this.Assigning_mission=false;
                 this.Security_reporter=true;
                 this.Inauguration=false;
                 this.Educational_Institutions=false;
                 this.Outgoing_mail=false;

                 break;
             }
             case 'محضر تنصيب':{
                 this.Reporter_state_scout=true;
                 this.Honorary_meeting=false;
                 this.Assigning_mission=false;
                 this.Security_reporter=false;
                 this.Inauguration=false;
                 this.Educational_Institutions=false;
                 this.Outgoing_mail=false;


                 break;
             }
             case 'مراسلة المؤسسات التربوية':{
                 this.Reporter_state_scout=false;
                 this.Honorary_meeting=false;
                 this.Assigning_mission=false;
                 this.Security_reporter=false;
                 this.Inauguration=false;
                 this.Educational_Institutions=true;
                 this.Outgoing_mail=false;



                 break;
             }
             case 'مراسلة البريد الصادر':{
                 this.Reporter_state_scout=false;
                 this.Honorary_meeting=false;
                 this.Assigning_mission=false;
                 this.Security_reporter=false;
                 this.Inauguration=false;
                 this.Educational_Institutions=false;
                 this.Outgoing_mail=true;




                 break;
             }

         }
     }
         }
     }
 </script>

 <style>
     .btn-circle{
         width: 30px !important;
         height: 30px !important;
         text-align: center !important;
         padding: 6px 0 !important;
         font-size: 12px !important;
         line-height: 1.428571429 !important;
         border-radius: 15px !important;
     }
     .card{
         margin-top:6%;
         margin-left: 40px;


     }
     /*the small size*/
     @media (max-width: 480px) {
         .icon {
             width: 70px;
             height: 70px;
         }

         .card{
             margin-top: 17%;
             margin-left: 16px;
         }
     }

     /*the medium size*/
     @media (max-width: 720px) {
         .icon {
             width: 70px;
             height: 70px;
         }

         .card{
             margin-top: 25%;
             margin-left: 25px;
         }
     }


     body {
         margin-top:30px;
     }
     .stepwizard-step p {
         margin-top: 0px;
         color:#666;
     }
     .stepwizard-row {
         display: table-row;
     }
     .stepwizard {
         display: table;
         width: 100%;
         position: relative;
     }
     .stepwizard-step button[disabled] {
         /*opacity: 1 !important;
         filter: alpha(opacity=100) !important;*/
     }
     .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
         opacity:1 !important;
         color:#bbb;
     }
     .stepwizard-row:before {
         top: 14px;
         bottom: 0;
         position: center;
         content:" ";
         width: 100%;
         height: 1px;
         background-color: #ccc;
         z-index: 0;
     }
     .stepwizard-step {
         display: table-cell;
         text-align: center;
         position: relative;
     }
     .btn-circle {
         width: 30px;
         height: 30px;
         text-align: center;
         padding: 6px 0;
         font-size: 12px;
         line-height: 1.428571429;
         border-radius: 15px;
     }
     form{
         border:1px solid #428BCA;
         border-radius:10px;
     }
     #forms{
         border: 1px solid #9C9C9C;
         border-radius: 7px;

     }
     .header-title{
         font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

     }
     .header{
         background-color: rgb(51, 181, 229);
         backdrop-filter: blur(5px);
         border-top-left-radius: 4px;
         border-top-right-radius: 4px;

     }
     .header .title{
         color:white;
         font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

     }
 </style>
