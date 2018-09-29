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
    <title>قائمة مستخدمي الموقع الإلكتروني</title>
    <style>
        *{font-size: 14px}
        .text-align-right{
            margin-right:0px
        }
        table, th, td {

            border: 1px solid black;

        }
        td{
            padding:5px;
        }
    </style>
</head>
<body>
<div style="margin-right:-60px ;margin-top: -100px;padding-top:-60px">
<img src= src="{{ public_path() .'/images/page_header.jpg' }}" width="100%" height="150px" />


</div>
<h3 style="text-align:center">قائمة مستخدمي الموقع الإلكتروني</h3>
<table width="100%" dir="rtl">
    <tr>
        <td>الرقم</td>
        <td>اللقب</td>
        <td>الاسم</td>
        <td>تاريخ الميلاد</td>
        <td> الدور في الفوج</td>
        <td>البريد الالكتروني</td>

    </tr>
    @for($i=0;$i<count($users);$i++)
    <tr>
        <td>{{$users[$i]->scout_id}}</td>
        <td>{{$users[$i]->profile->last_name}}</td>
        <td>{{$users[$i]->profile->first_name}}</td>
        <td>{{$users[$i]->profile->date_of_birth}}</td>
        <td>{{$users[$i]->captain->assignedRole->getRole()}}</td>
        <td>{{$users[$i]->email}}</td>

    </tr>
   @endfor
</table>

<footer style="position:absolute;left:45px;bottom:0px;margin-left:-60px">
    <img src= src="{{ public_path() .'/images/page_footer.jpg' }}" width="100%" height="150px" />
</footer>

<div>

</div>
</body>
</html>
