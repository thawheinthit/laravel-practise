<div class="col-md-12">
  @include('layouts.notification')
</div>

{{ Form::open(array('action' => 'HomeController@postRegister', 'id' => 'frmRegister')) }}
<div class="col-md-4">
	<div class="form-group">
	   {{ Form::label('inputUsername', 'Username') }}
	   {{ Form::text('inputUsername', '', $attributes = array('class'=>'form-control', 'placeholder' => 'Username')) }}
    </div>
	
    <div class="form-group">
       {{ Form::label('inputContactNumber', 'Contact Number') }}
       {{ Form::text('inputContactNumber', '', $attributes = array('class'=>'form-control', 'placeholder' => 'Contact Number')) }}
    </div>

	<div class="form-group">
	   {{ Form::label('inputPassword', 'Password') }}
	   {{ Form::password('inputPassword',  $attributes = array('class'=>'form-control', 'placeholder' => 'Password')) }}
    </div>

	<div class="form-group">
	   {{ Form::submit('Log in', $attribute = array('class'=>'btn btn-default', 'id' => 'btnLogin')) }}
    </div>
</div>
{{ Form::close() }}