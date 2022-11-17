<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /**
         * Seed data dummy
         */
        $this->call([
            StatusSeeder::class,
            PatientSeeder::class,
            UserSeeder::class,
        ]);
    }
}
