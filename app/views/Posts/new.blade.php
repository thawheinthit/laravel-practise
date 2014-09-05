<!-- Start Notification -->
<div class="row">
    @include('layouts.notification')
</div>
<!-- End Notification -->

<!-- Start List Table -->
{{ Form::open(['route'=>['post.save']]) }}
<div class="col-md-12" style="margin:10px 0 0 0;">
	<div class="col-md-4">
		

		<div class="form-group">
		    {{ Form::label('title', 'Title') }}
		    {{ Form::text('title',Input::old('title'), array('class'=>'form-control', 'placeholder' => 'Enter blog title'))  }}
	  	</div>
		
		<div class="form-group">
		    {{ Form::label('content', 'Content') }}
		    {{ Form::textarea('content',Input::old('content'), array('rows' => 5, 'class'=>'form-control', 'placeholder' => 'Enter blog content'))  }}
	  	</div>
		
	  	<div class="form-group">
		    {{ Form::submit('Save', $attribute = array('class'=>'btn btn-default', 'id' => 'btnCreate')) }}
		    {{HTML::linkRoute('post.list','To all users',$parameters = array(),$attributes = array('class' => 'btn'))}}
	  	</div>

	  	
	</div>
</div>
{{Form::close()}}
