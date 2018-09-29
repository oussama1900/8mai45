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
    <title>مراسلة الأمن</title>
    <style>
        *{font-size: 14px}
        .text-align-right{
            margin-right:0px
        }
    </style>
</head>
<body>
<div style="margin-right:-60px ;margin-top: -100px;padding-top:-60px">
<img src= src="{{ public_path() .'/images/page_header.jpg' }}" width="100%" height="150px" />


</div>
<div class="text-align-right" style="margin-top:20px">

    <p style="text-align: right;margin-right:-25px"><span>  رقــم البريــد الصادر :</span><span> {{$data['outing_mail_number']}} / م و س/ 2018  </span></p>
    <p style="text-align: right;margin-right:-25px"> {{$data['date']}}   <span> :</span><span>التاريخ</span> </p>
</div>
<div style="margin-left: 110px">
    <p>   الى السيد المحترم :{{$data['urban_security_center_president']}}  </p>

</div>
<div style="margin-right:-25px;margin-bottom:30px">
    <h3 style="text-align: right;">  الموضوع : {{$data['subject']}} </h3>
</div>
<div>

    <div style="text-align:right;margin-right:-25px;">
      {!! $data['content'] !!}
    </div>
    <div style="text-align:center">
        وفي الأخير تقبلوا مني سيدي أسمى عبارات الشكر والتقدير
    </div>

</div>

<div style="margin-left: 80px;margin-top:30px">
    <p> محـــافظ الفوج</p>
    <p>{{$data['gov']}}</p>
</div>

<footer style="position:absolute;left:45px;bottom:0px;margin-left:-60px">
    <img src= src="{{ public_path() .'/images/page_footer.jpg' }}" width="100%" height="150px" />
</footer>

<div>

</div>
</body>
</html>
