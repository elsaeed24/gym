<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Http\Requests\TrainingSessionRequest;
use App\Models\Gym;
use App\Repositories\TrainingSessions\InterfaceTrainingSessionRepository;

class TrainingSessionController extends Controller
{


    public function index()
    {
        $training_sessions = TrainingSession::paginate();
        $gyms = Gym::all();
        return view('dashboard.training_sessions.index',compact('training_sessions','gyms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingSessionRequest $request)
    {
         $data = $request->validated();   // validated() replace all()

         TrainingSession::create($data);

        return redirect()->route('sessions.index')->with('success', 'Session Created Succefully');

    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingSession $training_Session)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingSession $session)
    {
        $gyms = Gym::all();
        return view('dashboard.training_sessions.edit', compact('session', 'gyms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingSessionRequest $request, TrainingSession $session)
    {

        $data = $request->validated();   // validated() replace all()

        $session->update($data);
        return redirect()->route('sessions.index')->with('info', 'Session Updated Successfully!') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingSession $session)
    {
        $session->forceDelete();
        return redirect()->route('sessions.index')->with('danger', 'Session deleted successfully!');
    }
}
