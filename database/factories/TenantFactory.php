<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $person = Person::factory()->create();
        $randomApartment = Apartment::inRandomOrder()->first();
        $principalTenant = $randomApartment->tenants()->where('principal_tenant', true)->first() ? false : true;
        
        return [
            'person_id' => $person->id,
            'apartment_id' => $randomApartment->id,
            'principal_tenant' => $principalTenant,
        ];
    }
}
