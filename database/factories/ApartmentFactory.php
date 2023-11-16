<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\Owner;
use App\Models\Building;
use App\Models\ApartmentType;
use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomBuildingId = Building::inRandomOrder()->first()->id;
        $randomApartmentTypeId = ApartmentType::inRandomOrder()->first()->id;
        $ownerId = Owner::factory()->create()->id;

        return [
            'building_id' => $randomBuildingId,
            'apartment_type_id' => $randomApartmentTypeId,
            'owner_id' => $ownerId,
            'apartment_number' => fake()->randomDigitNotNull(),
            'max_tenants' => fake()->randomDigitNotNull(),
            'price' => fake()->numberBetween(300, 1500)
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure(): ApartmentFactory
    {
        return $this->afterCreating(function (Apartment $apartment) {
            $randomLimit = fake()->numberBetween(1, 5);
            $randomOptionsIds = Option::inRandomOrder()->limit($randomLimit)->pluck('id');
            $apartment->options()->attach($randomOptionsIds);
        });
    }
}
