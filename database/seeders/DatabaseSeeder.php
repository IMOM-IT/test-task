<?php

namespace Database\Seeders;

use App\Models\AccountingCars;
use Database\Factories\AccountingCarsFactory;
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
        // \App\Models\User::factory(10)->create();
        AccountingCars::factory(500)->create();
    }
}
