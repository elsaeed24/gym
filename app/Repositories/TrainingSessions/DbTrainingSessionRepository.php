<?php

namespace App\Repositories\TrainingSessions;

use App\Models\TrainingSession;
use App\Http\Requests\TrainingSessionRequest;
// use Illuminate\Support\Facades\Storage;
use App\Repositories\TrainingSessions\InterfaceTrainingSessionRepository;

class DbTrainingSessionRepository implements InterfaceTrainingSessionRepository
{
    public function all()
    {

        return TrainingSession::paginate();

    }

    public function add(TrainingSessionRequest $request)
    {
        $data = $request->validated();   // validated() replace all()


         TrainingSession::create($data);
    }

    public function update(TrainingSessionRequest $request, TrainingSession $session)
    {
        $data = $request->validated();   // validated() replace all()

        $session->update($data);


    }

    public function delete(TrainingSession $session)
    {


        $session->forceDelete();
    }

    public function countOfSessions()
    {
        return TrainingSession::count();
    }
}
