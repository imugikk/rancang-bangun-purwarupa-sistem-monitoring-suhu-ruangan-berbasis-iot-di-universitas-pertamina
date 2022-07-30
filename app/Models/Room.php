<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['device', 'schedules'];

    public function device() {
        return $this->belongsTo('App\Models\Device', 'device_id');
    }

    public function schedules() {
        return $this->hasMany('App\Models\Schedule', 'room_id');
    }
}
