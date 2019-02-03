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
    <title>مراسلة المحافظ الولائي</title>
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
<div class="text-align-right" style="margin-top:20px">

    <p style="text-align: right;margin-right:-25px"><span>  رقــم البريــد الصادر :</span><span> {{$data['outing_mail_number']}} / ف ف/ 2018  </span></p>
    <p style="text-align: right;margin-right:-25px"> {{$data['date']}}   <span> :</span><span>التاريخ</span> </p>
</div>
<div style="margin-left: 110px">
    <p> الى السيد المحترم:المحافظ الولائي  </p>
    <p style="margin-left: 50px">-{{$data['state_scout_gov']}}-</p>
</div>
<div style="margin-right:-25px;margin-bottom:30px">
    <p style="text-align: right;font-size:16px;"> الموضوع:{{$data['subject']}}</p>
</div>
<div >
    <div style="text-align:right;margin-right:-25px;">
        {!! $data['content'] !!}
    </div>
</div>

<div style="margin-left: 80px;margin-top:30px">
    <p> محـــافظ الفوج</p>
    <p>{{$data['gov']}}</p>
</div>
</div>
<htmlpagefooter name="page-footer" >
    <img src= src="{{ public_path() .'/images/page_footer.png' }}" width="100%" height="180px" style="margin-bottom:-35px;" />
</htmlpagefooter>

<div>

</div>
</body>
</html>