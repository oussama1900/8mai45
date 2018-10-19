<html>

    <body>
        <div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important">
            <div class="header text-center">
                منشور جديد
            </div>
            <div class="text-center">
                {{ $post->post_title }}
            </div>
            <div>
                <img src="{{asset('images/PostCover/'.$post->cover_image)}}">
            </div>
            <div>
                <a class="btn btn-primary" href="/posts/{{$post->post_id}}" target="_blank"></a>
            </div>
        </div>
    </body>
</html>
