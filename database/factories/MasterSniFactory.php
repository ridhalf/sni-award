<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MasterSniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomor_sni'=> $this->faker->randomNumber(5,true),
        'tipe_sni' => $this->faker->randomElement(['produk','universitas','distributor'])
        ];
    }
}
