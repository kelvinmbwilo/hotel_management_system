<?php

class RoomController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    //display the form to add rooms
	public function index()
	{

        return View::make('room.index');


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        return View::make("room.add");
	}


   public function add(){
       $file = Input::file('img1'); // your file upload input field in the form should be named 'file'
       $destinationPath = public_path().'/uploads';
       $filename = $file->getClientOriginalName();
       //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
       $uploadSuccess = Input::file('img1')->move($destinationPath, $filename);
       $RandNumber   		= rand(0, 9999999999);
       if( $uploadSuccess ) {
           require_once('PHPImageWorkshop/ImageWorkshop.php');
           chmod($destinationPath."/".$filename, 0777);
           $layer = PHPImageWorkshop\ImageWorkshop::initFromPath(public_path().'/uploads/'.$filename);
           unlink(public_path().'/uploads/'.$filename);
           $layer->resizeInPixel(400, null, true);
           $layer->applyFilter(IMG_FILTER_CONTRAST, -16, null, null, null, true);
           $layer->applyFilter(IMG_FILTER_BRIGHTNESS, 9, null, null, null, true);
           $dirPath =public_path().'/uploads/' ."rooms";
           $filename = "_".$RandNumber.".png";
           $createFolders = true;
           $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
           $imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
           $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
           chmod($dirPath ."/".$filename , 0777);
           //connect & insert file record in database
           $room = Room::create(array(
               "name" => Input::get("name"),
               "image" =>$filename,
               "bed_size" => Input::get("bed_size"),
               "bed_type" => Input::get("bed_type"),
               "number_of_beds" => Input::get("number_of_beds"),
               "category" => Input::get("category"),
               "price" => Input::get("price"),
               "description" => Input::get("description"),
               "status" => Input::get("status"),
           ));
           if(Input::file('img2')){
               $file = Input::file('img2'); // your file upload input field in the form should be named 'file'
               $destinationPath = public_path().'/uploads';
               $filename = $file->getClientOriginalName();
               //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
               $uploadSuccess = Input::file('img2')->move($destinationPath, $filename);
               $RandNumber   		= rand(0, 9999999999);
               if( $uploadSuccess ) {
                   require_once('PHPImageWorkshop/ImageWorkshop.php');
                   chmod($destinationPath."/".$filename, 0777);
                   $layer = PHPImageWorkshop\ImageWorkshop::initFromPath(public_path().'/uploads/'.$filename);
                   unlink(public_path().'/uploads/'.$filename);
                   $layer->resizeInPixel(400, null, true);
                   $layer->applyFilter(IMG_FILTER_CONTRAST, -16, null, null, null, true);
                   $layer->applyFilter(IMG_FILTER_BRIGHTNESS, 9, null, null, null, true);
                   $dirPath =public_path().'/uploads/' ."rooms";
                   $filename = "_".$RandNumber.".png";
                   $createFolders = true;
                   $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
                   $imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
                   $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
                   chmod($dirPath ."/".$filename , 0777);
                   //connect & insert file record in database
                   $room->image1 = $filename;
                   $room->save();

               }
           }


           if(Input::file('img3')){
               $file = Input::file('img3'); // your file upload input field in the form should be named 'file'
               $destinationPath = public_path().'/uploads';
               $filename = $file->getClientOriginalName();
               //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
               $uploadSuccess = Input::file('img3')->move($destinationPath, $filename);
               $RandNumber   		= rand(0, 9999999999);
               if( $uploadSuccess ) {
                   require_once('PHPImageWorkshop/ImageWorkshop.php');
                   chmod($destinationPath."/".$filename, 0777);
                   $layer = PHPImageWorkshop\ImageWorkshop::initFromPath(public_path().'/uploads/'.$filename);
                   unlink(public_path().'/uploads/'.$filename);
                   $layer->resizeInPixel(400, null, true);
                   $layer->applyFilter(IMG_FILTER_CONTRAST, -16, null, null, null, true);
                   $layer->applyFilter(IMG_FILTER_BRIGHTNESS, 9, null, null, null, true);
                   $dirPath =public_path().'/uploads/' ."rooms";
                   $filename = "_".$RandNumber.".png";
                   $createFolders = true;
                   $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
                   $imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
                   $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
                   chmod($dirPath ."/".$filename , 0777);
                   //connect & insert file record in database
                   $room->image2  = $filename;
                   $room->save();
               }
           }
           $log = $room->name;
           Logs::create(array(
               "user_id"=>  Auth::user()->id,

               "action"  =>"Add room named ".$log
           ));
           return 'Post Added Successfull';
       } else {
           return 'error Uploading file';
       }
   }
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $room = Room::create(array(
            "name" => Input::get("name"),
            "bed_size" => Input::get("bed_size"),
            "bed_type" => Input::get("bed_type"),
            "number_of_beds" => Input::get("number_of_beds"),
            "category" => Input::get("category"),
            "price" => Input::get("price"),
            "description" => Input::get("description"),
            "status" => Input::get("status"),
        ));
        $log = $room->name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,

            "action"  =>"Add room named ".$log
        ));
        return "<h3 class='text-warning'>Room Added Successful</h3>";

	}

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show()
	{
        $room = Room::all();
        return View::make('room.list', compact('room'));


    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$room = Room::find($id);

        return View::make('room.edit', compact('room'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $room = Room::find($id);

        $room->name = Input::get("name");
        $room->bed_size = Input::get("bed_size");
        $room->bed_type = Input::get("bed_type");
        $room->number_of_beds = Input::get("number_of_beds");
        $room->image = Input::get("image");

        $room->save();


        if(Input::file('img1')){
            $file = Input::file('img1'); // your file upload input field in the form should be named 'file'
            $destinationPath = public_path().'/uploads';
            $filename = $file->getClientOriginalName();
            //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
            $uploadSuccess = Input::file('img1')->move($destinationPath, $filename);
            $RandNumber   		= rand(0, 9999999999);
            if( $uploadSuccess ) {
                require_once('PHPImageWorkshop/ImageWorkshop.php');
                chmod($destinationPath."/".$filename, 0777);
                $layer = PHPImageWorkshop\ImageWorkshop::initFromPath(public_path().'/uploads/'.$filename);
                unlink(public_path().'/uploads/'.$filename);
                $layer->resizeInPixel(400, null, true);
                $layer->applyFilter(IMG_FILTER_CONTRAST, -16, null, null, null, true);
                $layer->applyFilter(IMG_FILTER_BRIGHTNESS, 9, null, null, null, true);
                $dirPath =public_path().'/uploads/' ."rooms";
                $filename = "_".$RandNumber.".png";
                $createFolders = true;
                $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
                $imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
                $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
                chmod($dirPath ."/".$filename , 0777);
                if($room->image != ""){
                    unlink(public_path().'/uploads/rooms/'.$room->image);
                }
                //connect & insert file record in database
                $room->image  = $filename;
                $room->save();

            }
        }


        if(Input::file('img2')){
            $file = Input::file('img2'); // your file upload input field in the form should be named 'file'
            $destinationPath = public_path().'/uploads';
            $filename = $file->getClientOriginalName();
            //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
            $uploadSuccess = Input::file('img2')->move($destinationPath, $filename);
            $RandNumber   		= rand(0, 9999999999);
            if( $uploadSuccess ) {
                require_once('PHPImageWorkshop/ImageWorkshop.php');
                chmod($destinationPath."/".$filename, 0777);
                $layer = PHPImageWorkshop\ImageWorkshop::initFromPath(public_path().'/uploads/'.$filename);
                unlink(public_path().'/uploads/'.$filename);
                $layer->resizeInPixel(400, null, true);
                $layer->applyFilter(IMG_FILTER_CONTRAST, -16, null, null, null, true);
                $layer->applyFilter(IMG_FILTER_BRIGHTNESS, 9, null, null, null, true);
                $dirPath =public_path().'/uploads/' ."rooms";
                $filename = "_".$RandNumber.".png";
                $createFolders = true;
                $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
                $imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
                $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
                chmod($dirPath ."/".$filename , 0777);
                if($room->image1 != ""){
                    unlink(public_path().'/uploads/rooms/'.$room->image1);
                }
                //connect & insert file record in database
                $room->image1 = $filename;
                $room->save();

            }
        }


        if(Input::file('img3')){
            $file = Input::file('img3'); // your file upload input field in the form should be named 'file'
            $destinationPath = public_path().'/uploads';
            $filename = $file->getClientOriginalName();
            //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
            $uploadSuccess = Input::file('img3')->move($destinationPath, $filename);
            $RandNumber   		= rand(0, 9999999999);
            if( $uploadSuccess ) {
                require_once('PHPImageWorkshop/ImageWorkshop.php');
                chmod($destinationPath."/".$filename, 0777);
                $layer = PHPImageWorkshop\ImageWorkshop::initFromPath(public_path().'/uploads/'.$filename);
                unlink(public_path().'/uploads/'.$filename);
                $layer->resizeInPixel(400, null, true);
                $layer->applyFilter(IMG_FILTER_CONTRAST, -16, null, null, null, true);
                $layer->applyFilter(IMG_FILTER_BRIGHTNESS, 9, null, null, null, true);
                $dirPath =public_path().'/uploads/' ."rooms";
                $filename = "_".$RandNumber.".png";
                $createFolders = true;
                $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
                $imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
                $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
                chmod($dirPath ."/".$filename , 0777);
                if($room->image2 != ""){
                    unlink(public_path().'/uploads/rooms/'.$room->image2);
                }
                //connect & insert file record in database
                $room->image2  = $filename;
                $room->save();
            }
        }

        $room->save();
        $log = $room->name;
        Logs::create(array(
            "user_id"=>  Auth::user()->id,

            "action"  =>"Add update named ".$log
        ));

        return "<h3 class='text-warning'>Room Updated Successful</h3>";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	  $room = Room::find($id);

        $room->delete();
//        return View::make("room/list", compact("room"))->with("msg","Has been deleted");

	}

}