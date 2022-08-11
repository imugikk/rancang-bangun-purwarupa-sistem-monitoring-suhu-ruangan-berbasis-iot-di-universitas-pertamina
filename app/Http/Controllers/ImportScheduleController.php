<?php

namespace App\Http\Controllers;

use App\Imports\ScheduleImport;
use App\Models\Room;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ImportScheduleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $validation = Validator::make($request->all(), [
        //     'file' => 'required|mimes:csv,xls,xlsx'
        // ]);

        // if ($validation->fails()) {
        //     return redirect('/schedules')->with('error', 'The uploaded file is not an excel file');
        // }

        $file = $request->file('schedule-file');
        $file_name = rand() . '-' . $file->getClientOriginalName();
        $file->move('excel', $file_name);

        $data = Excel::toArray(new ScheduleImport, public_path('/excel' . '/' . $file_name));

        for ($i = 0; $i < collect(head($data))->count(); $i++) {
            $room = Room::where('number', collect(head($data))[$i][0])->first();

            Schedule::create([
                'room_id' => $room->id,
                'activity' => collect(head($data))[$i][4],
                'start_at' => collect(head($data))[$i][2],
                'end_at' => collect(head($data))[$i][3],
                'date_used' => Carbon::createFromFormat('d/m/Y', collect(head($data))[$i][1])->toDateTimeString()
            ]);
        }

        return redirect('/schedules')->with('success', 'Import data successfully');
        // dd($data);
        // dd('Hello World');
    }

    private function upload($name, UploadedFile $photo, $folder)
    {
        $destination_path = $folder;
        $photo->move($destination_path, $name);
    }
}
