<?php

class BookingServices extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'booking_services';

    protected  $guarded = array('id');

    public function booking(){
        return $this->belongsTo('Booking', 'booking_id', 'id');
    }

    public function services(){
        return $this->belongsTo('Services', 'service_id', 'id');
    }

}