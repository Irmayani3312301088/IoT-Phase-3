<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Controllers\Controller;
use App\Models\Appliances;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name_appliance' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'repeat_schedule' => 'required',
            'status' => 'required',
            'id_appliances' => ''
        ]);

        $id_app = Appliances::where('name', $request['name_appliance'])->first();
        $request['id_appliances'] = $id_app->id_appliances;
        // dd($request['id_appliances']);
        if (Schedule::create($request->all())) {
            return redirect()->route('appliences')->with('sukses', 'Success added new schedule');
        }

        return back()->with('error', 'Failed to add new schedule!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return back()->with('sukses', 'Success Deleted a Schedule ');
    }
}
