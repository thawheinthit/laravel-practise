<?php

class DishesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /dishes
	 *
	 * @return Response
	 */
	public function listDish()
	{
		$dishes = Dish::orderBy('id', 'desc')->paginate(3);
        $this->layout->title = 'Dishes listing';     
        $this->layout->main = View::make('dash')->nest('content', 'dishes.list', compact('dishes'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /dishes/create
	 *
	 * @return Response
	 */
	public function newDish()
	{
		$this->layout->title = 'New Dish';
        $this->layout->main = View::make('dash')->nest('content', 'dishes.new');
	}


	public function uploadDish(Dish $dish){
		$this->layout->title = "Upload images for {$dish->name}";
		$this->layout->main = View::make('dash')->nest('content', 'dishes.image',compact('dish'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dishes
	 *
	 * @return Response
	 */
	public function saveDish()
	{
		$dish = [
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'price' => Input::get('price'),
        ];
        $rules = [
            'name' => 'required',
            'price' => 'required',
        ];

        $valid = Validator::make($dish, $rules);
        if ($valid->passes()) {
            $dish = new Dish($dish);
            $dish->save();
            /* redirect back to the form portion of the page */
            $message = "{$dish->name} has been created";
			$msgTitle = 'Success!';
			$msgArr = array('message','msgTitle');
            return Redirect::route('dish.edit', $user->id)->with(compact($msgArr));
        } else {
            return Redirect::to(URL::previous() . '#reply')->withErrors($valid)->withInput();
        }
	}

	/**
	 * Display the specified resource.
	 * GET /dishes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showDish(Dish $dish)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /dishes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editDish(Dish $dish)
	{
		$this->layout->title = "Edit Dish {$dish->name}";
		$image = Image::where("used_by", "=", "{$dish->id}")->firstOrFail();
		$dish->filename = $image->filename;
		
        $this->layout->main = View::make('dash')->nest('content', 'dishes.edit', compact('dish'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /dishes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateDish(Dish $dish)
	{
		$data = [
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'price' => Input::get('price'),
        ];
        $rules = [
            'name' => 'required',
            'price' => 'required',
        ];
        $valid = Validator::make($data, $rules);
        if ($valid->passes()) {
            $dish->name = $data['name'];
            $dish->description = $data['description'];
            $dish->price = $data['price'];

            if (count($dish->getDirty()) > 0) /* avoiding resubmission of same content */ {
                $dish->save();
	            $message = "{$dish->name} has been updated";
				$msgTitle = 'Success!';
				$msgArr = array('message','msgTitle');
	            return Redirect::back()->withInput()->with(compact($msgArr));
            } else{
            	$message = "Nothing to update";
				$msgTitle = 'Same content!';
				$msgType = 'info';
				$msgArr = array('message','msgTitle','msgType');
				return Redirect::back()->withInput()->with(compact($msgArr));
            }
        } else
            return Redirect::back()->withErrors($valid)->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /dishes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteDish(Dish $dish)
	{
		$dish->delete();
		$message = "{$dish->username} has been deleted";
		$msgTitle = 'Success!';
		$msgArr = array('message','msgTitle');
        return Redirect::route('dish.list')->with(compact($msgArr));
	}

}