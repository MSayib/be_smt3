<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Membuat data dummy dari factory sebanyak 5 data
     */
    public function run()
    {
        User::factory(5)->create();
    }
}
