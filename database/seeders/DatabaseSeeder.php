<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;
use \App\Models\Employees;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // User Dummy Data
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@#123'),
        ]);

        // Employee Dummy Data
        Employees::create([
            'empid' => "EMP4512651",
            'emp_name' => 'Mr. Vasudev Mehra',
            'emp_designation' => "Sr. PHP Web Developer",
            'emp_date_of_join' => "2021-06-05",
            'emp_gender' => "male",
            'emp_address' => "Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016",
        ]);

        // Employee Dummy Data
        Employees::create([
            'empid' => "EMP4512652",
            'emp_name' => 'Vishakha Malhotra',
            'emp_designation' => "Javascript Developer",
            'emp_date_of_join' => "2022-03-02",
            'emp_gender' => "female",
            'emp_address' => "41, Manoj Industrial Estate, Gd Ambekar Road, Wadala, Mumbai, Maharashtra-400031",
        ]);
    }
}
