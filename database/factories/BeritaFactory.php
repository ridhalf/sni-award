<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>$this->faker->randomDigit(1,10),
        'judul' => $this->faker->title(),
        'slug' =>$this->faker->slug(),
        'konten'=>$this->faker->paragraph(mt_rand(4,6)),
        'gambar' => $this->faker->randomElement(['gambar1','gambar2','gambar3'])
        ];
    }
}
