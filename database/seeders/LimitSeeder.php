<?php

namespace Database\Seeders;

use App\Models\LimitTemperature;
use Illuminate\Database\Seeder;

class LimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LimitTemperature::create([
            'down' => '20.5',
            'up' => '27.5'
        ]);
    }
}
