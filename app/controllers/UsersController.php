<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function listUser()
	{
		$users = User::where('role', '=', 'user')->orderBy('id', 'desc')->paginate(3);
        $this->layout->title = 'User listings';     
        $this->layout->main = View::make('dash')->nest('content', 'users.list', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function newUser()
	{
		$this->layout->title = 'New User';
        $this->layout->main = View::make('dash')->nest('content', 'users.new');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function saveUser()
	{
		$user = [
            'username' => Input::get('username'),
            'contact_number' => Input::get('contactnumber'),
            'password' => Input::get('password'),
        ];
        
        $user = new User($user);
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        
        /* redirect back to the form portion of the page */
        $message = "{$user->username} has been created";
		$msgTitle = 'Success!';
		$msgArr = array('message','msgTitle');
        return Redirect::route('user.edit', $user->id)->with(compact($msgArr));        
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(User $user)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editUser(User $user)
	{
		$this->layout->title = 'Edit User';
        $this->layout->main = View::make('dash')->nest('content', 'users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateUser(User $user)
	{
		$data = [
            'username' => Input::get('username'),
            'contact_number' => Input::get('contactnumber'),
            'role' => Input::get('inputRole')
        ];
        
        $user->username = $data['username'];
        $user->contact_number = $data['contact_number'];
        $user->role = $data['role'];

        $user->save();
	    $message = "{$user->username} has been updated";
		$msgTitle = 'Success!';
		$msgArr = array('message','msgTitle');
	    return Redirect::back()->withInput()->with(compact($msgArr));
    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteUser(User $user)
	{
		$user->delete();
		$message = "{$user->username} has been deleted";
		$msgTitle = 'Success!';
		$msgArr = array('message','msgTitle');
        return Redirect::route('user.list')->with(compact($msgArr));
	}

}