<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PendidikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->randomDigit(1,10),
        'jenjang' => $this->faker->randomElement(['S1','S2','S3']),
        'nama_kampus' => $this->faker->company(),
        'tahun_lulus' => $this->faker->date('Y')
        ];
    }
}
