@extends('layouts.web_template')

<head>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Style inputs */
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        /* Style the container/contact section */
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 10px;
        }

        /* Create two columns that float next to eachother */
        .column {
            float: left;
            width: 50%;
            margin-top: 6px;
            padding: 20px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>

@section('content')
    <div class="mb-3" style="height:150px;background-image: linear-gradient(to bottom right, #52E5E7, #130CB7); "></div>
<div class="container">
    <div style="text-align:center">
        <h2>تواصل معنا</h2>
    </div>
    <div class="row">
        <div class="column">
            <div id="map" style="width:100%;height:500px"></div>
        </div>
        <div class="column">
            <form action="#">
                <label class="float-right" for="fname" style="text-align:right">اللقب</label>
                <input type="text" style="text-align:right" id="fname" name="firstname" placeholder="لقبك">
                <label class="float-right" for="lname" style="text-align:right">الاسم</label>
                <input type="text" style="text-align:right" id="lname" name="lastname" placeholder="اسمك">
                <label class="float-right" for="subject" style="text-align:right">الموضوع</label>
                <textarea id="subject" style="text-align:right" name="subject" placeholder="اكتب هنا ..." style="height:170px"></textarea>
                <input class="float-right" type="submit" value="ارسل">
            </form>
        </div>
    </div>
</div>

<!-- Initialize Google Maps -->
<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(51.508742,-0.120850);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {center: myCenter, zoom: 12};
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({position:myCenter});
        marker.setMap(map);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
@endsection