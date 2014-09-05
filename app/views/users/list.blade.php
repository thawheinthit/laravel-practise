<!-- Start User Search -->
@include('users.search')
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
			            <th class="header" width="20%">Username</th>
			            <th class="header" width="40%">Email</th>
			            <th class="header" width="5%"># Posts</th>
			       		<th class="header" style="transparent:true;" width="10%">Actions</th>
			    	</tr>
				</thead>
				<tbody>

					@foreach($users as $user)
			            <tr>
			                <td>{{$user->username}}</td>
			                <td>{{$user->email}}</td>
			                <td align="center"><span class="badge">
			                	{{count($user->posts)}}
			                </span></td>
                			<td>
                				{{HTML::linkRoute('user.edit','Edit',$user->id)}} | 
                				{{HTML::linkRoute('user.delete','Delete',$user->id)}} | 
                				{{HTML::linkRoute('user.edit','View',$user->id,['target'=>'_blank'])}}
                			</td>
			            </tr>
			        @endforeach
									
				</tbody>
			</table>
		</div>
		
	</div>

</div>
<!-- End List Table -->

