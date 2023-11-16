<?php

namespace Database\Factories;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RentReceipt>
 */
class RentReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomApartment = Apartment::whereHas('tenants')->inRandomOrder()->first();
        $randomTenant = $randomApartment->tenants()->inRandomOrder()->first();

        return [
            'apartment_id' => $randomApartment->id,
            'tenant_id' => $randomTenant->id,
            'issued' => fake()->boolean() ? fake()->dateTimeBetween('-1 year', 'now') : null,
            'payed' => fake()->boolean() ? fake()->dateTimeBetween('-1 year', 'now') : null,
            'total' => $randomApartment->price,
        ];
    }
}
