<div class="row search_container">
    <div class="col-md-2">
        {{ Form::text('inputSearchName', isset($keyword)? $keyword : '', $attributes = array( 'class'=>'form-control', 'placeholder' => 'Search name')) }}  
    </div>
    <div class="col-md-3">
        <div style="margin-top:3px"></div>
         {{ Form::submit('Search', $attribute = array('class'=>'btn btn-default', 'id' => 'btnSearch')) }}
          {{HTML::linkRoute('order.new','New Order',$parameters = array(),$attributes = array('class' => 'btn'))}}
    </div>
    <div class="col-md-3" style="float:right">
       
    </div>
</div>