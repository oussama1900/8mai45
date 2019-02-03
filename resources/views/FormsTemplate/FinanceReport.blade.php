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
    <title>التقرير الشهري لمسؤول المالية</title>
    <style>
        *{
            font-size: 14px;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
        }
        .text-align-right{
            margin-right:0px
        }
        table, th, td {

            border: 1px solid #cecece;

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
<h3 style="text-align:center">التقرير الشهري لمسؤول المالية</h3>
<table width="100%" dir="rtl">
    <tr>
        <td>رقم المعاملة</td>
        <td>الأموال الواردة</td>
        <td>الأموال المسحوبة</td>
        <td>تاريخ العملية</td>
        <td> التعليل</td>

    </tr>
    @for($i=0;$i<count($money);$i++)
    <tr>
        <td>{{$money[$i]->id}}</td>

				@if($money[$i]->transaction_money>=0)
        <td>{{$money[$i]->transaction_money}} دج</td>
				  <td></td>
				@else
				<td></td>
        <td>{{substr($money[$i]->transaction_money,1)}} دج</td>

				@endif
        <td>{{$money[$i]->transaction_date}}</td>
        <td>{{$money[$i]->transaction_description}}</td>



    </tr>
   @endfor
</table>
</div>
<htmlpagefooter name="page-footer" >
    <img src= src="{{ public_path() .'/images/page_footer.png' }}" width="100%" height="180px" style="margin-bottom:-35px;" />
</htmlpagefooter>

<div>

</div>
</body>
</html>
