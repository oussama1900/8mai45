<?php

namespace App\Http\Controllers;
use App\Event;
use App\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function eventsFeed(){
        $events = Event::orderBy('updated_at', 'desc')->take(20)->get();
        return view('rss.eventsFeed')->with(compact('events'));
    }
    public function postsFeed(){
        $posts = Post::orderBy('updated_at', 'desc')->take(20)->get();
        return view('rss.postsFeed')->with(compact('posts'));
    }
}
