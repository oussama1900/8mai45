@extends('layouts.web_template')
<head>
    <link rel="stylesheet" href="css/library.css">
</head>
@section('content')
    <div class="jumbotron">
        <h1 style="color: white;font-size: 100px;text-shadow: 3px 2px black;text-align: center">كتبنا</h1>
    </div>
    <div class="container jumbotron-fluid">
        <div class="row flex-column-reverse flex-md-row">
            @foreach($books as $book)
                <div class="col-md-4" style="margin: 0 !important;padding: 0 !important;">
                    <div class="card text-right" dir="rtl" style="margin: 0 !important;padding: 0 !important;">
                        <div class="card-header" style="padding: 0 !important;">
                            <img class="card-img-100 img-fluid" src="uploads/Books/Images/{{ $book->picture }}" alt="{{ $book->title }}">
                        </div>
                        <div class="card-body">
                            <h1 class="card-title">{{ $book->title }}</h1>
                            <div class="container">
                                <div class="row">
                                    <div class="col-8 metadata">{{ $book->category }}</div>
                                </div>
                            </div>
                            <p class="card-text">{!! $book->description !!}</p>
                            <a class="trailer-preview "  href="uploads/Books/PDF/{{ $book->file }}" target="new" download="{{ $book->title }}.pdf">
                                <i class="fa fa-arrow-down" style="position: absolute;right: 30%;top: 30%" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection