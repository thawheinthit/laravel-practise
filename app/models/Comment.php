<?php

class Comment extends \Eloquent {
	protected $table = 'comments';
	protected $fillable = ['commenter', 'email', 'comment'];

	public function post(){
		return $this->belongsTo('Post');
	}
}