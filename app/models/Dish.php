<?php

class Dish extends \Eloquent {
	protected $table = 'dishes';
	protected $fillable = ['name','description','price'];
}