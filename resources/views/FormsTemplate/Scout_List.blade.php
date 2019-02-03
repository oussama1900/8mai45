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
    <title> قائمة {{$unit_fullname['unit']}}</title>
    <style>
        *{
            font-size: 14px;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
        }
        .text-align-right{
            margin-right:0px
        }
        table, th, td {

            border: 1px solid black;

        }
        td{
            padding:5px;
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
<h3 style="text-align:center"> قائمة  {{$unit_fullname['unit']}}</h3>
<table width="100%" dir="rtl">
    <tr>
        <td>الرقم</td>
        <td>اللقب</td>
        <td>الاسم</td>
        <td>تاريخ الميلاد</td>
        <td>تاريخ الإنضمام</td>
        <td>العنوان الشخصي</td>

    </tr>
    @for($i=0;$i<count($scout);$i++)
    <tr>
        <td>{{$i+1}}</td>
        <td>{{$scout[$i]->last_name}}</td>
        <td>{{$scout[$i]->first_name}}</td>
        <td>{{$scout[$i]->date_of_birth}}</td>
        <td>{{$scout[$i]->membership_date}}</td>
        <td>{{$scout[$i]->address}}</td>

    </tr>
   @endfor
</table>
<div style="margin-left: 80px;margin-top:30px">
    <p> محـــافظ الفوج</p>
    <p>مويات براء عبد الاله</p>



</div>

    <div style="margin-left: 15px;">
        <img src= src="{{ public_path() .'/images/cachet.png' }}" width="200" height="250" />
    </div>
    </div>

<htmlpagefooter name="page-footer" >
    <img src= src="{{ public_path() .'/images/page_footer.png' }}" width="100%" height="180px" style="margin-bottom:-35px;" />
</htmlpagefooter>

<div>

</div>
</body>
</html>
