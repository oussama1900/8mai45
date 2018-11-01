

<html>
<header>
    <style>

        .btn{
            display: inline-block;
            padding: 15px 25px;
            font-size: 24px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #238df7;
            border: none;
            border-radius: 15px;

        }
        .btn:hover{
            background-color: #037af1
        }
        .btn:active{
            background-color: #005db9;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

    </style>
</header>

    <body>
        <div class="container">

            <div class="text-center">
               <h1 style="text-align: center">{{$title}} </h1>
            </div>
            <div style="text-align: center">
                <img  src="https://www.falehscout.com/images/PostCover/{{$picture}}" style="width:50%;height:100%">
            </div>
            <div style="text-align: center;margin: 20px">
                <a class="btn" href="https://www.falehscout.com/posts/{{$id}}"  >اقرأ أكثر</a>
             </div>
        </div>
    </body>
</html>
