<div class="col-md-12">
  @include('layouts.notification')
</div>

{{ Form::open(array('action' => 'HomeController@postLogin', 'id' => 'frmLogin')) }}
<div class="col-md-4">

	<div class="form-group">
	  {{ Form::label('inputUsername', 'Username') }}
	  {{ Form::text('inputUsername', '', $attributes = array('class'=>'form-control', 'placeholder' => 'Username')) }}
  </div>
	
	<div class="form-group">
	  {{ Form::label('inputPassword', 'Password') }}
	  {{ Form::password('inputPassword',  $attributes = array('class'=>'form-control', 'placeholder' => 'Password')) }}
  </div>

  <div class="form-group">
    <div class="checkbox">
      <label>
        {{ Form::checkbox('remember', '1') }} Remember me
      </label>
    </div>
  </div>

	<div class="form-group">
	  {{ Form::submit('Log in', $attribute = array('class'=>'btn btn-default', 'id' => 'btnLogin')) }}
  </div>

  <hr/>
  <p>
  	{{ link_to('#', "Forget password?", $attributes = array(), $secure = null) }}
  </p>
  <p>
  	{{ link_to('user/register', "Create a new account", $attributes = array(), $secure = null) }}
  </p>

</div>

{{ Form::close() }}