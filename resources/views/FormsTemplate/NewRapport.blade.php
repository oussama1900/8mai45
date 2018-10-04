<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="css/app.css"/>
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <title>التقرير  الشهري لوحدة {{$data['unit']}}</title>
    <style>
        *{font-size: 14px}
        .text-align-right{
            margin-right:0px
        }
        table, th, td {

            border: 1px solid black;

        }

        table#mainTable {direction:rtl;}
    </style>
</head>
<body>
<div style="margin-right:-60px ;margin-top: -100px;padding-top:-60px">
<img src= src="{{ public_path() .'/images/page_header.jpg' }}" width="100%" height="150px" />


</div>
<div style="text-align: right">
    <p style="text-align: right">
      فوج الفلاح – وحــــــدة {{$data['unit']}}
    </p>

    <p style="text-align: right">
        <span> {{$data['date']}} </span>  :  التاريخ
    </p>

</div>
<div style="margin-left:80px">
    <p>
        إلى السيد المحترم: محافظ فوج الفلاح
    </p>
</div>
<div>
    <p style="text-align: right">

            <span><b>الموضوع:</b></span>      تقرير شهر {{$data['month']}}
    </p>
</div>

<div style="margin-top: 30px">

    <p style="text-align: right">
        يشرفني قائدي الكريم أن أضع بين يديكم تقرير أنشطة شهر {{$data['month']}} لوحدة     {{$data['unit']}} التي أشرف عليـــه.
    </p>
