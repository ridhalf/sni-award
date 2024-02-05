<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PelatihanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigit(1,10),
        'nama_pelatihan'=> $this->faker->sentence(1,true),
        'tgl_mulai'=>$this->faker->date('Y-m-d'),
        'tgl_selesai'=>$this->faker->date('Y-m-d'),
        ];
    }
}
