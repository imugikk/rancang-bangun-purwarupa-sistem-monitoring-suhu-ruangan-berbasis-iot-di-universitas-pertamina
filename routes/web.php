<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LimitController;
use App\Models\Room;
use App\Services\CheckTemperature;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Kreait\Firebase\Contract\Database;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('post.login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::resources([
    '/users' => UserController::class,
    '/limits' => LimitController::class
]);

Route::get('test-data', function (Database $db) {
    $room = Room::orderBy('id', 'asc')->whereHas('schedules', function($query) {
        $query->whereDate('date_used', Carbon::now());
    })->first();
    $rdb_data = $db->getReference($room->device->name)->getValue();

    $temperature_data = collect($rdb_data)->last();
    $time = explode(" ", Carbon::createFromTimestamp($temperature_data['timestamp'])->timezone('Asia/Jakarta'));

    // $temperature_data->transform(function ($item) {
    //     $time = explode(" ", Carbon::createFromTimestamp($item['timestamp'])->timezone('Asia/Jakarta'));

    //     return [
    //         'suhu' => $item['temperature'],
    //         'tanggal' => $time[0],
    //         'waktu' => $time[1]
    //     ];
    // });

    $test = CheckTemperature::generateStatus($temperature_data['temperature'], $room->schedules);
    dd($test);
    dd([
        'suhu' => $temperature_data['temperature'],
        'tanggal' => $time[0],
        'waktu' => $time[1]
    ]);
});
