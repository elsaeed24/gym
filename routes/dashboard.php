<?php

use App\Http\Controllers\CouchController;
use App\Http\Controllers\GymController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagersController;



$router = RouteSingleton::getInstance();  // only one object only from class

$router->addRoute('resource','manager',ManagersController::class);
$router->addRoute('resource','gyms',GymController::class);
$router->addRoute('resource','users',UserController::class);

$router->addRoute('resource','couches',CouchController::class);

//Route::resource('manager', ManagersController::class);

