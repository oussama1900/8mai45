@php
    $card_color = '#2b53ce';
    $news_style = 'style="background-image: linear-gradient(to bottom right, #52E5E7, #130CB7); radius: 5px;"';

   if (Route::currentRouteNamed('cubs')){
       $card_color = '#ffd700';
       $news_style = 'style="background-image: linear-gradient(to bottom right, #FDEB71, #F8D800); radius: 5px;"';
   }
   if (Route::currentRouteNamed('scout')){
       $card_color = '#00cc00';
       $news_style = 'style="background-image: linear-gradient(to bottom right, #FFF720, #3CD500); radius: 5px;"';
   }

   if (Route::currentRouteNamed('advanced_scout')){
       $card_color = '#701700';
       $news_style = 'style="background-image: linear-gradient(to bottom right, #F05F57, #360940); radius: 5px;"';
   }

   if (Route::currentRouteNamed('traveler')){
       $card_color = '#ee2c2c';
       $news_style = 'style="background-image: linear-gradient(to bottom right, #FEB692, #EA5455); radius: 5px;"';
   }
@endphp
<style>
    .btn-light{
        position: absolute;
        bottom:0px;
        left:10%;
        background: #f2f2f2;
        border-radius: 4px;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);

        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-description-container{
        text-align: right;
    }
    .post-content{
        padding-top:35px !important;
    }
    .post-header>h5>span:first-child{
        padding: 5px;
        border-radius: 4px;
        color:white;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-header>h5>span:nth-child(2){
        padding: 5px;
        margin-right: 5px;
        color:grey;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-image{
        width: 100%;
        height: 270px;
        margin-top: 25px;
        border-radius: 4px;
    }
    .post-title>h2{
        margin-top:20px;
        margin-bottom:20px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-summary{
        margin-top:10px;
        margin-bottom:10px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-summary>p{
        color: #444444;
        font-weight: 400;
        text-align: right;
        font-size: 12pt;
        margin: 0;
        margin-bottom: 15px;
        line-height: 29px;
        height: 87px;
        overflow: hidden;
    }
</style>
<!-- events Showcases -->
<div class="container">
@if($posts->count()>0)
    @foreach($posts as $post)
        <div class="col-md-12 ">
            <div class="row" dir="rtl">

                <div class="col-md-6">
                    <div class="post-thumbnail">
                        <img class="post-image" src="{{asset('images/PostCover/')}}{{"/".$post->cover_image}}"  width="100%" height="100%" alt="{{$post->post_title}}">
                    </div>
                </div>
                <div class=" post-content col-md-6">
                    <div class="post-description-container">
                        <div class="post-header">
                            <h5>
                                <span style="background: #7d7d8e;">
                                    {{ $post->post_type }}
                                </span>
                                <span dir="rtl">
                                    <i class="fa fa-clock-o"></i>
                                    {{substr($post->post_date, 0, 10)}}
                                </span>
                            </h5>
                        </div>
                        <div>
                            <div class="post-title">
                                <h2>
                                    {{$post->post_title}}
                                </h2>
                            </div>
                            <div class="post-summary">
                                {!! $post->post_summary !!}
                            </div>
                            @php
                                $unit_name = '';
                                if($post->linked_unit == "cubs"){
                                    $unit_name = 'وحدة الاشبال';
                                }
                                if($post->linked_unit == "sct"){
                                    $unit_name = 'وحدة الكشاف';
                                }
                                if($post->linked_unit == "asct"){
                                    $unit_name = 'وحدة الكشاف المتقدم';
                                }
                                if($post->linked_unit == "tvlr"){
                                    $unit_name = 'وحدة الجوالة';
                                }
                                if($post->linked_unit == "cap"){
                                    $unit_name= 'وحدة القادة';
                                }
                            @endphp
                            <small class="card-subtitle text-right float-right" style="color: grey">{{$unit_name}}</small>
                        </div>
                    </div>
                    <div>
                        <div class="btn btn-light " style="float:left;margin-top: 15px">
                            <a href="/posts/{{$post->post_id}}" target="_blank" style="text-decoration: none">اقرأ المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       @endforeach
@endif
</div>

