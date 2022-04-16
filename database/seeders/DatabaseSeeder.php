<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Major;
use App\Models\PendingDoctor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(100)->create();
         Admin::factory(5)->create();
         Major::factory(10)->create();
        $this->call([
            GovernoratesSeeder::class,
            CitiesSeeder::class,
            DayOfWeekSeeder::class,
        ]);
    }
}
