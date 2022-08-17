<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LimitController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UpdateAccountProfile;
use App\Models\Building;
use App\Models\Room;
use App\Services\CheckTemperature;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
Route::post('import-schedule', ImportScheduleController::class)->name('import-schedule');
Route::put('update-account', UpdateAccountProfile::class)->name('update-account');

Route::get('dashboard', function () {
    $rooms = Room::all();
    $room['all'] = $rooms->count();
    $room['safe'] = $rooms->filter(function ($item) {
        return $item->status == 'safe';
    })->count();
    $room['warning'] = $rooms->filter(function ($item) {
        return $item->status == 'warning';
    })->count();
    $room['danger'] = $rooms->filter(function ($item) {
        return $item->status == 'danger';
    })->count();

    return view('dashboard', [
        'room' => $room
    ]);
});

Route::get('dashboard/{status}', function ($status) {
    $rooms = Room::all();
    $room_status = null;
    if ($status == 'safe') {
        $rooms = $rooms->filter(function ($item) {
            return $item->status == 'safe';
        });
        $room_status = 'Baik';
    } elseif ($status == 'warning') {
        $rooms = $rooms->filter(function ($item) {
            return $item->status == 'warning';
        });
        $room_status = 'Periksa Ruangan';
    } elseif ($status == 'danger') {
        $rooms = $rooms->filter(function ($item) {
            return $item->status == 'danger';
        });
        $room_status = 'Periksa AC';
    }

    return view('data-dashboard', [
        'rooms' => $rooms,
        'status' => $status,
        'room_status' => $room_status
    ]);
});

Route::get('monitoring', function () {
    $buildings = Building::all();
    $rooms = Room::query()->orderBy('id', 'asc');
    $filter_building = explode("-", request('building'));

    request('building') ? $rooms = $rooms->whereHas('building', function ($q) use ($filter_building) {
        $q->where('name', $filter_building[0])->where('floor', $filter_building[1]);
    }) : $rooms = $rooms;

    $rooms = $rooms->get();

    return view('monitorings.monitoring', [
        'rooms' => $rooms,
        'buildings' => $buildings,
        'filter_building' => request('building')
    ]);
});

Route::get('monitorings/{id}', function (Database $db, $id) {
    $room = Room::where('id', (int) $id)->first();
    $rdb_data = $db->getReference($room->device->name)->getValue();

    $temperature_data = collect($rdb_data);

    $temperature_data->transform(function ($item) {
        $time = explode(" ", Carbon::createFromTimestamp($item['timestamp'])->timezone('Asia/Jakarta'));

        return [
            'suhu' => $item['temperature'],
            'tanggal' => $time[0],
            'waktu' => $time[1]
        ];
    });

    return view('monitorings.tabel', [
        'room' => $room,
        'temperatures' => $temperature_data
    ]);
});

Route::get('room-by-building/{id}', function ($id) {
    $rooms = Room::where('building_id', $id)->get();

    return $rooms;
});

Route::post('update-room', function (Request $request) {
    Room::where('id', (int) $request->room_id)->update([
        'check_status' => $request->check_status
    ]);

    return redirect(url("dashboard/{$request->status}"));
});

Route::resources([
    '/users' => UserController::class,
    '/limits' => LimitController::class,
    '/rooms' => RoomController::class,
    '/account' => AccountController::class,
    '/schedules' => ScheduleController::class,
]);

Route::get('/get-user-notification', [UserController::class, 'getNotificationUser'])->name('get-user-notification');
Route::get('/get-one-user-notification', [UserController::class, 'getOneNewestNotification'])->name('get-one-user-notification');
Route::get('/read-user-notification', [UserController::class, 'readNotif'])->name('read-user-notification');

