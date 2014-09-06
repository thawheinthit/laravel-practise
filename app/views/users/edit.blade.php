<!-- Start Notification -->
<div class="row">
    @include('layouts.notification')
</div>
<!-- End Notification -->

<!-- Start List Table -->
{{ Form::open(['route'=>['user.update',$user->id]]) }}
<div class="col-md-12" style="margin:10px 0 0 0;">
	<div class="col-md-4">
		

		<div class="form-group">
		    {{ Form::label('username', 'Name') }}
		    {{ Form::text('username',Input::old('username',$user->username), array('class'=>'form-control', 'placeholder' => 'Enter name'))  }}
	  	</div>
		
		<div class="form-group">
		    {{ Form::label('contactnumber', 'Contact Number') }}
		    {{ Form::text('contactnumber',Input::old('contactnumber',$user->contact_number), array('class'=>'form-control', 'placeholder' => 'Enter contact number'))  }}
	  	</div>

	  	<div class="form-group">
	      	{{ Form::label('password', 'Password') }}
	      	{{ isset($user) ? Form::password('password', array('class'=>'form-control', 'placeholder' => 'To change, enter new password. Or leave blank.')) : Form::password('inputPassword', array('class'=>'form-control', 'placeholder' => 'Enter password')) }}
	    </div>
	    	    
	  	<div class="form-group">
		    {{ Form::label('inputRole', 'User\'s role') }}
		    {{ Form::select('inputRole', array('user' => 'User', 'admin'=>'Administrator', 'delivery' => 'Delivery'), isset($user) ? $user->role : '', array('class' => 'form-control')) }} 
	  	</div>
		
	  	<div class="form-group">
		    {{ Form::submit('Save', $attribute = array('class'=>'btn btn-default', 'id' => 'btnCreate')) }}
		    {{ HTML::linkRoute('user.list','To all users',$parameters = array(),$attributes = array('class' => 'btn')) }}
	  	</div>

	  	
	</div>
</div>
{{Form::close()}}
