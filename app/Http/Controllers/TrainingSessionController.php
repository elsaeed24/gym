<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Http\Requests\TrainingSessionRequest;
use App\Repositories\TrainingSessions\InterfaceTrainingSessionRepository;

class TrainingSessionController extends Controller
{

    protected $session;

    public function __construct(InterfaceTrainingSessionRepository $session){

        $this->session = $session;
    }

    public function index()
    {
        return view('dashboard.training_sessions.index',[
            'training_sessions' => $this->session->all(),
            'count_of_sessions' => $this->session->countOfSessions()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.training_sessions.create',
            ['managers' => Manager::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingSessionRequest $request)
    {
        // dd($request->all());
        $this->session->add($request);

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
        $managers = Manager::all();
        return view('dashboard.training_sessions.edit', compact('session', 'managers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingSessionRequest $request, TrainingSession $session)
    {
        $this->session->update($request, $session);

        return redirect()->route('sessions.index')->with('info', 'Session Updated Successfully!') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingSession $session)
    {
        $this->session->delete($session);
        return redirect()->route('sessions.index')->with('danger', 'Session deleted successfully!');
    }
}
