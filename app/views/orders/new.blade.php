<!-- Start Notification -->
<div class="row">
    @include('layouts.notification')
</div>
<!-- End Notification -->

<!-- Start List Table -->
{{ Form::open(['route'=>['order.save']]) }}
<div class="col-md-12" style="margin:10px 0 0 0;">
	<div class="col-md-4">
		

		<div class="form-group">
		    {{ Form::label('order_number', 'Order No') }}
		    {{ Form::text('order_number',Input::old('order_number'), array('class'=>'form-control', 'placeholder' => 'Enter order no'))  }}
	  	</div>
		
		<div class="form-group">
		    {{ Form::label('user_id', 'User Id') }}
		    {{ Form::text('user_id',Input::old('user_id'), array('class'=>'form-control', 'placeholder' => 'Enter user id'))  }}
	  	</div>

		<div class="form-group">
		    {{ Form::label('contact_id', 'Contact Id') }}
		    {{ Form::text('contact_id',Input::old('contact_id'), array('class'=>'form-control', 'placeholder' => 'Enter contact id'))  }}
	  	</div>
		
		<div class="form-group">
		    {{ Form::label('deliver_time', 'Deliver Date/Time') }}
		    {{ Form::text('contact_id',Input::old('contact_id'), array('class'=>'form-control', 'placeholder' => 'Enter contact id'))  }}
	  	</div>

		<div class="form-group">
		    {{ Form::label('delivery_address', 'Delivery Address') }}
		    {{ Form::textarea('delivery_address',Input::old('delivery_address'), array('rows' => 5, 'class'=>'form-control', 'placeholder' => 'Select Delivery Date/Time'))  }}
	  	</div>

		<div class="form-group">
		    {{ Form::label('pickup', 'Pickup') }}
			{{ Form::radio('pickup', 1, true) }} Yes
			{{ Form::radio('pickup', 0, false) }} No    
	  	</div>

	  	<div class="form-group">
		    {{ Form::label('quantity', 'Quantity') }}
		    {{ Form::text('quantity',Input::old('quantity'), array('class'=>'form-control', 'placeholder' => 'Enter quantity'))  }}
	  	</div>


	  	<div class="form-group">
		    {{ Form::submit('Save', $attribute = array('class'=>'btn btn-default', 'id' => 'btnCreate')) }}
		    {{HTML::linkRoute('order.list','To all orders',$parameters = array(),$attributes = array('class' => 'btn'))}}
	  	</div>

	  	
	</div>
</div>
{{Form::close()}}
