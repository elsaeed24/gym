<?php

namespace App\Providers;

use App\Repositories\TrainingSessions\InterfaceTrainingSessionRepository;
use App\Repositories\TrainingSessions\DbTrainingSessionRepository;
use Illuminate\Support\ServiceProvider;
class TrainingSessionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(InterfaceTrainingSessionRepository::class , function(){
            return new DbTrainingSessionRepository();
    });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
