<?php

namespace App\Services;

use App\Models\LimitTemperature;
use Carbon\Carbon;

class CheckTemperature
{
    public static function generateStatus($temperature, $room = null): void
    {
        $limit_temperature = LimitTemperature::all()->first();
        $test = Carbon::now()->format('H:i');
        $current = $room->schedules->where('start_at', '<=', $test)->where('end_at', '>=', $test)->first();

        if ($temperature < ($limit_temperature ? (int) $limit_temperature->down : 20.5)) {
            $room->update(['status' => 'warning']);
            // return 'yellow';
        } else {
            if ((($temperature > ($limit_temperature ? (int) $limit_temperature->down : 20.5) && $temperature < ($limit_temperature ? (int) $limit_temperature->up : 27.1)) && !$current)) {
                $room->update(['status' => 'warning']);
                // return 'yellow';
            } else {
                if ($temperature > ($limit_temperature ? (int) $limit_temperature->up : 27.1) && $current) {
                    $room->update(['status' => 'danger']);
                    // return 'red';
                } else {
                    $room->update(['status' => 'safe']);
                    // return 'green';
                }
            }
        }
    }
}
