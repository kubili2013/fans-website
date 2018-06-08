@extends('default')

@section('content')
<section class="page-section cta">
    <div class="container">
        <div class="row">
        <div class="col-md-12 mx-auto">
            <h2 class="text-center" style="font-size:88px;">坤导航</h2>
        </div>
        </div>

        <div class="row"  style="padding-bottom:30px;">
        @foreach($navigations as $nav)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto" >
                <div class="navigation">
                    <a class="navigation-item" href="{{ $nav->url }}"  target="_blank">
                        <img class="" src="{{ $nav->image_url }}">
                        <div class="navigation-text">
                            <span></span>
                            <p>{{ $nav->title }}</p>
                            <span>{{ $nav->description }}</span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

@endsection
@push('css')
    <style>
    .mx-auto{
        padding:0 15px 0 15px;
    }
    .navigation{
        margin-top:15px;
        width:100%;
        background-color: rgba(3,3,3,0.8);
        border-radius: 8px;
        padding-left:0px;
        box-shadow:4px 4px 6px rgba(0, 0, 0, 0.9);
        display:inline-block;
        -webkit-transition:0.3s all ease;
	    -moz-transition:0.3s all ease;
	    -ms-transition:0.3s all ease;
	    -o-transition:0.3s all ease;
    }
    .navigation:hover{
        background-color: rgba(240,240,240,0.8);
        border-radius: 8px;
        padding-left:0px;
        box-shadow:4px 4px 6px rgba(0, 0, 0, 0.4);
    }
    .navigation:hover  img {
        border: 4px solid #999;
        border-radius: 8px;
        vertical-align:middle;
        -webkit-transition:0.3s all ease;
	    -moz-transition:0.3s all ease;
	    -ms-transition:0.3s all ease;
	    -o-transition:0.3s all ease;
    }
    .navigation:hover p{
        color:#333;
        margin:8px 0px 0px 0px;
        
    }
    .navigation:hover span{
        color:#333;
        -webkit-transition:0.3s all ease;
	    -moz-transition:0.3s all ease;
	    -ms-transition:0.3s all ease;
	    -o-transition:0.3s all ease;
    }
    .navigation-item{
        width:100%;
        margin-top:15px;
        padding:1px;
        height:102px;
        
    }
    .navigation-item > img{
        float: left;
        width:88px;
        display: inline;
        border: 4px solid #eee;
        border-radius: 8px;
        vertical-align:middle;
    }
    .navigation-item > .navigation-text{
        display: inline-block;
        margin-left:5px;
        
    }
    .navigation-text p{
        color:#fff;
        margin:12px 0px 0px 0px;
        font-size: 24px;
        font-family: zhulangzhongyuan;
        text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
        -webkit-text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
        -moz-text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
        -webkit-transition:0.3s all ease;
	    -moz-transition:0.3s all ease;
	    -ms-transition:0.3s all ease;
	    -o-transition:0.3s all ease;
    }
    .navigation-text span{
        color:#fff;
        font-size: 12px;
        font-family: zijingti;
        text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
        -webkit-text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
        -moz-text-shadow:#999 1px 0 0,#999 0 1px 0,#999 -1px 0 0,#999 0 -1px 0;
        -webkit-transition:0.3s all ease;
	    -moz-transition:0.3s all ease;
	    -ms-transition:0.3s all ease;
	    -o-transition:0.3s all ease;
    }
    </style>
@endpush