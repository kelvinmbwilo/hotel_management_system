<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
    return View::make('website.home');
});


Route::get('login', function()
{
	return View::make('login');
});

/**
 * Routes to display home page
 */
Route::get('home', function()
{
    return View::make('layout.master');
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Managing user actions
 * Directing routes to correct controllers
 */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//validating user during login
Route::post('login',array('as'=>'login', 'uses'=>'UserController@validate'));

//loging a user out
Route::get('logout',array('as'=>'logout', 'uses'=>'UserController@logout'));

//display a form to add new user
Route::get('user/add',array('as'=>'adduser', 'uses'=>'UserController@create'));

//adding new user
Route::post('user/add',array('as'=>'adduser1', 'uses'=>'UserController@store'));

//viewing list of users
Route::get('user/list',array('as'=>'listuser', 'uses'=>'UserController@index'));

//display a form to edit users information
Route::get('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@edit'));

//editng users information
Route::post('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@update'));

//deleting user
Route::post('user/delete/{id}',array('as'=>'deleteuser', 'uses'=>'UserController@destroy'));

//display a system usage log for a user
Route::get('user/log/{id}',array('as'=>'userlog', 'uses'=>'UserController@show'));

//display a form to add new room
Route::get('room', array('as'=>'addroom', 'uses'=>'RoomController@index'));


//display a form to add new room
Route::get('room/add', array('as'=>'addroom', 'uses'=>'RoomController@create'));

//adding new room
Route::post('room/add', array('as'=>'addroom1', 'uses'=>'RoomController@add'));

//Viewing list of rooms
Route::get('room/list',      array('as'=>'rooms', 'uses'=>'RoomController@show'));

//display a form to edit rooms
Route::get('room/edit/{id}', array('as'=>'editroom', 'uses'=>'RoomController@edit'));

//edit room information
Route::post('room/edit/{id}', array('as'=>'editroom', 'uses'=>'RoomController@update'));

//display the logs for the room
Route::get('room/log/{id}', array('as'=>'logs', 'uses'=>'RoomController@show'));

//delete the room fom the list
Route::post('room/delete/{id}', array('as'=>'deleteroom', 'uses'=>'RoomController@destroy'));

/////////////////////////      end of room  ////////////////////////////////////

//display form to add a new guest
Route::get('guest/add', array('as'=>'addguest', 'uses'=>'GuestController@create'));

//adding new guest
Route::post('guest/add', array('as'=>'addguest1', 'uses'=>'GuestController@store'));

//list of guest
Route::get('guest/list', array('as'=>'guests', 'uses'=>'GuestController@index'));

//display a form to edit
Route::get('guest/edit/{id}', array('as'=>'editguest', 'uses'=>'GuestController@edit'));

//the form that update guest information
Route::post('guest/edit/{id}', array('as'=>'editguest', 'uses'=>'GuestController@update'));

//deletes the guest
Route::post('guest/delete/{id}', array('as'=>'deleteguest', 'uses'=>'GuestController@destroy'));


// display form that adds services
Route::get('service/add', array('as'=>'addservice', 'uses'=>'ServiceController@create'));

//adding new service
Route::post('service/add', array('as'=>'addservice1', 'uses'=>'ServiceController@store'));

//list of service
Route::get('service/list', array('as'=>'service', 'uses'=>'ServiceController@index'));

//display a form to edit
Route::get('service/edit/{id}', array('as'=>'editservice', 'uses'=>'ServiceController@edit'));

//the form that update service information
Route::post('service/edit/{id}', array('as'=>'editservice', 'uses'=>'ServiceController@update'));

//delete the service
Route::post('service/delete/{id}', array('as'=>'deleteservice', 'uses'=>'ServiceController@destroy'));

//display room booking form
Route::get('booking/add', array('as'=>'booking', 'uses'=>'BookingController@Create'));

