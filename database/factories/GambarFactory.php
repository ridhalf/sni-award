<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GambarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> $this->faker->randomDigit(1,10),
        'judul'=>$this->faker->title(),
        'nama_file'=> $this->faker->lexify()
        ];
    }
}
