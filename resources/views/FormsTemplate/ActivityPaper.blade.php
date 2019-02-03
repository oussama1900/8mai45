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
    <title>ورقة النشاط</title>
    <style>
        *{
            font-size: 14px;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
        }
        .text-align-right{
            margin-right:0px
        }
        @page {

            margin-top:200px;
            margin-right: 0px;
            margin-left: 0px;

            margin-bottom: 200px;
            header: page-header;
            footer: page-footer;

        }
    </style>
</head>
<body>
<htmlpageheader name="page-header" style="display:block;position:absolute;top:0;margin-right:-120px ;float:right;margin-top: -100px;padding-top:-60px">
    <img src= src="{{ public_path() .'/images/page_header.png' }}" width="100%" height="180px" style="margin-top: -35px;"/>


</htmlpageheader>
<div style="margin-right: 60px;margin-left: 60px">
<div>

    <h3 style="text-align: center">ورقة النشاط</h3>

</div>
<div>
<div>
    <table  style="float:right;width: 100%;margin-bottom: 30px" dir="rtl" >
        <tr style="text-align:right;float:right" dir="rtl">
            <td> التاريخ : {{$data['date']}}</td>
            <td> الساعة : {{$data['time']}}</td>
            <td> المكان : {{$data['location']}}</td>
            <td> رقم النشاط :  {{$data['activity_number']}}</td>







        </tr>
    </table>
    <table style="float:right;width: 100%;margin-bottom: 30px" dir="rtl">
        <tr style="text-align:right">
            <td>

                <table>
                    <tr>
                        <td><u> المواضيــع المقدمة :</u></td>
                    </tr>
                    @for($i=0;$i<count($goals);$i++)
                        <tr>

                            <td> - {{$goals[$i]}}  </td>

                        </tr>
                    @endfor

                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <u> القــادة الحاضرون : </u>
                        </td>
                    </tr>
                    @for($j=0;$j<count($cap_presence);$j++)
                    <tr>

                        <td style="margin-bottom: 10px"> - {{$cap_presence[$j]}}</td>
                    </tr>
                        @endfor
                </table>
            </td>


        </tr>

    </table>

    <table style="float:right;width: 100%;margin-bottom: 30px" dir="rtl">
        <tr  style="text-align:right">
            <td> الكشـــافون الحاضرون : </td>
        </tr>
        @for($x=0;$x<count($scout_presence);$x++)
        <tr>
          <td style="margin-bottom: 10px"> - {{$scout_presence[$x]}}</td>
        </tr>
            @endfor
    </table>

    <p style="text-align:right; "> : الغيــاب  </p>
    <table style="float:right;width: 100%;margin-bottom: 30px" dir="rtl">
        <tr style="text-align:right">
            <td>
                <table>
                    <tr>
                        <td>
                            <u> بغير عذر : </u>
                        </td>
                    </tr>
                    @for($z=0;$z<count($scout_absence_cause);$z++)
                    <tr>
                        <td style="margin-bottom: 10px">
                        {{$scout_absence_cause[$z]}}
                        </td>
                    </tr>
                        @endfor
                </table>
            </td>
            <td>

                <table>
                    <tr>
                        <td>
                            <u> بعذر : </u>
                        </td>
                    </tr>
                    @for($u=0;$u<count($scout_absence);$u++)
                        <tr>
                            <td style="margin-bottom: 10px">
                            {{$scout_absence[$u]}}
                            </td>
                        </tr>
                    @endfor

                </table>
            </td>

        </tr>

    </table>
    <p style="text-align:right"> : ملاحظـــات </p>
    @for($y=0;$y<count($notes);$y++)
    <p style="text-align:right">  {{$notes[$y]}} - </p>
    @endfor
    <table style="float:right;width: 100%" dir="rtl">
        <tr style="text-align:right">
           @if($data['end_time']=="NaN:NaN")
            <td>اختتم النشاط على الساعة : </td>
            @else  <td>اختتم النشاط على الساعة : {{$data['end_time']}}</td>
        @endif
            <td>قائد النشاط :</td>
        </tr>

    </table>
</div>
</div>



</div>

<htmlpagefooter name="page-footer" >
    <img src= src="{{ public_path() .'/images/page_footer.png' }}" width="100%" height="180px" style="margin-bottom:-35px;" />
</htmlpagefooter>

<div>

</div>
</body>
</html>
