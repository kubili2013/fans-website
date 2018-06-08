<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="/css/GalMenu.css">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.jsdelivr.net/npm/trianglify@1.2.0/dist/trianglify.min.js"></script>
        
        <title>Laravel</title>

        <!-- Styles -->
        <style>
            body{
                color:#ddd;
            }
            body > canvas  {
                position: fixed;
                left: 50%;
                top: 50%;
                -webkit-transform: translate(-50%,-50%);
                transform: translate(-50%,-50%);
                min-width: 100%;
                z-index：-1;
                color:#fff;
                text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
                -webkit-text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
                -moz-text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
            }
            .text-muted {
                font-size: 16px;
                color:#ddd;
                text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
                -webkit-text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
                -moz-text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
            }
            img {
                display: block;
            }
        </style>
        @stack('css')
    </head>
    <body>
        <script>
            var pattern = Trianglify({
                width: window.innerWidth,
                height: window.innerHeight
            });
            document.body.appendChild(pattern.canvas());
            document.getElementsByTagName("canvas")[0].style.zIndex = -1;
        </script>
        <div class="galMenu galRing">
            <div class="circle" id="gal">
              <div class="ring">
                <a href="{{route('home')}}" data-toggle="tooltip" data-placement="top" title="收集关于坤坤的各种网页链接" class="menuItem">坤导航</a>
                <a href="{{route('images')}}" data-toggle="tooltip" data-placement="top"  title="来自于大家分享的各种坤坤美图" class="menuItem">坤美图</a>
                <a href="{{route('videos')}}" data-toggle="tooltip" data-placement="top"  title="来自于大家分享的各种坤坤视频" class="menuItem">坤视频</a>
                <a href="{{route('news')}}" data-toggle="tooltip" data-placement="top"  title="坤坤的动态" class="menuItem">坤动态</a>
                <a href="{{route('goods')}}" data-toggle="tooltip" data-placement="top" title="各种关于坤坤的好物分享" class="menuItem">坤好物</a>
                <a href="{{route('fans')}}" data-toggle="tooltip" data-placement="top" title="粉丝们来登陆一下报个到吧！" class="menuItem">粉丝墙</a>
                <a href="{{route('about')}}" data-toggle="tooltip" data-placement="top" title="关于本站的问题以及信息" class="menuItem">关于</a>
              </div>
              <audio id="galAudio" src="/audio/xnm.mp3"></audio>
            </div>
        </div>
        <div id="overlay" style="opacity: 1; cursor: pointer;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto text-right">
                    @guest
                        <a href="{{route('oauth',['weibo'])}}" style="line-height:60px;font-size:20px;color:#fff">使用微博登陆</a>
                    @endguest
                    @auth
                    <ul class="navigation-">
                        <li><a href="#" data-toggle="modal" data-target="#plus-choose"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a></li>
                        <li><a href="{{route('my.index',['user_id' => Auth::id()])}}"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></a></li>
                    </ul>
                    <div id="plus-choose" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm"  role="document">
                            <div class="modal-content text-center" style="background-color:rgba(255,255,255,0.8);">
                            <div class="plus-tools-item">
                                <a href="{{route('video.add')}}"  data-toggle="tooltip" data-placement="top" title="我要上传坤坤视频" ><i class="glyphicon glyphicon-film"></i></a>
                                <a href="{{route('image.add')}}"  data-toggle="tooltip" data-placement="top" title="我要上传坤坤美图" ><i class="glyphicon glyphicon-picture"></i></a>
                                @if(Auth::user()->isAdmin())<a href="{{route('navigation.add')}}"  data-toggle="tooltip" data-placement="top" title="添加导航" ><i class="glyphicon glyphicon-pushpin"></i></a>@endif
                                <a href="{{route('news.add')}}"  data-toggle="tooltip" data-placement="top" title="我要添加坤坤的动态" ><i class="glyphicon glyphicon-option-vertical"></i></a>
                                @if(Auth::user()->isAdmin())<a href="{{route('goods.add')}}"  data-toggle="tooltip" data-placement="top" title="添加好物链接" ><i class="glyphicon glyphicon-th"></i></a>@endif
                            </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        @yield('content')

        <script type="text/javascript" src="/js/app.js"></script>
        <script type="text/javascript" src="/js/GalMenu.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("body").galMenu({
                    menu:"galRing",
                    click_to_close:true,
                    stay_open:false
                });
                $('[data-toggle="tooltip"]').tooltip();
                $( ".button" ).click(function() {
                    $(this).toggleClass( "active" );
                    $(".icons").toggleClass( "open" );
                });
            });
        </script>

        @stack('script')
    </body>
</html>
