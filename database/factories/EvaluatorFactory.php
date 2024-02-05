<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluatorFactory extends Factory
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
        'master_provinsi_id'=>$this->faker->randomDigit(1,5),
        'master_kota_kabupaten_id'=>$this->faker->randomDigit(1,5),
        'nama_lengkap'=>$this->faker->name(),
        'status'=>$this->faker->randomElement(['Calon Evaluator','Evaluator','Ketua Evaluator']),
        'nomor_telepon' =>$this->faker->phoneNumber(),
        'npwp' => $this->faker->numerify('001#########'),
        'ktp'=>$this->faker->nik(),
        'cv'=>$this->faker->randomElement(['cv1','cv2','cv3','cv4']),
        'flag_complated' => $this->faker->boolean()
        ];
    }
}
