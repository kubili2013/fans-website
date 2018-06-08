@extends('default')

@section('content')
    <section class="page-section cta">
        <div class="container">
            <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="cta-inner rounded">
                <h1 class="section-heading  text-center mb-4">
                    <span class="section-heading-lower">坤纪实</span>
                </h1>
                <h5 class="text-center">坤坤得人生大事，不断更新中！</h5>
                    <ul class="timeline" style="margin-top:48px;" id="news_list">
                    @foreach($news as $key=>$n)
                        <li @if($key%2 == 0)class="timeline-inverted"@endif>
                            <div class="timeline-image">
                                <img class="img-circle img-fluid"src="{{$n->image_url}}" alt="" width="100%">
                            </div>
                            <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>{{$n->about_date}}</h4>
                                <h4 class="subheading">{{$n->title}}</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">{{$n->description}}</p>
                            </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase"><br/></h2>
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
<script>
  var page = 1;
  var totalpage = {{$news->lastPage()}};
  window.onscroll = function (){
    if(page < totalpage && ($(document).height() <= $(window).height() + $(window).scrollTop() + 100)){
      $.ajaxSetup({async:false}); 
      $.get("{{route('news.page')}}?page=" + (page + 1),function(result){
        page = result.current_page;
        totalpage =  result.last_page;
        $.each(result.data,function(index,value){
            $('#news_list').append(`<li ${ index%2 == 0 ? "class='timeline-inverted'":"" }>
                <div class="timeline-image">
                <img class="img-circle img-fluid" src="${$(value).attr("image_url")}" alt="">
                </div>
                <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4>${$(value).attr("about_date")}</h4>
                    <h4 class="subheading">${$(value).attr("title")}</h4>
                </div>
                <div class="timeline-body">
                    <p class="text-muted">${$(value).attr("description")}</p>
                </div>
                </div>
            </li>`);
        });
      });
    }
  };
</script>
@endpush