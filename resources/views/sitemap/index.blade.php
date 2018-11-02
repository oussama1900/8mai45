<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if(!empty($post))
        <sitemap>
            <loc>{{ url('/sitemap/main') }}</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endif
    @if(!empty($cubsPost))
        <sitemap>
            <loc>{{ url('/sitemap/cubs') }}</loc>
            <lastmod>{{ $cubsPost->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endif
    @if(!empty($scoutPost))
        <sitemap>
            <loc>{{ url('/sitemap/scout') }}</loc>
            <lastmod>{{ $scoutPost->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endif
    @if(!empty($advanced_scoutPost))
        <sitemap>
            <loc>{{ url('/sitemap/advanced_scout') }}</loc>
            <lastmod>{{ $advanced_scoutPost->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endif
    @if(!empty($travelerPost))
        <sitemap>
            <loc>{{ url('/sitemap/traveler') }}</loc>
            <lastmod>{{ $travelerPost->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endif
    @if(!empty($captainsPost))
        <sitemap>
            <loc>{{ url('/sitemap/captains') }}</loc>
            <lastmod>{{ $captainsPost->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endif
    @if(!empty($post))
        <sitemap>
            <loc>{{ url('/sitemap/news') }}</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endif
    @if(!empty($event))
        <sitemap>
            <loc>{{ url('/sitemap/events') }}</loc>
            <lastmod>{{ $event->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endif
    @if(!empty($book))
        <sitemap>
            <loc>{{ url('/sitemap/library') }}</loc>
            <lastmod>{{ $book->created_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endif
</sitemapindex>