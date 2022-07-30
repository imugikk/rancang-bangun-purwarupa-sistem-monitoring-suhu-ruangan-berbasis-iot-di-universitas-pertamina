<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'device_id' => 1,
            'building' => 'Griya Legita',
            'floor' => '7',
            'number' => '2701'
        ]);
    }
}
