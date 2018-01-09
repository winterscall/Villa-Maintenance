<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 't_room_type';
    protected $primaryKey = 'room_type_id';
    public $timestamps = false;

    public function rooms()
    {
    	return $this->hasMany('App\Room', 'room_room_type_id');
    }
}
