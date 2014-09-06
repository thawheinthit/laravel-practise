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
        $this->layout->title = 'Login';
        $this->layout->main = View::make('login');
    }

    public function postLogin(){
    	$credentials = array(
			'username' => Input::get('inputUsername'),
			'password' => Input::get('inputPassword')
		);
		if ( Auth::attempt($credentials)) {

			# Redirect separately	
			if(Auth::user()->role == 'user') {
				return Redirect::to('/dishes/list');
			}

			if(Auth::user()->role == 'admin') {
				return Redirect::to('/admin/users/list');
			}

			if(Auth::user()->role == 'delivery') {
				return Redirect::to('/deliveries/list');
			}
			
		} else {
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

    public function getRegister()
    {
    	$this->layout->title = 'Register';
        $this->layout->main = View::make('register');
    }

    public function postRegister()
    {
    	$user = new User;
		
		# Create the user no matter what
		$user = User::create(array(
			'username' => Input::get('inputUsername'),	
			'contact_number' => Input::get('inputContactNumber'),
			'password' => Hash::make(Input::get('inputPassword'))
		));
			
		// Go to login page
		if (!$user) {
			$message = 'username or password is invalid!';
			$msgType = 'danger';
			$msgArr = array('message','msgType');
			return Redirect::back()->withInput()->with(compact($msgArr));
		} else {
			return Redirect::action('HomeController@getIndex');	
		}		
    }
}
