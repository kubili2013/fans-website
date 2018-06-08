@extends('default')

@section('content')
<section class="page-section cta">
    <div class="container">
        <div class="row">
        <div class="col-md-12 mx-auto">
            <h2 class="text-center" style="font-size:88px;">粉丝墙</h2>
        </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        @foreach($fans as $user)
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 text-center">
                <div class="team-member">
                    <img class="img-circle" src="{{$user->avatar}}" alt="">
                    <!-- <ul class="menu">
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-google-plus"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-linkedin"></a></li>
                        <li><a href="#" class="fa fa-pinterest"></a></li>
                        <li><a href="#" class="fa fa-rss"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-skype"></a></li>
                        <li><a href="#" class="fa fa-github"></a></li>
                    </ul> -->
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection