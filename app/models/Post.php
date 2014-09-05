<?php

class Post extends \Eloquent {
	protected $table = 'posts';
	protected $fillable = ['title', 'content'];

	public function user(){
		return $this->belongsTo('User');
	}

	public function comments(){
		return $this->hasMany('Comment');
	}
}