<div class="col-md-12">
  @if(Session::has('message') || $errors->has())
  <div id="notification" style="margin-top:5px">
    <!-- info, success, warning, danger -->
	
	@if($errors->has())
		<div class="alert alert-warning" role="alert">
	@else
		<div class="alert alert-{{{ Session::has('msgType') ? Session::get('msgType') : 'success' }}} " role="alert">
	@endif

	    <!-- Error Info -->
	    @foreach ($errors->all() as $error)
	    	<p>{{$error}}</p>
		@endforeach

		<!-- Msg Info -->
      	<strong>{{{ Session::has('msgTitle') ? Session::get('msgTitle') : '' }}}</strong> 
      	{{{ Session::get('message') }}}

    </div>
  </div>
  <div class="clr"></div>
@endif
</div>