<?php

namespace App\Services;

use Carbon\Carbon;

class CheckTemperature
{
    public static function generateStatus($temperature, $room = null): void
    {
        $test = Carbon::now()->format('H:i');
        $current = $room->schedules->where('start_at', '<=', $test)->where('end_at', '>=', $test)->first();

        if ($temperature < 20.5) {
            $room->update(['status' => 'warning']);
            // return 'yellow';
        } else {
            if ((($temperature > 20.5 && $temperature < 27.1) && !$current)) {
                $room->update(['status' => 'warning']);
                // return 'yellow';
            } else {
                if ($temperature > 27.1 && $current) {
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
