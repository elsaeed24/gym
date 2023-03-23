<?php

return[
    [
        // first menu in navbar
        'icon' => 'fas fa-tachometer-alt',
        'route' => 'dashboard',
        'title' => 'Dashboard',
        'active' => 'dashboard'
    ],

    [
        // second menu in navbar
        'icon' => 'fas fa-dumbbell',
        'route' => 'manager.index',
        'title' => 'Managers',
        'active' => 'manager.*',

    ],

    [
        // second menu in navbar
        'icon' => 'fas fa-dumbbell',
        'route' => 'gyms.index',
        'title' => 'Gyms',
        'active' => 'gyms.*',
        'badge' => 'New',
    ],





];





