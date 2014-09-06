<?php

/* Model Bindings */
Route::model('post', 'Post');
Route::model('user', 'User');
Route::model('dish', 'Dish');

Route::get('test',function(){
    $posts = User::find(1)->posts();
    return count($posts);
});
/* User routes */
Route::get('/posts/{post}/show', ['as' => 'post.show', 'uses' => 'PostsController@showPost']);
// Route::post('/post/{post}/comment', ['as' => 'comment.new', 'uses' => 'CommentController@newComment']);


/*dishes's get routes*/
Route::get('/dishes/list', ['as' => 'dish.list', 'uses' => 'DishesController@listDish']);
Route::get('/dishes/new', ['as' => 'dish.new', 'uses' => 'DishesController@newDish']);
Route::get('/dishes/{dish}/show', ['as' => 'dish.show', 'uses' => 'DishesController@showDish']);
Route::get('/dishes/{dish}/edit', ['as' => 'dish.edit', 'uses' => 'DishesController@editDish']);
Route::get('/dishes/{dish}/delete', ['as' => 'dish.delete', 'uses' => 'DishesController@deleteDish']);

/*dishes's post routes*/
Route::post('/dishes/save', ['as' => 'dish.save', 'uses' => 'DishesController@saveDish']);
Route::post('/dishes/{dish}/update', ['as' => 'dish.update', 'uses' => 'DishesController@updateDish']);



/*orders's get routes*/
Route::get('/orders/list', ['as' => 'order.list', 'uses' => 'OrdersController@listOrder']);
Route::get('/orders/new', ['as' => 'order.new', 'uses' => 'OrdersController@newOrder']);
Route::get('/orders/{order}/show', ['as' => 'order.show', 'uses' => 'OrdersController@showOrder']);
Route::get('/orders/{order}/edit', ['as' => 'order.edit', 'uses' => 'OrdersController@editOrder']);
Route::get('/orders/{order}/delete', ['as' => 'order.delete', 'uses' => 'OrdersController@deleteOrder']);

/*orders's post routes*/
Route::post('/orders/save', ['as' => 'order.save', 'uses' => 'OrdersController@saveOrder']);
Route::post('/orders/{order}/update', ['as' => 'order.update', 'uses' => 'OrdersController@updateOrder']);



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
    
    /*Delivery's get routes*/
    Route::get('/deliveries/list', ['as' => 'deliveries.list', 'uses' => 'DeliveryController@getIndex']);
    Route::get('/deliveries/manage', ['as' => 'deliveries.manage', 'uses' => 'DeliveryController@getManage']);
    Route::get('/deliveries/deleted', ['as' => 'deliveries.completed', 'uses' => 'DeliveryController@getCompleted']);
});

/* Home routes */
Route::controller('/', 'HomeController');
