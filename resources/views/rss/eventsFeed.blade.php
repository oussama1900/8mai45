{{ Request::header('Content-Type : application/xml') }}

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>احداث فوج الفلاح</title>
        <description>RSS Feed</description>
        <link>{{ url('/events') }}</link>

        @foreach ($events as $event)

            @php
                $event->title = str_replace("&", "&amp;", $event->title);
                $event->description = str_replace("&rdquo;", "”", $event->description);
                $event->description = str_replace("&ldquo;", "“", $event->description);

                $event->title = stripslashes($event->title);
                $event->description = stripslashes($event->description);
                $img = "<img src='".asset('images/EventImages/'.$event->event_image)."' alt='".$event->title."' width='600'>";
            @endphp

            <item>
                <title>{{ $event->title }}</title>
                <description><![CDATA[{!! $img !!} {!! $event->description !!}]]></description>
                <pubDate>{{ date('D, d M Y H:i:s', strtotime($event->created_at)) }} GMT</pubDate>
                <link>{{ url('/events/'.$event->event_id) }}</link>
                <guid>{{ url('/events/'.$event->event_id) }}</guid>
                <atom:link href="{{ url('/events/'.$event->event_id) }}" rel="self" type="application/rss+xml"/>
            </item>

        @endforeach

    </channel>
</rss>