<?php

namespace Database\Factories;

use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    public function definition()
    {
        /**
         * Faker untuk generate data dummy
         */
        $in_date_at = Carbon::instance($this->faker->dateTimeBetween('2020-01-01', 'now'));
        return [
            'status_id' => Status::pluck('id')->random(),
            'name'  => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'in_date_at' => $in_date_at,
            'out_date_at' => (clone $in_date_at)->addDays(random_int(14,42)), //Berdasarkan data masa PENYEMBUHAN gejala covid berlangsung 2 minggu hingga 6 minggu
        ];
    }
}
