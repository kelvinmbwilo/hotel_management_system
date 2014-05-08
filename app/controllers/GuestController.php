<?php

class GuestController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        return View::make('guest.index');
	}

    public function sendMail()
    {
//        $guest = RoomGuest::find($id);
        return View::make('guest.emailSending',compact("guest"));
    }

	/**
	 * Show the form for creating a new resource.
	 * @param  int  $id
	 * @return Response
	 */
	public function create($id)
	{
        $grooms = Room::find($id);
	  Return View::make('guest.add',compact("grooms"));
	}

    public function booking($id)
    {
        $grooms = Room::find($id);
        Return View::make('guest.booking',compact("grooms"));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$guest = Guest::create(array(
            "first_name"    => Input::get("first_name"),
            "middle_name"   => Input::get("middle_name"),
            "last_name"     => Input::get("last_name"),
            "email"         => Input::get("email"),
            "phone_number"  => Input::get("phone_number"),
            "status"        =>(Input::has("booking"))?"Booked":"Stay",
            "country"       => Input::get("country"),

        ));
          foreach(Input::get("service") as $huduma){
           BookingServices::create(array(
            "guest_id"=>$guest->id,
            "service_id"=>$huduma
        ));
    }

        $room = RoomGuest::create(array(
            "room_id" => $id,
            "guest_id" => $guest->id,
            "price"    => Room::find($id)->price,
            "check_in" => Input::get("from"),
            "check_out"=> Input::get("to"),
        ));

        return "<h3 class='text-success'> Guest Registered Successful </h3>";

	}

	/**
	 * Display the specified resource.
	 *
	 *
	 * @return Response
	 */
	public function show()
	{

		return View::make("guest.list");
	}
/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function showinfo($id)
	{
        $guest = Guest::find($id);

		return View::make("guest.info",compact("guest"));
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
        $guest->save();

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