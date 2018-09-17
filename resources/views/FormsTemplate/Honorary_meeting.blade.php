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
    <title>اجتماع مجلس شرف</title>
    <style>
      *{font-size: 14px}
        .text-align-right{
            margin-right:-45px
        }
    </style>
</head>
<body>
<div style="margin-right:-50px ;margin-top: -45px">

   <img src= {{ public_path("/images/page_header.jpg") }} width="100%" height="150px"/>

</div>
<div class="text-align-right">

    <p style="text-align: right;margin-right:-10px"><span>/   م و س 2018 / <span> رقــم البريــد الصادر: {{$data['outing_mail_number']}}</span> </span></p>
    <p style="text-align: right;"> {{$data['date']}}    <span> :</span><span>التاريخ</span> </p>
</div>
<div style="margin-left: 110px">
    <p > الى الكشاف المحترم: {{$data['toscout']}} </p>
</div>
<div style=" margin-right:-70px">
    <p style="text-align: right;font-size:16px;"> الموضوع:ف/ي دعوة لحضور اجتماع الشرفي </p>
</div>
<div class="text-align-right">
    <div>
        {!! $data['content'] !!}
    </div>
</div>
<div style="text-align: center;margin-right:-180px">
    <p >وفي الاخير تقبلوا مني قائدي أسمى عبارات االحترام والتقدير </p>
</div>
<div style="margin-left: 80px">
    <p> محـــافظ الفوج</p>
    <p>{{$data['gov']}}</p>
</div>

<footer style="position: absolute;bottom:0px;margin-bottom: -45px;margin-left:-50px">
    <img src= {{ public_path("/images/page_footer.jpg") }} width="100%" height="150px"/>
</footer>

<div>

</div>
</body>
</html>