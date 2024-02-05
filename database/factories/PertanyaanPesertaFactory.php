<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PertanyaanPesertaFactory extends Factory
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
            'master_pertanyaan_id'=>$this->faker->randomDigit(1,5),
            'jawaban' => $this->faker->word()
        ];
    }
}
