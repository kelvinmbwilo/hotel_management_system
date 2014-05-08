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

Route::get('about', function()
{
    return View::make('website.task.about');
});

Route::get('contact', function()
{
    return View::make('website.task.contact');
});

Route::get('room', function()
{
    return View::make('website.task.room');
});

Route::get('gallery', function()
{
    return View::make('website.task.gallery');
});

Route::get('service', function()
{
    return View::make('website.task.service');
});

Route::get('about', function()
{
    return View::make('website.task.about');
});

Route::get('activity', function()
{
    return View::make('website.task.activities');
});

Route::get('tourism', function()
{
    return View::make('website.task.tourism');
});

Route::get('serengeti', function()
{
    return View::make('website.task.serengeti');
});

Route::get('arusha', function()
{
    return View::make('website.task.arusha');
});

Route::get('ngorongoro', function()
{
    return View::make('website.task.ngorongoro');
});

Route::get('tarangire', function()
{
    return View::make('website.task.tarangire');
});

Route::get('activities', function()
{
    return View::make('website.task.activities');
});

Route::get('restaurant', function()
{
    return View::make('website.task.restaurant');
});

Route::get('lodge', function()
{
    return View::make('website.task.lodge');
});

Route::get('hotelGuide', function()
{
    return View::make('website.task.hotelGuide');
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
    return View::make('dashboard.index');
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
Route::get('user',array('as'=>'adduser', 'uses'=>'UserController@index'));

//display adding form
Route::get('user/add',array('as'=>'adduser1', 'uses'=>'UserController@create'));
//adding new user
Route::post('user/add',array('as'=>'adduser1', 'uses'=>'UserController@store'));

//viewing list of users
Route::get('user/list',array('as'=>'listuser', 'uses'=>'UserController@listUser'));

//display a form to edit users information
Route::get('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@edit'));

//editng users information
Route::post('user/edit/{id}',array('as'=>'edituser', 'uses'=>'UserController@update'));

//deleting user
Route::post('user/delete/{id}',array('as'=>'deleteuser', 'uses'=>'UserController@destroy'));

//display a system usage log for a user
Route::get('user/log/{id}',array('as'=>'userlog', 'uses'=>'UserController@show'));


//display a form to add new room
Route::get('rooms', array('as'=>'addroom', 'uses'=>'RoomController@index'));

//display a form to add new room
Route::get('room/add', array('as'=>'addroom', 'uses'=>'RoomController@create'));

//adding new room
Route::post('room/add/', array('as'=>'addroom1', 'uses'=>'RoomController@add'));

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

//delete the room fom the list
Route::post('room/{id}/check', array( 'uses'=>'RoomController@check'));

//delete the room fom the list
Route::get('room/listguest/{id}', array( 'uses'=>'RoomController@guestlist'));


/////////////////////////      end of room  ////////////////////////////////////

//display list of guest and form to add new guest
Route::get('guest', array('as'=>'guest', 'uses'=>'GuestController@index'));



Route::get('guest/add/{id}', array('as'=>'addguest', 'uses'=>'GuestController@create'));

Route::get('guest/bookcount', function(){
    return Guest::where('status','Booked')->count();
});

Route::get('guest/confirm_booking', array(function(){
    return View::make('guest/confirmbooking');
}));

Route::post('guest/confirm/{id}', array(function($id){
    $guest = Guest::find($id);
    $guest->status = "Stay";
    $guest->save();
    return "Guest Has Been Confirmed";
}));

//display list of guest and form to add new guest
Route::get('guest/{id}', array('as'=>'guest', 'uses'=>'GuestController@showinfo'));


Route::get('guest/book/{id}', array('uses'=>'GuestController@booking'));

//adding new guest
Route::post('guest/add/{id}', array('as'=>'addguest1', 'uses'=>'GuestController@store'));

//list of guest
Route::get('guest/list', array('as'=>'guests', 'uses'=>'GuestController@show'));

///list all guests
Route::get('guests', function(){
    return View::make('guest.listAll');
});

//display a form to edit
Route::get('guest/edit/{id}', array('as'=>'editguest', 'uses'=>'GuestController@edit'));

//the form that update guest information
Route::post('guest/edit/{id}', array('as'=>'editguest', 'uses'=>'GuestController@update'));

//deletes the guest
Route::post('guest/delete/{id}', array('as'=>'deleteguest', 'uses'=>'GuestController@destroy'));

//email form for guest booking
Route::get('emailSend', array('as'=>'sendMail', 'uses'=>'GuestController@sendMail'));


// display form that adds services
Route::get('services', array('as'=>'service', 'uses'=>'ServiceController@index'));

//adding new service
Route::post('service/add', array('as'=>'addservice1', 'uses'=>'ServiceController@store'));

//list of service
Route::get('service/list', array('as'=>'service', 'uses'=>'ServiceController@show'));

//display a form to edit
Route::get('service/edit/{id}', array('as'=>'editservice', 'uses'=>'ServiceController@edit'));

//the form that update service information
Route::post('service/edit/{id}', array('as'=>'editservice', 'uses'=>'ServiceController@update'));

//delete the service
Route::post('service/delete/{id}', array('as'=>'deleteservice', 'uses'=>'ServiceController@destroy'));

//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////end service////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////

//display room booking form
Route::get('booking/add', array('as'=>'booking', 'uses'=>'BookingController@Create'));

//display reports
Route::get('report', function(){
    return View::make("reports.index");
});

//processing bar chat
Route::post('report/bar', array( 'uses'=>'ReportController@displayBarChart'));

//processing line chat
Route::post('report/line', array( 'uses'=>'ReportController@displayLineChart'));

//processing pie chat
Route::post('report/pie', array( 'uses'=>'ReportController@displayPieChart'));


//processing a table data
Route::post('report/table', array( 'uses'=>'ReportController@table'));