<!-- Start Order Search -->
@include('orders.search')
<!-- End Order Search -->

<!-- Start Notification -->
<div class="row">
    @include('layouts.notification')
</div>
<!-- End Notification -->

<!-- Start List Table -->
<div class="row">
<div class="col-md-12">
		<div id="no-more-tables" class="tbl">
			<table class="table-bordered table-striped table-condensed cf" id="tblContainer" style="width: 100%">
				<thead class="cf">          
			    	<tr>
			            <th class="header" width="10%">Order No</th>
			            <th class="header" width="10%">User Id</th>
			            <th class="header" width="10%">Contact Id</th>
			            <th class="header" width="10%">D Time</th>
			            <th class="header" width="20%">D Address</th>
			            <th class="header" width="5%">Pickup</th>
			            <th class="header" width="5%">Status</th>
			            <th class="header" width="5%">Quantity</th>
			       		<th class="header" style="transparent:true;" width="10%">Actions</th>
			    	</tr>
				</thead>
				<tbody>

					@foreach($orders as $order)
			            <tr>
			                <td>{{$order->order_number}}</td>
			                <td>{{$order->user_id}}</td>
			                <td>{{$order->contact_id}}</td>
			                <td>{{$order->deliver_time}}</td>
			                <td>{{$order->delivery_address}}</td>
			                <td>{{$order->pickup}}</td>
			                <td>{{$order->status}}</td>
			                <td>{{$order->quantity}}</td>
                			<td>
                				{{HTML::linkRoute('order.edit','Edit',$order->order_number)}} | 
                				{{HTML::linkRoute('order.delete','Delete',$order->order_number)}} | 
                				{{HTML::linkRoute('order.edit','View',$order->order_number)}}
                			</td>
			            </tr>
			        @endforeach
									
				</tbody>
			</table>
		</div>
		
	</div>

</div>
<!-- End List Table -->

