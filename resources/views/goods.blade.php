@extends('default')

@section('content')
  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto">
            <h2 class="text-center" style="font-size:88px;">坤好物</h2>
        </div>
      </div>
    </div>
  </section>

<div  id="_wrapper">
  <div id="_container">
  @foreach($goods as $g)
    <div class="grid-waterfull">
			<div class="imgholder"><img class="lazy" data-original="{{$g->image_url}}?imageMogr2/thumbnail/!200x" width="200" /></div>
      <strong>{{$g->title}}</strong>
			<div class="meta"><a href="{{$g->url}}" target="_blank"><i class="glyphicon glyphicon-menu-right"></i>点击前往<i class="glyphicon glyphicon-menu-left"></i></a></div>
		</div>
  @endforeach
  </div>
</div>
@endsection

@push('script')
<script type="text/javascript" src="/js/jquery.lazyload.min.js"></script>
<script type="text/javascript" src="/js/blocksit.min.js"></script>
<script type="text/javascript">
var page = 1;
var totalpage = {{$goods->lastPage()}};
$(function(){
	$("img.lazy").lazyload({		
		load:function(){
			$('#_container').BlocksIt({
				numOfCol:5,
				offsetX: 8,
				offsetY: 8
			});
		}
	});	
	$(window).scroll(function(){
			// 当滚动到最底部以上50像素时， 加载新内容
		if (page < totalpage && $(document).height() - $(this).scrollTop() - $(this).height()<20){
      $.ajaxSetup({async:false}); 
      $.get("{{route('goods.page')}}?page=" + (page + 1),function(result){
        page = result.current_page;
        totalpage =  result.last_page;
        $.each(result.data,function(index,value){
          $('#_container').append(`
          <div class="grid-waterfull">
            <div class="imgholder"><img class="lazy" data-original="${$(value).attr("image_url")}?imageMogr2/thumbnail/!200x" width="200" /></div>
            <strong>${$(value).attr("title")}</strong>
            <div class="meta"><a href="${$(value).attr("url")}" target="_blank"><i class="glyphicon glyphicon-menu-right"></i>点击前往<i class="glyphicon glyphicon-menu-left"></i></a></div>
          </div>
          `);
        });
      });
					
			$('#_container').BlocksIt({
				numOfCol:5,
				offsetX: 8,
				offsetY: 8
			});
			$("img.lazy").lazyload();
		}
	});
	
	//window resize
	var currentWidth = 1100;
	$(window).resize(function() {
		var winWidth = $(window).width();
		var conWidth;
		if(winWidth < 660) {
			conWidth = 440;
			col = 2
		} else if(winWidth < 880) {
			conWidth = 660;
			col = 3
		} else if(winWidth < 1100) {
			conWidth = 880;
			col = 4;
		} else {
			conWidth = 1100;
			col = 5;
		}
		
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			$('#_container').width(conWidth);
			$('#_container').BlocksIt({
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
		}
	});
});
</script>
@endpush