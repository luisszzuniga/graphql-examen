<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\Equipment;
use App\Models\Syndicate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomSyndicateId = Syndicate::inRandomOrder()->first()->id;
        
        return [
            'name' => fake()->name(),
            'syndicate_id' => $randomSyndicateId,
            'address' => fake()->streetAddress(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure(): BuildingFactory
    {
        return $this->afterCreating(function (Building $building) {
            $randomLimit = fake()->numberBetween(1, 5);
            $randomEquipmentIds = Equipment::inRandomOrder()->limit($randomLimit)->pluck('id');
            $building->equipments()->attach($randomEquipmentIds);
        });
    }
}
