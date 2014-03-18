<?php

class ServiceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$service = Services::all();
         return View::make('service.list', compact('service'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('service.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$service = Services::create(Input::all());

        $name = $service->name;
           return View::make('service.add',compact('service'))->with('msg',$name. 'has been added');
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
        $service = Services::find($id);

        return View::make('service.edit', compact('service'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $service = Services::find($id);
        $service->name = Input::get('name');
        $service->price = Input::get('price');
        $service->description = Input::get('description');

        $service->save();

        $name = $service->name;

        return View::make('service.list', compact('service'))->with('msg', $name. 'has been updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
       $service = Services::find($id);

        $service->delete();

//        return View::make('service.list', compact('service'))->with('msg', 'has been deleted');
	}

}