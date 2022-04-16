<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(51,100),
            'certificate' => 'tmam',
            'clinic_license' => 'tmam',
            'clinic_address' => $this->faker->state() . ' ' . $this->faker->secondaryAddress(),
            'governorate' => $this->faker->state(),
            'major_id' => $this->faker->numberBetween(1,10),
            'pay_to_doctor' => 0,
            'sum_pay_to_doctor' => 0,
            'start_at' => now(),
            'end_at' => now()
        ];
    }
}
