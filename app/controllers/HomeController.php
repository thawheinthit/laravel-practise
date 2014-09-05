<?php

class HomeController extends BaseController {

	public function __construct()
    {
        //updated: prevents re-login.
        $this->beforeFilter('guest', ['only' => ['getLogin']]);
        $this->beforeFilter('auth', ['only' => ['getLogout']]);
    }
    
	public function getIndex()
	{
		$posts = Post::orderBy('id', 'desc')->paginate(3);
		$this->layout->title = 'Home Page | Laravel 4 Blog';
		$this->layout->main = View::make('home')->nest('content','posts.index', compact('posts'));
	}

	public function getLogin()
    {
        $this->layout->title = 'login';
        $this->layout->main = View::make('login');
    }

    public function postLogin(){
    	$credentials = array(
			'email' => Input::get('inputEmail'),
			'password' => Input::get('inputPassword')
		);
		if( Auth::attempt($credentials)) {

		// Incase need to redirect separately	
			// if(Auth::user()->role == 'admin') {
			// 	return Redirect::to('admin/dashboard');
			// }
			return Redirect::to('admin/dashboard');
		}else{
			$message = 'username or password is invalid!';
			$msgType = 'danger';
			$msgArr = array('message','msgType');
			return Redirect::back()->withInput()->with(compact($msgArr));

		}

    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
