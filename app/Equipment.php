<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 't_equipment';
    protected $primaryKey = 'eq_id';
    public $timestamps = false;

    public function equipmentrooms()
    {
    	return $this->belongsToMany('App\Room', 't_room_eq', 'eq_id', 'room_id')->withPivot('qty');
    }
}
