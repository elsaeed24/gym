<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CouchController;
use App\Http\Controllers\GymController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagersController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TrainingSessionController;

$router = RouteSingleton::getInstance();  // only one object only from class

$router->addRoute('resource','manager',ManagersController::class);
$router->addRoute('resource','gyms',GymController::class);
$router->addRoute('resource','users',UserController::class);

$router->addRoute('resource','couches',CouchController::class);
$router->addRoute('resource', 'sessions', TrainingSessionController::class);

$router->addRoute('resource', 'attendances', AttendanceController::class);
$router->addRoute('resource', 'packages', PackageController::class);

//Route::resource('manager', ManagersController::class);

