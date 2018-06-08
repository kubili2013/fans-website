<div class="container">
@if (Session::has('flash_message_success'))
    <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important':''}}">
            @if (Session::has('flash_message_important'))
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
            {{Session::get('flash_message_success')}}
    </div>
@endif

@if (Session::has('flash_message_error'))
    <div class="alert alert-danger {{ Session::has('flash_message_important') ? 'alert-important':''}}">
            @if (Session::has('flash_message_important'))
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
            {{Session::get('flash_message_error')}}
    </div>
@endif
</div>