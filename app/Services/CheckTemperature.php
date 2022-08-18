<?php

namespace App\Services;

use App\Models\LimitTemperature;
use Carbon\Carbon;

class CheckTemperature
{
    public static function generateStatus($temperature, $room = null): void
    {
        $limit_temperature = LimitTemperature::all()->first();
        $hour = Carbon::now()->format('H:i');
        $current = $room->schedules()->whereDate('date_used', Carbon::today())->where('start_at', '<=', $hour)->where('end_at', '>=', $hour)->first();

        if ($temperature < ($limit_temperature ? (int) $limit_temperature->down : 20.5)) {
            $room->update(['status' => 'warning', 'check_status' => 'Tidak Diperiksa']);
            // return 'yellow';
        } else {
            if ((($temperature > ($limit_temperature ? (int) $limit_temperature->down : 20.5) && $temperature < ($limit_temperature ? (int) $limit_temperature->up : 27.1)) && !$current)) {
                $room->update(['status' => 'warning', 'check_status' => 'Tidak Diperiksa']);
                // return 'yellow';
            } else {
                if ($temperature > ($limit_temperature ? (int) $limit_temperature->up : 27.1) && $current) {
                    $room->update(['status' => 'danger', 'check_status' => 'Tidak Diperiksa']);
                    // return 'red';
                } else {
                    $room->update(['status' => 'safe', 'check_status' => null]);
                    // return 'green';
                }
            }
        }
    }
}
