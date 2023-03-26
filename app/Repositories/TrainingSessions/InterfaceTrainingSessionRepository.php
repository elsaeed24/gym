<?php

namespace App\Repositories\TrainingSessions;

use App\Http\Requests\TrainingSessionRequest;
use App\Models\TrainingSession;

interface InterfaceTrainingSessionRepository
{
    public function all();

    public function add(TrainingSessionRequest $request);

    public function update(TrainingSessionRequest $request, TrainingSession $session);

    public function delete(TrainingSession $session);

    public function countOfSessions();

}
