<!-- Start Notification -->
<div class="row">
    @include('layouts.notification')
</div>
<!-- End Notification -->

@foreach($users as $user)
<div class="row">
	<div class="col-md-3">{{ link_to("admin/deliveries/$user->id/assign", $user->username, $attributes = array(), $secure = null) }}</div>
	
</div>
@endforeach