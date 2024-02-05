<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MasterDokumenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipe_dokumen'=>$this-> faker->unique()->word(),
        'format_file' => $this->faker-> randomElement(['pdf','jpeg','jpg','xlsx','docx']),
        ];
    }
}
