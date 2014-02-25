<?php

class Booking extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'booking';

    protected  $guarded = array('id');

    public function services(){
        return $this->hasMany('BookingServices', 'booking_id', 'id');
    }

    public function guest(){
        return $this->belongsTo('Guest', 'guest_id', 'id');
    }

    public function room(){
        return $this->belongsTo('Room','room_id','id');
    }

}