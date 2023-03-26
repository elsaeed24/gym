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
        // third menu in navbar
        'icon' => 'fas fa-dumbbell',
        'route' => 'gyms.index',
        'title' => 'Gyms',
        'active' => 'gyms.*',

    ],

    [
        // fourth menu in navbar
        'icon' => 'fas fa-users',
        'route' => 'couches.index',
        'title' => 'Couches',
        'active' => 'couches.*',
    ],

    [
        // fifth menu in navbar
        'icon' => 'fas fa-dumbbell',
        'route' => 'users.index',
        'title' => 'Users',
        'active' => 'users.*',
    ],

    [
        // sixth menu in navbar
        'icon' => 'fas fa-dumbbell',
        'route' => 'sessions.index',
        'title' => 'Training Sessions',
        'active' => 'sessions.*',
        'badge' => 'New',
        ],




];





