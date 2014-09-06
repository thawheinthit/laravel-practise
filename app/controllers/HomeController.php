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

			// Incase need to redirect separately	
			// if(Auth::user()->role == 'admin') {
			// 	return Redirect::to('admin/dashboard');
			// }
			return Redirect::to('dishmenu');
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
		
		// Create the user no matter what
		$user = User::create(array(
			'name' => Input::get('inputUsername'),	
			'contact_number' => Input::get('inputContactNumber'),
			'password' => Hash::make(Input::get('inputPassword')),
			'role' => 'user'
		));
			
			// Go to login page
			if (!$user) {
				return Redirect::to('admin/dashboard');			
			} else {
				$message = 'username or password is invalid!';
				$msgType = 'danger';
				$msgArr = array('message','msgType');
				return Redirect::back()->withInput()->with(compact($msgArr));
			}		
    }
}
