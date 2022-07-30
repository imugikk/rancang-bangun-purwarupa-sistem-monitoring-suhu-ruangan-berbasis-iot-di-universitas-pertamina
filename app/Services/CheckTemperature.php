<?php

namespace App\Services;

use Carbon\Carbon;

class CheckTemperature {
    public static function generateStatus($temperature, $schedules = null) : string {
        $test = Carbon::now()->format('H:i');
        $current = $schedules->where('start_at', '<=', $test)->where('end_at', '>=', $test)->first();

        if($temperature < 20.5) {
            return 'yellow';
        }else {
            if((($temperature > 20.5 && $temperature < 27.1) && !$current)) {
                return 'yellow';
            }else {
                if($temperature > 27.1 && $current) {
                    return 'red';
                } else {
                    return 'green';
                }
            }
        }
    }
}
