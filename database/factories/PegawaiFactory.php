<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Pegawai::class;
    public function definition(): array
    {
        return [
            'nama_pegawai' => $this->faker->name('female'),
            'jenis_kelamin' => 'Perempuan',
            'email' => $this->faker->safeEmail(),
            'alamat' => $this->faker->streetAddress(),
        ];
    }
}
