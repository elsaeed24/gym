<?php

namespace App\Providers;

use App\Repositories\Managers\DbManagerRepository;
use App\Repositories\Managers\InterfaceManagerRepository;
use Illuminate\Support\ServiceProvider;

class ManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(InterfaceManagerRepository::class , function(){
                return new DbManagerRepository();
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
