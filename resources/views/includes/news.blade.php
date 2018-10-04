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

</style>
<!-- events Showcases -->
@if($posts->count()>0)
    @for($post=0;$post<$posts->count();$post++)
<div class="col-md-4">
    <div class="" dir="rtl">

        <div class="col-md-12">
            <div class="post-thumbnail">
                <img class="post-image" src="{{asset('images/PostCover/')}}{{"/".$posts[$post]->cover_image}}"  width="100%" height="100%" alt="{{$posts[$post]->post_title}}">
            </div>
        </div>
        <div class=" post-content col-md-12">
            <div class="post-description-container">
                <div class="post-header">
                    <h5>
               <span style="background: #7d7d8e;">
              {{ $posts[$post]->post_type }}
          </span>
                        <span dir="rtl">
              <i class="fa fa-clock-o"></i>
                            {{substr($posts[$post]->post_date, 0, 10)}}
          </span>
                    </h5>

                </div>
                <div>
                    <div class="post-title">
                        <h2>
                            {{$posts[$post]->post_title}}
                        </h2>
                    </div>
                    <div class="post-summary">
                        {!! $posts[$post]->post_summary !!}
                    </div>
                    @php
                        $unit_name = '';
                        if($posts[$post]->linked_unit == "cubs"){
                            $unit_name = 'وحدة الاشبال';
                        }
                        if($posts[$post]->linked_unit == "sct"){
                            $unit_name = 'وحدة الكشاف';
                        }
                        if($posts[$post]->linked_unit == "asct"){
                            $unit_name = 'وحدة الكشاف المتقدم';
                        }
                        if($posts[$post]->linked_unit == "tvlr"){
                            $unit_name = 'وحدة الجوالة';
                        }
                        if($posts[$post]->linked_unit == "cap"){
                            $posts[$post] = 'وحدة القادة';
                        }
                    @endphp
                    <small class="card-subtitle text-right float-right" style="color: grey">{{$unit_name}}</small>
                </div>
            </div>
            <div>
                <div class="btn btn-light " style="float:left;margin-top: 15px">
                    <a href="/posts/{{$posts[$post]->post_id}}" target="_blank" style="text-decoration: none">اقرأ المزيد</a>
                </div>
            </div>
        </div>
    </div>
</div>
       @endfor
@endif
      <!--  <div class="row">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="card-deck">
                        @if($posts->count()>0)
                            @foreach($posts as $post)
                                <div class="col-auto mb-3 mt-3">
                                    <div class="card shadow" style="width: 20rem;">
                                        <div class="card-content">
                                            <div class="card-img">
                                                <img class="img-fluid hoverZoomLink" style="height: 250px;width: 100%" src="{{asset('images/PostCover/'.$post->cover_image)}}" alt="{{$post->post_title}}">
                                                <span {!! $news_style !!}><h4>{{ $post->post_type }}</h4></span>
                                            </div>

                                            <div class="card-body" >
                                                <div class="row">
                                                    <h6 class="text-black col-5 mt-2"><i class="fa fa-clock-o" style="color: {{ $card_color }}"></i> <small>{{substr($post->post_date, 0, 10)}}</small></h6>
                                                    <h5 class="text-right text-black col-7">{{$post->post_title}}</h5>
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
                                                        $unit_name = 'وحدة القادة';
                                                    }
                                                @endphp

                                                <small class="card-subtitle text-right float-right" style="color: grey">{{$unit_name}}</small>
                                                <a href="/posts/{{$post->post_id}}" class="btn btn-outline-primary btn-custom btn-block mt-3">اقرأ اكثر</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>-->
   <!--     <div class="center" style="width: 10%; margin: 10px auto;"  >{{$posts->links("pagination::bootstrap-4")}}</div>-->

