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
            'governorate_id' => $this->faker->numberBetween(1, 27),
            'city_id' => $this->faker->numberBetween(1, 396),
            'major_id' => $this->faker->numberBetween(1,10),
            'pay_to_doctor' => 0,
            'holidays' => $this->faker->randomElements($days_of_week, $count=2),
            'start_at' => "18:00:00",
            'end_at' => "12:00:00"
        ];
    }
}
