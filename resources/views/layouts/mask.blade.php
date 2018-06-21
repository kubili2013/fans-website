
<div id="loading" style="display:none;">
    <img src="img/loading.gif">
</div>

@push('script')
<script>
 function mask(){
         debugger;
    $('#loading').show();
    $('body').css("overflow","hidden");
 }
 function enmask(){
        $('#loading').hide();
    $('body').css("overflow","auto");
 }
 </script>
@endpush

@push('css')
<style>
#loading {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.5);
	z-index: 15000;
}
#loading img {
	position: absolute;
	top: 50%;
	left: 50%;
	width: 126px;
	height: 22px;
	margin-top: -63px;
	margin-left: -63px;
}
</style>
@endpush