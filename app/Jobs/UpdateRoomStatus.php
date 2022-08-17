<?php

namespace App\Jobs;

use App\Models\Room;
use App\Models\User;
use App\Services\CheckTemperature;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Kreait\Firebase\Contract\Database;
use App\Notifications\UserNotification;

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
            $status_old = $room->status;
            $rdb_data = $db->getReference($room->device->name)->getValue();
            $temperature_data = collect($rdb_data)->last();
            $status = CheckTemperature::generateStatus($temperature_data['temperature'], $room);
            if ($status_old != $status && ($status == 'warning' || $status == 'danger')) {
                $user = User::all();
                $array = [
                    'title' => 'Room ' . $room->name . ' is ' . $status,
                    'status' => $status,
                    'room_id' => $room->id,
                    'date' => date('Y-m-d H:i:s'),
                    'link' => '#'
                ];
                foreach ($user as $u) {
                    $u->notify(new UserNotification(json_encode($array)));
                }
                //TODO: Send Notification
                logger('Send Notification', ['status' => $status, 'room' => $room]);
            }
        }
    }
}
