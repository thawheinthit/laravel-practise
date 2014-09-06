

<!-- Start Notification -->
<div class="row">
    @include('layouts.notification')
</div>
<!-- End Notification -->

<div class="row">
	<div class="col-md-3">{{ link_to('admin/deliveries/list', "All", $attributes = array(), $secure = null) }}</div>
	<div class="col-md-3">{{ link_to('admin/deliveries/manage', "Manage", $attributes = array(), $secure = null) }}</div>
	<div class="col-md-3">{{ link_to('admin/deliveries/completed', "Completed", $attributes = array(), $secure = null) }}</div>
</div>

List of deliveries