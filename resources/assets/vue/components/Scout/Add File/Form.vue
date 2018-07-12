<template>

    <div id = "app" class="containercol-md-11 col-sm-11 col-xs-11 text-center card" style="padding-left: 0px;padding-right: 0px">
<div class="card-body">

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3">
                <a href="#step-1" type="button" class="btn btn-success btn-circle" >1</a>
                <p><small>نوع الاستمارة</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>ملء الاستمارة</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>التحقق من المعلومات</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>حفظ الاستمارة</small></p>
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
                        <option>	اللقاء الاداري</option>
                        <option>	الهيكلة</option>
                        <option>	طلب تخييم</option>
                        <option>	مراسلات الامن</option>
                        <option>	مراسلات المؤسسات التربوية</option>
                        <option>	مراسلة البريد الصادر</option>
                        <option>	مراسلة المحافظ الولائي</option>
                        <option>	نموذج التأمين </option>
                    </select>
                </div>

                </div>

                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
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
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                <h3 class="panel-title">التحقق من المعلومات</h3>
            </div>
            <div class="panel-body">
                <div>
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                    </div>
                </div>

                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                <h3 class="panel-title">حفظ الاستمارة</h3>
            </div>
            <div class="panel-body">
                <div>
                    <div class="form-group">
                        <label class="control-label">Company Name</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Company Address</label>
                        <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                    </div>
                </div>

                <button class="btn btn-success pull-right" type="submit">Finish!</button>
            </div>
        </div>
    </form>
</div>
    </div>
</template>

<script>
    import Camping_request from "./forms/Camping_request";
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
             forms=document.getElementById('forms').value;

            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;
                 if(curStepBtn="step-1"){
                     showforms(forms);
                 }

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-success').trigger('click');
    });


function showforms(form){
    switch (form){
        case 'مراسلة المحافظ الولائي':{
            document.getElementById('Reporter-state-scout').style.display="inline";
            document.getElementById('Honorary-meeting').style.display="none";
            document.getElementById('Camping_request').style.display="none";
            document.getElementById('Assigning_mission').style.display="none";
            document.getElementById('Assigning_mission_travel').style.display="none";
            break;
        }


        case 'الاجتماع الشرفي':{
            document.getElementById('Honorary-meeting').style.display="inline";
            document.getElementById('Reporter-state-scout').style.display="none";
            document.getElementById('Camping_request').style.display="none";
            document.getElementById('Assigning_mission').style.display="none";
            document.getElementById('Assigning_mission_travel').style.display="none";
            break;
        }
        case 'التخييم':{
            document.getElementById('Camping_request').style.display="inline";
            document.getElementById('Honorary-meeting').style.display="none";
            document.getElementById('Reporter-state-scout').style.display="none";
            document.getElementById('Assigning_mission').style.display="none";
            document.getElementById('Assigning_mission_travel').style.display="none";
            break;
        }
        case 'التكليف بمهمة':{
            document.getElementById('Assigning_mission').style.display="inline";
            document.getElementById('Camping_request').style.display="none";
            document.getElementById('Honorary-meeting').style.display="none";
            document.getElementById('Reporter-state-scout').style.display="none";
            document.getElementById('Assigning_mission_travel').style.display="none";

            break;
        }
        case 'التكليف بمهمة(رحلة)':{
            document.getElementById('Assigning_mission_travel').style.display="inline";
            document.getElementById('Assigning_mission').style.display="none";
            document.getElementById('Camping_request').style.display="none";
            document.getElementById('Honorary-meeting').style.display="none";
            document.getElementById('Reporter-state-scout').style.display="none";


            break;
        }

    }
}
    export default {
        components: {Camping_request}
    }
</script>

<style>
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
</style>
