@extends('default')

@section('content')
  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto">
            <h2 class="text-center" style="font-size:88px;">坤美图</h2>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="row"  style="padding-bottom:30px;">
      <div class="col-md-12 text-center mx-auto" id="waterfull">
        {{-- ************************************** --}}
        @foreach($images as $image)
          <div class="box">
            <div class="content portfolio-item">
              <a class="portfolio-link" href="{{$image->url}}" target="_blank" download="">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="glyphicon glyphicon-download-alt"></i>
                  </div>
                </div>
                <img class="img-fluid" src="{{$image->url}}?imageMogr2/thumbnail/!200x" width="200">
              </a>
            </div>
          </div>
        @endforeach
        {{-- ************************************ --}}
      </div>
    </div>
  </div>
  @include('layouts.mask')
@endsection

@push('script')
<script>
  function Position(box,container,data){
      this.boxWidth = box.eq(0).width();
      // 750px 970px 1170px
      this.waterfull=container;
      this.data=data;
      this.setBody();
      this.scroll();
      this.onresize();
  }
  var page = 1;
  var totalpage = {{$images->lastPage()}};
  Position.prototype={
      constructor:Position,
      setBody(){
          // this.container.css("width",this.num() * 220);
          this.add();
      },
      box() {
          return $(".box");
      },
      add() {
          let [that,boxArr]=[this,[]];
          this.box().hide();
          this.box().each(function (index, value){
              let boxheight = that.box().eq(index).height();
              if (index < that.num()){
                  $(value).removeAttr("style");
                  boxArr[index] = boxheight ;
              } else {
                  let minboxheight = Math.min(...boxArr);
                  let minposiindex = $.inArray(minboxheight, boxArr);
                  $(value).css({
                      "position": "absolute",
                      "top": minboxheight + 5,
                      "left": that.box().eq(minposiindex).position().left
                  });
                  $(value).show();
                  boxArr[minposiindex] += (that.box().eq(index).height()+5);
              }
          });
      },
      scroll(){
          let that=this;
          window.onscroll = function (){
            if (that.slidescroll() && page < totalpage) {
              mask();
              $.ajaxSetup({async:false}); 
              $.get("{{route('image.page')}}?page=" + (page + 1),function(result){
                page = result.current_page;
                totalpage =  result.last_page;
                $.each(result.data,function(index,value){
                  let _value = value;
                  $.get( $(value).attr("url") + "?imageInfo",function(result){
                    that.waterfull.append(`<div class="box">
                      <div class="content portfolio-item">
                        <a class="portfolio-link" href="${$(_value).attr("url")}"  target="_blank" id="goods-${$(_value).attr("id")}">
                          <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                              <i class="glyphicon glyphicon-download-alt"></i>
                            </div>
                          </div>
                          <img class="img-fluid" src="${$(_value).attr("url")}?imageMogr2/thumbnail/!200x" width="200" height="${$(result).attr("height") / $(result).attr("width") * 200}">
                        </a>
                      </div>
                    </div>`);
                  });
                });
                that.setBody();
              });
              enmask();
            }
          };
      },
      onresize(){
          let that=this;
          window.onresize=function(){
              that.setBody();
          }
      },
      num() {
          return (Math.floor(this.waterfull.width() / (this.boxWidth + 15) ));
      },
      slidescroll() {
          return ($(document).height() <= $(window).height() + $(window).scrollTop() + 200);
      }
  };
  // new Position($(".box"),$("#waterfull"),[]);
  // $(window).on("load", function (){
      
  //     $.get("{{route('image.page')}}?page=" + page,function(result){
  //       page = result.current_page;
  //       new Position($(".box"),$("#waterfull"),result.data);
  //     });
  // });



  function ImageWaterFull(container){
    this.doc = container;
  }
  ImageWaterFull.prototype = {
    page:0,
    totalpage:0,
    column:5,
    data:[],
    y_position:[],
    x_position:[],
    current:0,
    getData(){
      let that = this;
      $.get("{{route('image.page')}}?page=" + (page + 1),function(result){
        that.page = result.current_page;
        that.totalpage =  result.last_page;
        that.data = that.data.concat(result.data);
      });
    },
    reset(){},
    setNext(){
      let that = this;
      if(current < column){
        let value = that.data[current];
        $.get( $(obj).attr("url") + "?imageInfo",function(result){
          that.doc.append(`<div class="box">
            <div class="content portfolio-item">
              <a class="portfolio-link" href="${$(value).attr("url")}"  target="_blank" id="image-${$(value).attr("id")}">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="glyphicon glyphicon-download-alt"></i>
                  </div>
                </div>
                <img class="img-fluid" src="${$(value).attr("url")}?imageMogr2/thumbnail/!${that.width()}x" width="${that.width()}" height="${$(result).attr("height") / $(result).attr("width") * that.width() }">
              </a>
            </div>
          </div>`);
          // 设置成功后
          setNext();
        });
        return;
      }
      if(this.data.length > current){
        
      }
    },
    scroll(){},
    width() {
      return (Math.floor(this.doc.width() / this.column) - 15);
    },
  };
</script>
@endpush