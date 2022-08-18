<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        $new_date = $date->format('F d, Y');

        return $new_date;
        // return Carbon::createFromFormat('d/m/Y', $value)->toDateTimeString();
    }
}
