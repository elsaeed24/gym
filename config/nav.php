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
        'route' => 'managers.index',
        'title' => 'Managers',
        'active' => 'managers.*',
        'badge' => 'New',
    ],
    [
        // second menu in navbar
        'icon' => 'fas fa-dumbbell',
        'route' => 'gyms.index',
        'title' => 'Gyms',
        'active' => 'gyms.*',

    ],




];





