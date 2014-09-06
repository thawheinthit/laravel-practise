<!-- Start Notification -->
<div class="row">
    @include('layouts.notification')
</div>
<!-- End Notification -->
<!-- Start List Table -->
{{ Form::open(['route'=>['dish.update',$dish->id]]) }}
<div class="col-md-12" style="margin:10px 0 0 0;">
	<div class="col-md-4">

		<div class="form-group">
		    {{ Form::label('name', 'Name') }}
		    {{ Form::text('name',Input::old('name',$dish->name), array('class'=>'form-control', 'placeholder' => 'Enter dish name'))  }}
	  	</div>
		
		<div class="form-group">
		    {{ Form::label('description', 'Description') }}
		    {{ Form::textarea('description',Input::old('description',$dish->description), array('rows' => 5, 'class'=>'form-control', 'placeholder' => 'Enter description'))  }}
	  	</div>
	    	    
	  	<div class="form-group">
		    {{ Form::label('price', 'Price') }}
		    {{ Form::text('price',Input::old('price',$dish->price), array('class'=>'form-control', 'placeholder' => 'Enter dish price'))  }}
	  	</div>
		
	  	<div class="form-group">
		    {{ Form::submit('Save', $attribute = array('class'=>'btn btn-default', 'id' => 'btnCreate')) }}
		    {{HTML::linkRoute('dish.list','To all dishes',$parameters = array(),$attributes = array('class' => 'btn'))}}
	  	</div>

	  	
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<img src="{{'/dishes/'.$dish->filename}}" style="width:120px;height: 120px;" alt="{{$dish->name}}"/><br/>
			{{HTML::linkRoute('dish.upload','Edit',$parameters = array($dish->id),$attributes = array('class' => ''))}}
		</div>
	</div>
</div>
{{Form::close()}}
