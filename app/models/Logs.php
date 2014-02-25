<?php

class Logs extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'logs';

    protected  $guarded = array('id');

    public function user(){
        return $this->belongsTo('User', 'user_id', 'id');
    }


}