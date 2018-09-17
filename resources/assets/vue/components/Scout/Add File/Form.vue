<template>

    <div id = "app" class="container col-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px">
<div class="card-body">


   <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3 col-md-6">
                <a href="#step-1"  class="btn btn-success btn-circle"  >1</a>
                <p><small>نوع الاستمارة</small></p>
            </div>
            <div class="stepwizard-step col-xs-3 col-md-6">
                <a href="#step-2"  class="btn btn-default btn-circle" disabled="true">2</a>
                <p><small>ملء الاستمارة</small></p>
            </div>

        </div>
    </div>

    <form role="form">
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading" style="    border-top-left-radius:7px ;    border-top-right-radius:7px">
                <h3 class="panel-title">نوع الاستمارة</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">

                   <div style="margin :20px">
                    <select id="forms" class="form-control" dir="rtl" >
                        <option>	الاجتماع الشرفي</option>
                        <option>	التخييم</option>
                        <option>	التكليف بمهمة</option>
                        <option>	التكليف بمهمة(رحلة)</option>
                        <option>	 محضر تنصيب </option>
                        <option>	مراسلة الامن</option>
                        <option>	مراسلة المؤسسات التربوية</option>
                        <option>	مراسلة البريد الصادر</option>
                        <option>	مراسلة المحافظ الولائي</option>
                        <option>	نموذج التأمين </option>
                    </select>
                </div>

                </div>

                <button class="btn btn-primary nextBtn pull-right" type="button">التالي</button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-2" >
            <div class="panel-heading">
                <h3 class="panel-title">ملء الاستمارة</h3>
            </div>
            <div  class="panel-body">

                <div id="Reporter-state-scout">
                    <reporter-state-scout></reporter-state-scout>
                </div>
                <div id="Honorary-meeting">
                    <Honorary-meeting></Honorary-meeting>
                </div>
                <div id="Camping_request">
                    <Camping-request></Camping-request>
                </div>
                <div id="Assigning_mission">
                    <Assigning-mission></Assigning-mission>
                </div>
                <div id="Assigning_mission_travel">
                    <Assigning-mission-travel></Assigning-mission-travel>
                </div>
                <div id="Security_reporter">
                    <Security-reporter></Security-reporter>
                </div>
                <div id="Inauguration">
                    <Inauguration></Inauguration>
                </div>
                <div id="Educational_Institutions">
                    <Educational-Institutions></Educational-Institutions>
                </div>
                <div id="Outgoing_mail">
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




function showforms(form){
    switch (form){
        case 'مراسلة المحافظ الولائي':{
            $('#Reporter-state-scout').show();
            $('#Honorary-meeting').hide();
            $('#Camping_request').hide();
            $('#Assigning_mission').hide();
            $('#Assigning_mission_travel').hide();
            $('#Security_reporter').hide();
            $('#Inauguration').hide();
            $('#Educational_Institutions').hide();
            $('#Outgoing_mail').hide();
            break;
        }


        case 'الاجتماع الشرفي':{
            $('#Honorary-meeting').show();
            $('#Reporter-state-scout').hide();
            $('#Camping_request').hide();
            $('#Assigning_mission').hide();
            $('#Assigning_mission_travel').hide();
            $('#Security_reporter').hide();
            $('#Inauguration').hide();
            $('#Educational_Institutions').hide();
            $('#Outgoing_mail').hide();

            break;
        }
        case 'التخييم':{
            $('#Camping_request').show();
            $('#Reporter-state-scout').hide();
            $('#Honorary-meeting').hide();
            $('#Assigning_mission').hide();
            $('#Assigning_mission_travel').hide();
            $('#Security_reporter').hide();
            $('#Inauguration').hide();
            $('#Educational_Institutions').hide();
            $('#Outgoing_mail').hide();

            break;
        }
        case 'التكليف بمهمة':{
            $('#Camping_request').hide();
            $('#Reporter-state-scout').hide();
            $('#Honorary-meeting').hide();
            $('#Assigning_mission').show();
            $('#Assigning_mission_travel').hide();
            $('#Security_reporter').hide();
            $('#Inauguration').hide();
            $('#Educational_Institutions').hide();
            $('#Outgoing_mail').hide();

            break;
        }
        case 'التكليف بمهمة(رحلة)':{
            $('#Camping_request').hide();
            $('#Reporter-state-scout').hide();
            $('#Honorary-meeting').hide();
            $('#Assigning_mission').hide();
            $('#Assigning_mission_travel').show();
            $('#Security_reporter').hide();
            $('#Inauguration').hide();
            $('#Educational_Institutions').hide();
            $('#Outgoing_mail').hide();

            break;
        }
        case 'مراسلة الامن':{
            $('#Camping_request').hide();
            $('#Reporter-state-scout').hide();
            $('#Honorary-meeting').hide();
            $('#Assigning_mission').hide();
            $('#Assigning_mission_travel').hide();
            $('#Security_reporter').show();
            $('#Inauguration').hide();
            $('#Educational_Institutions').hide();
            $('#Outgoing_mail').hide();

            break;
        }
        case 'محضر تنصيب':{
            $('#Camping_request').hide();
            $('#Reporter-state-scout').hide();
            $('#Honorary-meeting').hide();
            $('#Assigning_mission').hide();
            $('#Assigning_mission_travel').hide();
            $('#Security_reporter').hide();
            $('#Inauguration').show();
            $('#Educational_Institutions').hide();
            $('#Outgoing_mail').hide();


        break;
    }
        case 'مراسلة المؤسسات التربوية':{
            $('#Camping_request').hide();
            $('#Reporter-state-scout').hide();
            $('#Honorary-meeting').hide();
            $('#Assigning_mission').hide();
            $('#Assigning_mission_travel').hide();
            $('#Security_reporter').hide();
            $('#Inauguration').hide();
            $('#Educational_Institutions').show();
            $('#Outgoing_mail').hide();



            break;
        }
        case 'مراسلة البريد الصادر':{
            $('#Camping_request').hide();
            $('#Reporter-state-scout').hide();
            $('#Honorary-meeting').hide();
            $('#Assigning_mission').hide();
            $('#Assigning_mission_travel').hide();
            $('#Security_reporter').hide();
            $('#Inauguration').hide();
            $('#Educational_Institutions').hide();
            $('#Outgoing_mail').show();




            break;
        }

    }
}

    export default {
        components: {Camping_request},
        created:function(){
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
                          showforms(forms)
                      }


                    if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
                });

                $('div.setup-panel div a.btn-success').trigger('click');
            });
        },
        methods:{

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
</style>
