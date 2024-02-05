<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SekretariatFactory extends Factory
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
            'nama_lengkap'=>$this->faker->name(),
            'gambar'=>$this->faker->randomElement(['gambar1','gambar2','gambar3'])
        ];
    }
}
