

<html>
<header>
    <style>


        .button-color {
            background-color: #0066cc;
        }
    </style>
</header>
{{Html::style('global/css/bootstrap.min.css')}}
    <body>
        <div>

            <div class="text-center">
               <h1 style="text-align: center">{{$title}} </h1>
            </div>
            <div style="text-align: center">
                <img  src="/images/PostCover/{{$picture}}" style="width: 100%;height:50%">
            </div>
            <div style="text-align: center;margin: 20px">
                <a class="btn btn-primary btn-lg " href="www.faleh.com/posts/{{$id}}"  style="padding:10px !important;">اقرأ أكثر</a>
             </div>
        </div>
    </body>
</html>
