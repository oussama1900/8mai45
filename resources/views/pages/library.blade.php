@extends('layouts.web_template')
<head>
    <link rel="stylesheet" href="css/library.css">
</head>
@section('content')
    <div style="height: 100px"> </div>
    <div class="container jumbotron">
        <div class="row flex-column-reverse flex-md-row">
            @foreach($books as $book)
                <div class="card-container">
                    <div class="card u-clearfix">
                        <div class="row">
                            <div class="col-6 col-xs-12">
                        <div class="card-body">
                                    <h2 class="card-title">{{ $book->title }}</h2>
                                    <span class="card-author subtle">{{ $book->author }}</span>
                                    <span class="card-description subtle">{!! $book->description !!}</span>
                                    <div class="card-read"><a class="trailer-preview pull-right" href="/uploads/Books/PDF/{{ $book->file }}" target="new">حمل من هنا</a></div>
                                    <span class="card-tag card-circle subtle">C</span>
                            </div>
                            </div>
                            <div class="col-6 col-xs-12">
                                <img src="/uploads/Books/Images/{{ $book->picture }}" alt="{{ $book->title }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-shadow"></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection