<?php

/* Model Bindings */
Route::model('post', 'Post');
Route::model('user', 'User');


Route::get('test',function(){
    $posts = User::find(1)->posts();
    return count($posts);
});
/* User routes */
Route::get('/posts/{post}/show', ['as' => 'post.show', 'uses' => 'PostsController@showPost']);
// Route::post('/post/{post}/comment', ['as' => 'comment.new', 'uses' => 'CommentController@newComment']);


/* Admin routes */
Route::group(['prefix' => 'admin', 'before' => 'auth'], function () {

	/*get routes*/
    Route::get('dashboard', function () {
        return Redirect::route('user.list');
    });

    /*users's get routes*/
    Route::get('/users/list', ['as' => 'user.list', 'uses' => 'UsersController@listUser']);
    Route::get('/users/new', ['as' => 'user.new', 'uses' => 'UsersController@newUser']);
    Route::get('/users/{user}/edit', ['as' => 'user.edit', 'uses' => 'UsersController@editUser']);
    Route::get('/users/{user}/delete', ['as' => 'user.delete', 'uses' => 'UsersController@deleteUser']);
    
    Route::get('/users/{user}/posts',['as'=>'user.post','uses'=>'UsersController@listPosts']);

    /*users's post routes*/
    Route::post('/users/save', ['as' => 'user.save', 'uses' => 'UsersController@saveUser']);
    Route::post('/users/{user}/update', ['as' => 'user.update', 'uses' => 'UsersController@updateUser']);
    
    
    /*posts's get routes*/
    Route::get('/posts/list', ['as' => 'post.list', 'uses' => 'PostsController@listPost']);
    Route::get('/posts/new', ['as' => 'post.new', 'uses' => 'PostsController@newPost']);
    Route::get('/posts/{post}/edit', ['as' => 'post.edit', 'uses' => 'PostsController@editPost']);
    Route::get('/posts/{post}/delete', ['as' => 'post.delete', 'uses' => 'PostsController@deletePost']);
    
    /*posts's post routes*/
    Route::post('/posts/save', ['as' => 'post.save', 'uses' => 'PostsController@savePost']);
    Route::post('/posts/{post}/update', ['as' => 'post.update', 'uses' => 'PostsController@updatePost']);    
        
    
});

/* Home routes */
Route::controller('/', 'HomeController');
