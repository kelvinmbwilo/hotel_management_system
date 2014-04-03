<?php

class RoomGuest extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'room_guest';

    protected  $guarded = array('id');

    public function guest(){
        return $this->belongsTo('Guest', 'guest_id', 'id');
    }

    public function room(){
        return $this->belongsTo('Room', 'room_id', 'id');
    }

}