<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PendingDoctor>
 */
class PendingDoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $days_of_week = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $days_of_week_rand = array_rand($days_of_week, 2);

        return [
            'user_id' => $this->faker->numberBetween(51,100),
            'certificate' => 'uploaded_files/doctor_certificate/certificate.txt',
            'clinic_license' => 'uploaded_files/doctor_clinic_license/clinic_license.txt',
            'clinic_address' => $this->faker->state() . ' ' . $this->faker->secondaryAddress(),
            'governorate' => $this->faker->numberBetween(1, 27),
            'city' => $this->faker->numberBetween(1, 396),
            'major_id' => $this->faker->numberBetween(1,10),
            'pay_to_doctor' => 0,
            'holidays' => "[".$days_of_week[$days_of_week_rand[0]] . ', ' . $days_of_week[$days_of_week_rand[1]] . ']',
            'start_at' => now(),
            'end_at' => now()
        ];
    }
}
