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
        'icon' => 'fas fa-calendar-check',
        'route' => 'sessions.index',
        'title' => 'Training Sessions',
        'active' => 'sessions.*',

        ],

        [
            // sixth menu in navbar
            'icon' => 'fas fa-user-clock',
            'route' => 'attendances.index',
            'title' => 'Attendances',
            'active' => 'attendances.*',

            ],

            [
                // sixth menu in navbar
                'icon' => 'far fa-circle',
                'route' => 'packages.index',
                'title' => 'Packages',
                'active' => 'packages.*',
                'badge' => 'New',
                ],




];





