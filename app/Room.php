<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 't_room';
    protected $primaryKey = 'room_id';
    public $timestamps = false;

    public function roomtype()
    {
    	return $this->belongsTo('App\RoomType', 'room_room_type_id', 'room_type_id');
    }

    public function roomequipments()
    {
    	return $this->belongsToMany('App\Equipment', 't_room_eq', 'room_id', 'eq_id')->withPivot('qty');
    }
}
