<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'room_id' => 1,
            'start_at' => '07:00',
            'end_at' => '10:00',
            'date_used' => Carbon::now()
        ]);
    }
}
