<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Models\Gym;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Models\User;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::paginate();
        $training_sessions = TrainingSession::all();
        $users = User::all();
        $gyms = Gym::all();
        return view('dashboard.attendance.index',compact('attendances','training_sessions','gyms','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttendanceRequest $request)
    {
        $data = $request->validated();

        Attendance::create($data);

       return redirect()->route('attendances.index')->with('success', 'Attendance Created Succefully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {

        $training_sessions = TrainingSession::all();
        $users = User::all();
        $gyms = Gym::all();
        return view('dashboard.attendance.edit',compact('attendance','training_sessions','gyms','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttendanceRequest  $request, Attendance $attendance)
    {
        $data = $request->validated();

        $attendance->update($data);

        return redirect()->route('attendances.index')->with('info', 'Attendance Updated Succefully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendances.index')->with('danger', 'Attendance Deleted Succefully');

    }
}
