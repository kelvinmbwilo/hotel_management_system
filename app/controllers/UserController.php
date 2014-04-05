<?php

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('user.index');
//        $user = User::all();
//        Return View::make("user.list",compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        Return View::make("user.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if(Input::get("password") == Input::get("repassword")){
            $usser = User::where("email",Input::get("email"))->count();
            if($usser != 0){
                Return View::make("user.add")->with("emsg","User with ".Input::get("email")." already existed ");
            }else{
                $user = User::create(array(
                    "first_name"=>Input::get("first_name"),
                    "middle_name"=>Input::get("middle_name"),
                    "last_name"=>Input::get("last_name"),
                    "phone"=>Input::get("phone"),
                    "email"=>Input::get("email"),
                    "access"=>Input::get("role"),
                    "password"=>Input::get("password"),
//                    "gender"=>Input::get("gender"),
                    "status"=>"active"
                ));
                $name = $user->first_name." ".$user->middle_name." ".$user->last_name;

                Logs::create(array(
                    "user_id"=>  Auth::user()->id,

                    "action"  =>"Add user named ".$name

                ));

            }
        }else{
            Return View::make("user.add")->with("emsg","two password do not match");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return View::make("user.log",  compact("user"));
    }
    public function listUser(){
        return View::make('user.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return View::make('user.edit',  compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $users = User::find($id);
        $users->first_name = Input::get("first_name");
        $users->last_name = Input::get("last_name");
        $users->middle_name = Input::get("middle_name");
        $users->access = Input::get("role");
        $users->email = Input::get("email");
        $users->phone = Input::get("phone");
//        $user->gender = Input::get("gender");
        $users->save();
        $name = $users->first_name." ".$users->middle_name." ".$users->last_name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,
            "action"  =>"Update user named ".$name
        ));
return"Successfully updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $name = $user->first_name." ".$user->middle_name." ".$user->last_name;
        $user->status="deleted";
        $user->delete();


    }

    /**
     * authanticate user during login.
     *
     * @return view
     */
    public function validate()
    {
        $user = User::where("email",Input::get('email'))->first();
        if($user && $user->password == Input::get('password')){
            Session::put('id',$user->id);
            Session::put('role',$user->access);
            Session::put('email',$user->email);
            if(Input::get('keep') == "keep"){
                Auth::login($user,TRUE);
            }else{
                Auth::login($user,FALSE);
            }
            if(Auth::check()){
                Logs::create(array(
                    "user_id"=>  Auth::user()->id,
                    "action"  =>"Logging in"
                ));
                return Redirect::to("home");
            }
        }
        else{
            return View::make("login")->with("error","Incorrect Username or Password");
        }
    }

    /**
     * loging out a user
     *
     * @return view
     */
    public function logout(){
        Auth::logout();
        Session::flush();
        return Redirect::to("login");
    }

}
//if($user->role=='admin'){
//    return View::make('statistics');
//}
//elseif($user->role=='manager'){
//    $station = Station::all();
//
//    return View::make('managerView');
//}
//
//elseif ($user->role=='argent') {
//    $parcel = Parcel::where('station_to',$user->station_id);
//    return View::make('agentView');
//}
//
//}
//else{
//    $errorMsg= 'email or password is incorrect';
//    return View::make('user.login', compact('errorMsg'));