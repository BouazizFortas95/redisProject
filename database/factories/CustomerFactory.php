<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = now()->addMonths(random_int(-1, 1));
        return [
            'name' => fake('ar_SA')->name(),
            'national_num' => fake('ar_SA')->nationalIdNumber,
            'email' => fake('ar_SA')->email(),
            'subscribtion_end_date' => '2023-'.$date->format("m").'-'.str_pad(random_int(1, 30), 2, '0', STR_PAD_LEFT),
        ];
    }
}
