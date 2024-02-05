<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KontakFactory extends Factory
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
        'nama_lengkap'=>$this->faker->firstName(),
        'jabatan'=>$this->faker->randomElement(['Direktur','CEO','Sekretaris','Bendahara']),
        'nomor_telepon'=>$this->faker->numerify('628#########')
        ];
    }
}
