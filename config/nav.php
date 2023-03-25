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

    ],

    [
        // second menu in navbar
        'icon' => 'fas fa-users',
        'route' => 'couches.index',
        'title' => 'Couches',
        'active' => 'couches.*',
        'badge' => 'New',
    ],

    [
    // second menu in navbar
    'icon' => 'fas fa-dumbbell',
    'route' => 'users.index',
    'title' => 'Users',
    'active' => 'users.*',
    'badge' => 'New',
    ]




];





