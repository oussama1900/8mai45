{{ Request::header('Content-Type : application/xml') }}

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>اخبار فوج الفلاح</title>
        <description>RSS Feed</description>
        <link>{{ url('/news') }}</link>

        @foreach ($posts as $post)

            @php
                $post->post_title = str_replace("&", "&amp;", $post->title);
                $post->post_summary = str_replace("&rdquo;", "”", $post->post_summary);
                $post->post_summary = str_replace("&ldquo;", "“", $post->post_summary);

                $post->title = stripslashes($post->post_title);
                $post->post_summary = stripslashes($post->post_summary);
                $img = "<img src='".asset('images/PostCover/'.$post->cover_image)."' alt='".$post->post_title."' width='600'>";
            @endphp

            <item>
                <title>{{ $event->post_title }}</title>
                <description><![CDATA[{!! $img !!} {!! $event->post_summary !!}]]></description>
                <pubDate>{{ date('D, d M Y H:i:s', strtotime($event->created_at)) }} GMT</pubDate>
                <link>{{ url('/posts/'.$event->post_id) }}</link>
                <guid>{{ url('/posts/'.$event->post_id) }}</guid>
                <atom:link href="{{ url('/posts/'.$event->post_id) }}" rel="self" type="application/rss+xml"/>
            </item>

        @endforeach

    </channel>
</rss>