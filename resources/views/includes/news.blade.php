
<!-- events Showcases -->

<div class="container">
@if($posts->count()>0)
    @foreach($posts as $post)
        <div class="col-auto mb-3 mt-3 allu {{ $post->linked_unit }}">
            <div class="card shadow " style="width: 18rem;">
                <div class="card-content">
                    <div class="card-img">
                        <img class="img-fluid hoverZoomLink" style="height: 250px;width: 100%" src="{{asset('images/PostCover/'.$post->cover_image)}}" alt="{{$post->post_title}}">
                        <span><h4>{{ $post->post_type }}</h4></span>
                    </div>

                    <div class="card-body" >
                        <div class="row">
                            <h6 class="text-black col-5 mt-2"><i class="fa fa-clock-o"></i> <small>{{substr($post->post_date, 0, 10)}}</small></h6>
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