</div>
<div>
    <table id="mainTable" width="100%">

        <tr>

            <td width="20%"></td>

            <td width="40%">المواضيع المقدمة</td>

            <td width="40%">الأهداف المحققة</td>



        </tr>

        <tr>

            <td>الجانب التربوي</td>
            <td >
                @for($i=0;$i<count($EDSubjects);$i++)
                    <p> - {{$EDSubjects[$i]}} </p>
                    @endfor


            </td>

            <td   >
                @for($i=0;$i<count($EDGoals);$i++)
                    <p> - {{$EDGoals[$i]}} </p>
                @endfor


            </td>






        </tr>

        <tr>

            <td>الجانب الكشفي</td>
            <td>
                @for($i=0;$i<count($SCSubjects);$i++)
                    <p> - {{$SCSubjects[$i]}} </p>
                @endfor


            </td>

            <td>
                @for($i=0;$i<count($SCGoals);$i++)
                    <p> - {{$SCGoals[$i]}} </p>
                @endfor


            </td>






        </tr>

        <tr>

            <td>الجانب الثقافي</td>
            <td>
                @for($i=0;$i<count($CULSubjects);$i++)
                    <p> - {{$CULSubjects[$i]}} </p>
                @endfor


            </td>

            <td>
                @for($i=0;$i<count($CULGoals);$i++)
                    <p> - {{$CULGoals[$i]}} </p>
                @endfor


            </td>






        </tr>


        <tr>

            <td>الجانب المهاراتي (خصوصا الجوالة ) </td>
            <td>
                @for($i=0;$i<count($SKLSubjects);$i++)
                    <p> - {{$SKLSubjects[$i]}} </p>
                @endfor


            </td>

            <td>
                @for($i=0;$i<count($SKLGoals);$i++)
                    <p> - {{$SKLGoals[$i]}} </p>
                @endfor


            </td>






        </tr>
        <tr>

            <td>الأناشيد </td>
            <td>
                @for($i=0;$i<count($SONGSubjects);$i++)
                    <p> - {{$SONGSubjects[$i]}} </p>
                @endfor


            </td>

            <td>
                @for($i=0;$i<count($SONGgoals);$i++)
                    <p> - {{$SONGgoals[$i]}} </p>
                @endfor


            </td>






        </tr>
 <tr>

            <td>الألعـــاب </td>
            <td>
                @for($i=0;$i<count($GAMESubjects);$i++)
                    <p> - {{$GAMESubjects[$i]}} </p>
                @endfor


            </td>

            <td>
                @for($i=0;$i<count($GAMEGoals);$i++)
                    <p> - {{$GAMEGoals[$i]}} </p>
                @endfor


            </td>






        </tr>






    </table>
    <h4 style="text-align: right">احصائيات عامة</h4>
    <table style="width:100%;" dir="rtl">
        <tr>
            <td width="50%" style="padding: 5px">  نسبة تطبيق البرنامج العربي </td>
            <td width="50%"  style="padding: 5px"> % {{$data['arprog_perc']}} </td>
        </tr>
        <tr>
            <td width="50%"  style="padding: 5px">  أكثر عدد حضور كشافين  </td>
            <td width="50%"  style="padding: 5px"> {{$data['max_scout_pres']}} </td>
        </tr>
        <tr>
            <td width="50%"  style="padding: 5px"> أضعف عدد حضور كشافين  </td>
            <td width="50%"  style="padding: 5px"> {{$data['min_scout_pres']}} </td>
        </tr>
        <tr>
            <td width="50%"  style="padding: 5px"> أكثر عدد حضور قادة    </td>
            <td width="50%"  style="padding: 5px"> {{$data['max_cap_pres']}} </td>
        </tr>
        <tr>
            <td width="50%"  style="padding: 5px"> أضعف عدد حضور قادة    </td>
            <td width="50%"  style="padding: 5px"> {{$data['min_cap_pres']}} </td>
        </tr>
        <tr>
            <td width="50%"  style="padding: 5px"> مجموع مصاريف الشهر </td>
            <td width="50%"  style="padding: 5px"> {{$data['total_monthly_expenses']}} </td>
        </tr>
        <tr>
            <td width="50%"  style="padding: 5px">وضعية مالية الوحدة</td>
            <td width="50%"  style="padding: 5px"> {{$data['unit_fin_pos']}} </td>
        </tr>
    </table>

    <h4 style="text-align: right;">تقييم العمل</h4>
    <table width="100%" dir="rtl">
        <tr>
            <td style="text-align: center">إيجابيات</td>
            <td style="text-align: center">نقائص</td>
        </tr>
        <tr>
            <td>
                @for($i=0;$i<count($Shortages);$i++)
                    <p> - {{$Shortages[$i]}} </p>
                @endfor
            </td>
            <td>
                @for($i=0;$i<count($Positives);$i++)
                    <p> - {{$Positives[$i]}} </p>
                @endfor

            </td>
        </tr>

    </table>
    <h4 style="text-align: right">مداومة قادة الوحدة </h4>
    <table width="100%" dir="rtl">
        <tr>
          <td width="25%">النشاط</td>
          <td width="25%">القادة الحاضرون</td>
          <td width="25%">الرياضة</td>
          <td width="25%">القادة الحاضرون</td>
        </tr>
        <tr>
            <td style="text-align: center">
                <p>النشاط الأول</p>
                @if($data['first_activity_date']=="" )
                    <p>..../...../......</p>
                @else
                <p> {{$data['first_activity_date']}} </p>
                    @endif
            </td>
            <td>
                @for($i=0;$i<count($first_activ_cap_pres);$i++)
                <p> - {{$first_activ_cap_pres[$i]}} </p>
                    @endfor

            </td>
            <td style="text-align: center">
                <p>الرياضة الأولى</p>
                @if($data['first_sport_date']=="" )
                    <p>..../...../......</p>
                @else
                <p> {{$data['first_sport_date']}} </p>
                @endif
            </td>
            <td>
                @for($i=0;$i<count($first_sport_cap_pres);$i++)
                    <p> - {{$first_sport_cap_pres[$i]}} </p>
                @endfor
            </td>
        </tr>

        <tr>
            <td style="text-align: center">
                <p>النشاط الثاني</p>
                @if($data['second_activity_date']=="" )
                    <p>..../...../......</p>
                @else
                <p> {{$data['second_activity_date']}} </p>
                @endif
            </td>
            <td>
                @for($i=0;$i<count($second_activ_cap_pres);$i++)
                    <p> - {{$second_activ_cap_pres[$i]}} </p>
                @endfor
            </td>
            <td style="text-align: center">
                <p>الرياضة الثانية</p>
                @if($data['second_sport_date']=="" )
                    <p>..../...../......</p>
                @else
                <p> {{$data['second_sport_date']}} </p>
                    @endif
            </td>
            <td>
                @for($i=0;$i<count($second_sport_cap_pres);$i++)
                    <p> - {{$second_sport_cap_pres[$i]}} </p>
                @endfor
            </td>
        </tr>



        <tr>
            <td style="text-align: center">
                <p>النشاط الثالث</p>
                @if($data['third_activity_date']=="" )
                    <p>..../...../......</p>
                @else
                <p> {{$data['third_activity_date']}} </p>
                    @endif
            </td>
            <td>
                @for($i=0;$i<count($third_activ_cap_pres);$i++)
                    <p> - {{$third_activ_cap_pres[$i]}} </p>
                @endfor
            </td>
            <td style="text-align: center">
                <p>الرياضة الثالثة</p>
                @if($data['third_sport_date']=="" )
                    <p>..../...../......</p>
                @else
                <p> {{$data['third_sport_date']}} </p>
                    @endif
            </td>
            <td>
                @for($i=0;$i<count($third_sport_cap_pres);$i++)
                    <p> - {{$third_sport_cap_pres[$i]}} </p>
                @endfor
            </td>
        </tr>


        <tr>
            <td style="text-align: center">
                <p>النشاط الرابع</p>
                @if($data['fourth_activity_date']=="" )
                    <p>..../...../......</p>
                @else
                <p> {{$data['fourth_activity_date']}} </p>
                    @endif
            </td>
            <td>
                @for($i=0;$i<count($fourth_activ_cap_pres);$i++)
                    <p> - {{$fourth_activ_cap_pres[$i]}} </p>
                @endfor
            </td>
            <td style="text-align: center">
                <p>الرياضة الرابعة</p>
                @if($data['fourth_sport_date']=="" )
                    <p>..../...../......</p>
                @else
                <p> {{$data['fourth_sport_date']}} </p>
                    @endif
            </td>
            <td>
                @for($i=0;$i<count($fourth_sport_cap_pres);$i++)
                    <p> - {{$fourth_sport_cap_pres[$i]}} </p>
                @endfor
            </td>
        </tr>
    </table>
    <h4 style="text-align: right">
        (بعض المقترحات للشهر القادم الى إدارة الفوج (محافظ الفوج
    </h4>
    @if( (count($Proposales)==1) && ($Proposales[0]=="" ))
        <p style="text-align: right">….............................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................</p>
    @else
    @for($i=0;$i<count($Proposales);$i++)
        <p> {{count($Proposales)}} </p>
        <p style="text-align:right">  {{$Proposales[$i]}} - </p>
    @endfor
@endif


    <p style="text-align: center;margin-bottom:40px">
        وفي الأخير تقبلوا مني قائدي الكريم أسمى عبارات الشكر والتقدير
    </p>
    <table style="border: 0px solid white;margin-bottom: 50px" width="100%">
        <tr style="border: 0px solid white">
            <td width="50%"  style="border: 0px solid white;text-align: center">قائد الوحدة</td>
            @if($data['report_unit']=="cubs")
            <td  width="50%" style="border: 0px solid white;text-align: center">
                <p> السدوس  الأكبر</p>
                <p>{{$data['last_name']}} {{$data['first_name']}}</p>
            </td>
            @endif
            @if($data['report_unit']=="sct" || $data['report_unit']=="asct")
                    <td  width="50%" style="border: 0px solid white;text-align: center">
                        <p>العريف  الأكبر</p>
                        <p>{{$data['last_name']}} {{$data['first_name']}}</p>
                    </td>
                @endif
                @if($data['report_unit']=="tvlr")
                        <td  width="50%" style="border: 0px solid white;text-align: center">
                         <p> الرائد  الأكبر</p>
                            <p>{{$data['last_name']}} {{$data['first_name']}}a</p>


                        </td>
                @endif


        </tr>
    </table>
    <table width="100%" dir="rtl" style="margin-top: 50px">
        <tr>
            <td style="padding: 10px;padding-bottom: 60px;text-align: center">
                <u>تأشيرة الوصول</u>
            </td>
            <td style="padding: 10px;padding-bottom: 60px;text-align: center">
                <u>مسؤول متابعة البرامج</u>
            </td>
            <td style="padding: 10px;padding-bottom: 60px;text-align: center">
                <u>مسؤول الإدارة والتنظيم</u>
            </td>
            <td style="padding: 10px;padding-bottom: 60px;text-align: center">
                <u>
                    قائد الفوج
                </u>
            </td>
        </tr>
    </table>
</div>






<footer style="position:absolute;left:45px;bottom:0px;margin-left:-60px">
    <img src= src="{{ public_path() .'/images/page_footer.jpg' }}" width="100%" height="150px" />
</footer>

<div>

</div>
</body>
</html>
