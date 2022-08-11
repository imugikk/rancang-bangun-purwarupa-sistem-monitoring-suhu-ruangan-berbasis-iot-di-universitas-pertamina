<?php

namespace App\Imports;

use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\ToModel;

class ScheduleImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Schedule([
            'room_id' => $row[0],
            'activity' => $row[1],
            'start_at' => $row[2],
            'end_at' => $row[3],
            'date_used' => $row[4],
        ]);
    }
}
