<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Symfony\Component\Console\Question\Question;

class MasterPertanyaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipe_pertanyaan' =>$this->faker->sentence(1),
            'pertanyaan' => $this->faker->sentence(5)
        ];
    }
}
