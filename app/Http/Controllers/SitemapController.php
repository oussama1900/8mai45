<?php

namespace App\Http\Controllers;

use App\BooksLibrary;
use Illuminate\Http\Request;
use App\Post;
use App\Event;

class SitemapController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('created_at', 'desc')->first();
        $cubsPost = Post::where('linked_unit','cubs')->orderBy('created_at', 'desc')->first();
        $scoutPost = Post::where('linked_unit','sct')->orderBy('created_at', 'desc')->first();
        $advanced_scoutPost = Post::where('linked_unit','asct')->orderBy('created_at', 'desc')->first();
        $travelerPost = Post::where('linked_unit','tvlr')->orderBy('created_at', 'desc')->first();
        $captainsPost = Post::where('linked_unit','cap')->orderBy('created_at', 'desc')->first();
        $event = Event::orderBy('created_at', 'desc')->first();
        $book = BooksLibrary::orderBy('created_at', 'desc')->first();

        return response()->view('sitemap.index', [
            'post' => $post,
            'event' => $event,
            'cubsPost' => $cubsPost,
            'scoutPost' => $scoutPost,
            'advanced_scoutPost' => $advanced_scoutPost,
            'travelerPost' => $travelerPost,
            'captainsPost' => $captainsPost,
            'book' => $book,
        ])->header('Content-Type', 'text/xml');
    }

    public function main()
    {
        $posts = Post::orderby('created_at','desc')->get();
        $events = Event::orderBy('created_at', 'desc')->get();
        return response()->view('sitemap.main', [
            'posts' => $posts,
            'events' => $events,
        ])->header('Content-Type', 'text/xml');
    }

    public function cubs()
    {
        $posts = Post::where('linked_unit','cubs')->orderby('created_at','desc')->get();
        $events = Event::orderBy('created_at', 'desc')->get();
        return response()->view('sitemap.cubs', [
            'posts' => $posts,
            'events' => $events,
        ])->header('Content-Type', 'text/xml');
    }

    public function scout()
    {
        $posts = Post::where('linked_unit','sct')->orderby('created_at','desc')->get();
        $events = Event::orderBy('created_at', 'desc')->get();
        return response()->view('sitemap.cubs', [
            'posts' => $posts,
            'events' => $events,
        ])->header('Content-Type', 'text/xml');
    }

    public function advanced_scout()
    {
        $posts = Post::where('linked_unit','asct')->orderby('created_at','desc')->get();
        $events = Event::orderBy('created_at', 'desc')->get();
        return response()->view('sitemap.cubs', [
            'posts' => $posts,
            'events' => $events,
        ])->header('Content-Type', 'text/xml');
    }

    public function traveler()
    {
        $posts = Post::where('linked_unit','tvlr')->orderby('created_at','desc')->get();
        $events = Event::orderBy('created_at', 'desc')->get();
        return response()->view('sitemap.cubs', [
            'posts' => $posts,
            'events' => $events,
        ])->header('Content-Type', 'text/xml');
    }

    public function captains()
    {
        $posts = Post::where('linked_unit','cap')->orderby('created_at','desc')->get();
        $events = Event::orderBy('created_at', 'desc')->get();
        return response()->view('sitemap.cubs', [
            'posts' => $posts,
            'events' => $events,
        ])->header('Content-Type', 'text/xml');
    }

    public function news()
    {
        $posts = Post::orderby('created_at','desc')->get();
        return response()->view('sitemap.news', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function events()
    {
        $events = Event::orderby('created_at','desc')->get();
        return response()->view('sitemap.events', [
            'events' => $events,
        ])->header('Content-Type', 'text/xml');
    }

    public function library(){
        $book = BooksLibrary::orderBy('created_at', 'desc')->first();
        return response()->view('sitemap.library', [
            'book' => $book,
        ])->header('Content-Type', 'text/xml');
    }
}
