@extends('default')

@section('content')
  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto">
            <h2 class="text-center" style="font-size:88px;">坤视频</h2>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="row" style="padding-bottom:30px;">
      <div class="col-md-3 text-center mx-auto"></div>
      <div class="col-md-6 mx-auto" id="video-list">
        {{-- ************************************** --}}
        @foreach($videos as $video)
        <div>
          <h3>{{$video->title}}</h3>
          <video
              id="player-{{$video->id}}"
              class="video-js vjs-big-play-centered vjs-fluid"
              style="width:100%"
              controls
              preload="auto"
              data-setup='{}'>
            <source src="{{ $video->url }}" type="video/mp4"></source>
            <p class="vjs-no-js">
              To view this video please enable JavaScript, and consider upgrading to a
              web browser that
              <a href="http://videojs.com/html5-video-support/" target="_blank">
                supports HTML5 video
              </a>
            </p>
          </video>
          <script>
            $(function(){
              videojs('player-{{$video->id}}');
            });
          </script>
        </div>
        @endforeach
        {{-- ************************************ --}}
        <div class="col-md-3 text-center mx-auto"></div>
      </div>
    </div>
  </div>

@endsection
@push('css')
<link href="//vjs.zencdn.net/7.0/video-js.min.css" rel="stylesheet">
@endpush
@push('script')
<script src="//vjs.zencdn.net/7.0/video.min.js"></script>
<script>
  var page = 1;
  var totalpage = {{$videos->lastPage()}};
  window.onscroll = function (){
    if(page < totalpage && ($(document).height() <= $(window).height() + $(window).scrollTop() + 50)){
      $.ajaxSetup({async:false}); 
      $.get("{{route('video.page')}}?page=" + (page + 1),function(result){
        page = result.current_page;
        totalpage =  result.last_page;
        $.each(result.data,function(index,value){
            $('#video-list').append(`<div>
              <h3>${$(value).attr("title")}</h3>
              <video
                  id="my-player-${$(value).attr("id")}"
                  class="video-js vjs-big-play-centered vjs-fluid"
                  style="width:100%"
                  controls
                  preload="auto"
                  data-setup='{}'>
                <source src="${$(value).attr("url")}" type="video/mp4"></source>
                <p class="vjs-no-js">
                  To view this video please enable JavaScript, and consider upgrading to a
                  web browser that
                  <a href="http://videojs.com/html5-video-support/" target="_blank">
                    supports HTML5 video
                  </a>
                </p>
              </video>
            </div>`);
            videojs("my-player-" + $(value).attr("id"));
        });
      });
    }
  };
</script>
@endpush