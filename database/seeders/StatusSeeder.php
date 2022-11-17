<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Membuat data dummy custom (pre-defined)
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Negative'],
            ['id' => 2, 'name' => 'Positive'],
            ['id' => 3, 'name' => 'Recovered'],
            ['id' => 4, 'name' => 'Dead'],
        ];

        //Handle jika Seeder dipanggil lebih dari 1x
        foreach ($items as $item) {
            Status::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
