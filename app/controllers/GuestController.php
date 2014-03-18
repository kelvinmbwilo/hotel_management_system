<?php

class GuestController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$guest = Guest::all();
        return View::make('guest.list', compact('guest'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	  Return View::make('guest.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$guest = Guest::create(Input::all());
        $name = $guest->name;
        return View::make('booking.add', compact('name'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$guest = Guest::find($id);

        return View::make('guest.edit', compact('guest'));
	}

	/**
	 * Update the specified resource in storage.
	 *
    id
    first_name
    middle_name
    last_name
    email
    phone_number
    country

     * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$guest = Guest::find($id);
        $guest->first_name = Input::get("first_name");
        $guest->middle_name = Input::get("middle_name");
        $guest->last_name = Input::get("last_name");
        $guest->email = Input::get("email");
        $guest->phone_number = Input::get("phone_number");
        $guest->country = Input::get("country");

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$guest = Guest::find($id);
          $guest->delete();


	}

}