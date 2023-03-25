<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagersController;



$router = RouteSingleton::getInstance();  // only one object only from class

$router->addRoute('resource','manager',ManagersController::class);
$router->addRoute('resource','gyms',GymController::class);
$router->addRoute('resource','users',UserController::class);


//Route::resource('manager', ManagersController::class);

