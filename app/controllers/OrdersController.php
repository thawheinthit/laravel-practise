<?php

class OrdersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /orders
	 *
	 * @return Response
	 */
	public function listOrder()
	{
		$orders = Order::all();
        $this->layout->title = 'Orders listing';     
        $this->layout->main = View::make('dash')->nest('content', 'orders.list', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /orders/create
	 *
	 * @return Response
	 */
	public function newOrder()
	{
		$this->layout->title = 'New Order';
        $this->layout->main = View::make('dash')->nest('content', 'orders.new');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /orders
	 *
	 * @return Response
	 */
	public function saveOrder()
	{
		$order = [
            'order_number' => Input::get('order_number'),
            'contact_id' => Input::get('contact_id'),
            'user_id' => Input::get('user_id'),
            'deliver_time' => Input::get('deliver_time'),
            'delivery_address' => Input::get('delivery_address'),
            'pickup' => Input::get('pickup'),
            'status' => Input::get('status'),
            'quantity' => Input::get('quantity')
        ];
        $rules = [
            'order_number' => 'required',
            'contact_id' => 'required',
            'user_id' => 'required',
            'deliver_time' => 'required',
            'delivery_address' => 'required',
            'pickup' => 'required',
            'status' => 'required',
            'quantity' => 'required',
        ];

        $valid = Validator::make($order, $rules);
        if ($valid->passes()) {
            $order = new Order($order);
            $dish->save();
            /* redirect back to the form portion of the page */
            $message = "{$order->order_number} has been created";
			$msgTitle = 'Success!';
			$msgArr = array('message','msgTitle');
            return Redirect::route('order.edit', $user->id)->with(compact($msgArr));
        } else {
            return Redirect::to(URL::previous() . '#reply')->withErrors($valid)->withInput();
        }
	}

	/**
	 * Display the specified resource.
	 * GET /orders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showOrder(Order $order)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /orders/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editOrder(Order $order)
	{
		$this->layout->title = "Edit order {$order->order_number}";
        $this->layout->main = View::make('dash')->nest('content', 'orders.edit', compact('order'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /orders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateOrder(Order $order)
	{
		$order = [
            'order_number' => Input::get('order_number'),
            'contact_id' => Input::get('contact_id'),
            'user_id' => Input::get('user_id'),
            'deliver_time' => Input::get('deliver_time'),
            'delivery_address' => Input::get('delivery_address'),
            'pickup' => Input::get('pickup'),
            'status' => Input::get('status'),
            'quantity' => Input::get('quantity')
        ];
        $rules = [
            'order_number' => 'required',
            'contact_id' => 'required',
            'user_id' => 'required',
            'deliver_time' => 'required',
            'delivery_address' => 'required',
            'pickup' => 'required',
            'status' => 'required',
            'quantity' => 'required',
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
	 * DELETE /orders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteOrder(Order $order)
	{
		$order->delete();
		$message = "{$order->username} has been deleted";
		$msgTitle = 'Success!';
		$msgArr = array('message','msgTitle');
        return Redirect::route('order.list')->with(compact($msgArr));
	}

}