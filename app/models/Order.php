<?php

class Order extends \Eloquent {
	protected $table = 'orders';
	protected $fillable = ['order_number','contact_id','user_id','deliver_time','delivery_address','pickup','status','quantity'];
}