<!-- Start User Search -->
@include('dishes.search')
<!-- End User Search -->

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
			            <th class="header" width="20%">Name</th>
			            <th class="header" width="40%">Description</th>
			            <th class="header" width="5%">Price</th>
			       		<th class="header" style="transparent:true;" width="10%">Actions</th>
			    	</tr>
				</thead>
				<tbody>

					@foreach($dishes as $dish)
			            <tr>
			                <td>{{$dish->name}}</td>
			                <td>{{$dish->description}}</td>
			                <td align="center">
			                	{{$dish->price}}
			                </span></td>
                			<td>
                				{{HTML::linkRoute('dish.edit','Edit',$dish->id)}} | 
                				{{HTML::linkRoute('dish.delete','Delete',$dish->id)}} | 
                				{{HTML::linkRoute('dish.edit','View',$dish->id)}}
                			</td>
			            </tr>
			        @endforeach
									
				</tbody>
			</table>
		</div>
		
	</div>

</div>
<!-- End List Table -->

