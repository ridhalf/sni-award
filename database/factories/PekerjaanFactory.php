<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PekerjaanFactory extends Factory
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
        'jabatan'=>$this->faker->randomElement(['Direktur','Sekretaris','Ketua','Bendahara']),
        'instansi' => $this->faker->company(),
        'tahun_mulai' => $this->faker->date('Y'),
        'tahun_selesai' => $this->faker->randomElement([2020,2019,2021,2022])
        ];
    }
}
