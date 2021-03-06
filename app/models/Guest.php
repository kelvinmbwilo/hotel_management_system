<?php

class Guest extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guest';

    protected  $guarded = array('id');

    public function booking(){
        return $this->hasOne('Booking', 'guest_id', 'id');
    }

    public function room(){
        return $this->belongsTo('RoomGuest', 'id', 'guest_id');
    }

    public function service(){
        return $this->hasMany('BookingServices', 'guest_id', 'id');
    }
    public function countries(){
        return $this->belongsTo('Country', 'country', 'id');
    }
}