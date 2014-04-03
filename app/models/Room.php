<?php

class Room extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    protected  $guarded = array('id');

    public function services(){
        return $this->hasMany('RoomServices', 'room_id', 'id');
    }

    public function booking(){
        return $this->hasMany('Booking', 'room_id', 'id');
    }

    public function log(){
        return $this->hasMany('Logs', 'room_id', 'id');
    }

    public function guest(){
        return $this->hasMany('RoomGuest', 'room_id', 'id');
    }

}