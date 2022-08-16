<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::orderBy('id', 'asc')->get();

        return view('settings.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::orderBy('id', 'asc')->get();

        return view('settings.schedules.create', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity' => 'nullable',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);

        $validated['room_id'] = (int) $request->room;
        $validated['date_used'] = Carbon::createFromFormat('Y-m-d', $request->date_used)->toDateTimeString() ?? Carbon::now();

        Schedule::create($validated);

        return redirect(url('schedules'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $buildings = Building::orderBy('id', 'asc')->get();

        return view('settings.schedules.update', compact('schedule', 'buildings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'activity' => 'nullable',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);

        $validated['room_id'] = (int) $request->room;
        $validated['date_used'] = Carbon::createFromFormat('Y-m-d', $request->date_used)->toDateTimeString() ?? Carbon::now();

        $schedule->fill($validated);
        $schedule->save();

        return redirect(url('schedules'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect(url('schedules'));
    }
}
