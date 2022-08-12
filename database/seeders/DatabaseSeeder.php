<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            RoomSeeder::class,
            DeviceSeeder::class,
            ScheduleSeeder::class,
            LimitSeeder::class,
            BuildingSeeder::class
        ]);
    }
}
