<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagersController;



$router = RouteSingleton::getInstance();  // only one object only from class

$router->addRoute('resource','manager',ManagersController::class);


//Route::resource('manager', ManagersController::class);

