<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Manager::create([
        //     'name' => 'first manager',
        //     'email' => 'firstmanager@yahoo.com',
        //     'birth_date' => 01-01-1990,
        //     'address' => 'tahrir',
        //     'phone' => '012345678990',
        //     'avatar' => '1.jpg',
        //     'password' => bcrypt(123456),
        //     'city' => 'cairo',
        // ]);

        // Manager::create([
        //     'name' => 'second manager',
        //     'email' => 'secondmanager@yahoo.com',
        //     'birth_date' => 01-01-1980,
        //     'address' => 'ramses',
        //     'phone' => '012645678990',
        //     'avatar' => '2.jpg',
        //     'password' => bcrypt(123456),
        //     'city' => 'giza',
        // ]);

        // Manager::create([
        //     'name' => 'third manager',
        //     'email' => 'thirdmanager@yahoo.com',
        //     'birth_date' => 15-01-1998,
        //     'address' => 'abdin',
        //     'phone' => '012345678990',
        //     'avatar' => '3.jpg',
        //     'password' => bcrypt(123456),
        //     'city' => 'alex',
        // ]);
    }
}
