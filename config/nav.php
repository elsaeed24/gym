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
        'route' => 'dashboard',
        'title' => 'Managers',
        'active' => 'Managers.*',
        'badge' => 'New',
    ],



];





