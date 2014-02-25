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

}