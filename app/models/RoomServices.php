<?php

class RoomServices extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'room_services';

    protected  $guarded = array('id');

    public function room(){
        return $this->belongsTo('Room', 'room_id', 'id');
    }

    public function services(){
        return $this->belongsTo('Services', 'service_id', 'id');
    }

}