<!-- Start Notification -->
<div class="row">
    @include('layouts.notification')
</div>
<!-- End Notification -->

<!-- Start List Table -->
{{ Form::open(['route'=>['user.save']]) }}
<div class="col-md-12" style="margin:10px 0 0 0;">
	<div class="col-md-4">
		

		<div class="form-group">
		    {{ Form::label('username', 'Name') }}
		    {{ Form::text('username',Input::old('username'), array('class'=>'form-control', 'placeholder' => 'Enter name'))  }}
	  	</div>
		
		<div class="form-group">
		    {{ Form::label('email', 'Email address') }}
		    {{ Form::text('email',Input::old('email'), array('class'=>'form-control', 'placeholder' => 'Enter email'))  }}
	  	</div>

	  	<div class="form-group">
	      	{{ Form::label('password', 'Password') }}
	      	{{ Form::password('password',  $attributes = array('class'=>'form-control', 'placeholder' => 'Password')) }}
	      	
	    </div>
	    	    
	  	<div class="form-group">
		    {{ Form::label('inputRole', 'User\'s role') }}
		    {{ Form::select('inputRole', array('user' => 'User', 'admin'=>'Administrator'), isset($user) ? $user->role : '', array('class' => 'form-control')) }} 
	  	</div>
		
	  	<div class="form-group">
		    {{ Form::submit('Save', $attribute = array('class'=>'btn btn-default', 'id' => 'btnCreate')) }}
		    {{HTML::linkRoute('user.list','To all users',$parameters = array(),$attributes = array('class' => 'btn'))}}
	  	</div>

	  	
	</div>
</div>
{{Form::close()}}
