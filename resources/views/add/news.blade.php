@extends('default')

@section('content')
@include('layouts.message')
<section class="page-section cta">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mx-auto">
              <div class="cta-inner rounded">
                <h2 class="section-heading  text-center mb-4">
                  <span class="section-heading-lower">新建坤坤动态</span>
                </h2>
                <div class="row">
                    <div class="col-md-12 mx-auto">
                    <div class="form-group  has-error">
                      <input class="form-control" id="upload_news_input" type="file" placeholder="选择图片Logo文件" accept="image/*">
                      <p class="help-block text-danger"></p>
                    </div>
                    <form id="upload_news_form" name="upload_news_form" novalidate="novalidate" action="{{route('news.store')}}" method="POST">
                      <div class="row">
                        <div class="col-md-12">
                          {{ csrf_field() }}
                          <input type="hidden" name="size">
                          <input type="hidden" name="image_url">
                          <div class="form-group {{ $errors->has('about_date') ? ' has-error' : '' }}">
                            <input class="form-control" type="date" name="about_date" placeholder="时间" required="required" data-validation-required-message="您必须输入一个标题。">
                            @if ($errors->has('about_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about_date') }}</strong>
                                </span>
                            @endif
                          </div>
                          <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <input class="form-control" type="text" name="title" placeholder="标题" required="required" data-validation-required-message="您必须输入一个标题。">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                          </div>
                          <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <textarea class="form-control"  name="description"  placeholder="描述" required="required" data-validation-required-message="描述一下你的图片吧！"></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                          <!-- 防止表确定提交的问题 -->
                          <input type='text' style='display:none'/>
                          <button id="upload_btn" class="btn btn-primary btn-xl text-uppercase" type="submit" disabled="disabled">&nbsp;确定&nbsp;</button>
                        </div>
                      </div>
                    </form>
                    </div>
                    
                </div>
                
              </div>
            </div>
          </div>
        </div>
    </section>  
@endsection

@push('script')

<script src="https://cdn.jsdelivr.net/npm/qiniu-js@2.2.2/dist/qiniu.min.js"></script>

<script>
  var domain = "//{{config('filesystems.disks.qiniu.domains.default')}}";
  var config = {
    useCdnDomain: true,
    disableStatisticsReport: false,
    retryCount: 5,
    region: qiniu.region.z0
  };
  var putExtra = {
    fname: "",
    params: {},
    mimeType:["image/png", "image/jpeg", "image/gif"]
  };
  var subObject = { 
        next: function(response){
          var total = response.total;
          $("#upload_news_input").next().html('正在上传，上传进度：' + Math.floor(total.percent) / 100  + "%。");
        },
        error: function(res){
          $("#upload_news_input").next().html("上传出错，刷新重试！");
        },
        complete: function(res){
          // 上传成功！
          $("#upload_news_input").next().html("上传成功！");
          $("#upload_btn").removeAttr("disabled");
        }
      };
  $("#upload_news_input").change(function(){
    var file = this.files[0];
    var fileExt = (/[.]/.exec(file.name)) ? /[^.]+$/.exec(file.name.toLowerCase()) : '';
    var key =  (new Date()).valueOf() + "." + fileExt;
    $("#upload_news_form input[name=size]").val(file.size / 1024 / 1024);
    $("#upload_news_form input[name=image_url]").val(domain + "/" + key);
    $.get('{{route("qiniu.token")}}?key='+ key,function(result){
      var observable = qiniu.upload(file, key,  result.token, putExtra, config);
      var subscription = observable.subscribe(subObject);
    });
    
  });
</script>
</script>
@endpush