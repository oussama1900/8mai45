<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="css/app.css"/>
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <title>محضر تنصيب</title>
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

<h2 style="margin-top:20px;text-align: center">محضر تنصيب</h2>
<div class="text-align-right" style="margin-top:20px">

    <p style="text-align: right;margin-right:-25px">الولاية: سطيف</p>
    <p style="text-align: right;margin-right:-25px"> المقاطعة : سطيف </p>
</div>

<div style="margin-right:-25px;margin-bottom:30px">
    <h4 style="text-align: right;">   انعقد مجلس فوج <strong>الفلاح</strong>  بتاريخ : {{$data['date']}}   على الساعة : {{$data['time']}}</h4>
    <p></p>
    <h4 style="text-align: right;margin-top: 10px">     {{$data['location']}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   بحضور      {{$data['presence']}}</h4>
    <p></p>
    <h4 style="text-align: right;margin-top: 10px">: وبعد إثبات العضوية لأعضاء مجلس الفوج وإجراء المداولات  </h4>
    <p> </p>

    <p style="text-align: right;">  تم انتخاب السيد : {{$data['elected']}}  &nbsp;&nbsp; <b>{{$data['role']}}</b></p>
    <p> </p> <p> </p> <p> </p>
    <p style="text-align: right;">{{$data['time']}} : سطيف في  : {{$data['date']}} على الساعة  </p>


    <p style="margin-top:80px;">
    <table style="width: 100%">
        <tr style="width: 100%">
            <td style="width: 50%;padding-left:50px">
    <p style="margin-left:30px;float:right">ختم المحافظ الولائي</p>
    </td>
            <td style="text-align: right;padding-right:50px;width: 50%">
            <p  style="text-align: right;float: right">ختم الفوج</p>
            </td>

        </tr>
    </table>





    </p>



</div>
</div>




<htmlpagefooter name="page-footer" >
    <img src= src="{{ public_path() .'/images/page_footer.png' }}" width="100%" height="180px" style="margin-bottom:-35px;" />
</htmlpagefooter>

<div>

</div>
</body>
</html>
