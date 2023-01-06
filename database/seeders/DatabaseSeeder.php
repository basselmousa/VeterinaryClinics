<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $this->call([
            DoctorSeeder::class,
//        UserSeeder::class,
        ]);

        Admin::create([
            "email" => "admin@pet-grooming.com",
            "password" => Hash::make("123456789")
        ]);

    }
}
