<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PesertaFactory extends Factory
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
        'nama_organisasi'=>$this->faker->unique()->company(),
        'master_kota_kabupaten_id'=>$this->faker->randomDigit(1,5),
        'master_sektor_kategori_id'=>$this->faker->randomDigit(1,5),
        'master_sni_id'=>$this->faker->randomDigit(1,5),
        'master_provinsi_id'=>$this->faker->randomDigit(1,5),
        ];
    }
}
