<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Membuat data dummy dari factory sebanyak 100 data
     */
    public function run()
    {
        Patient::factory(100)->create();
    }
}
