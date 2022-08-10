<?php

namespace App\Jobs;

use App\Models\Room;
use App\Services\CheckTemperature;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Kreait\Firebase\Contract\Database;

class UpdateRoomStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Database $db)
    {
        $rooms = Room::all();

        foreach ($rooms as $room) {
            $rdb_data = $db->getReference($room->device->name)->getValue();
            $temperature_data = collect($rdb_data)->last();
            CheckTemperature::generateStatus($temperature_data['temperature'], $room);
        }
    }
}
