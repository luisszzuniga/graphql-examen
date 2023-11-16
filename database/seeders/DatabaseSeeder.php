<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Apartment;
use App\Models\Option;
use App\Models\Equipment;
use App\Models\Syndicate;
use App\Models\ApartmentType;
use App\Models\Building;
use App\Models\RentReceipt;
use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Database\Factories\SyndicateFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ApartmentType::create(['name' => 'Studio']);
        ApartmentType::create(['name' => 'T1']);
        ApartmentType::create(['name' => 'T2']);
        ApartmentType::create(['name' => 'T3']);
        ApartmentType::create(['name' => 'T4']);

        Equipment::create(['name' => 'Elevator']);
        Equipment::create(['name' => 'Intercom']);
        Equipment::create(['name' => 'Gym']);
        Equipment::create(['name' => 'Underground parking']);
        Equipment::create(['name' => 'Laundry room']);

        Option::create(['name' => 'Balcony']);
        Option::create(['name' => 'TV']);
        Option::create(['name' => 'Air conditioning']);
        Option::create(['name' => 'Fully equipped kitchen']);
        Option::create(['name' => 'Pet-friendly']);
        Option::create(['name' => 'Washer and dryer']);

        Syndicate::factory()->count(5)->create();
        Building::factory()->count(10)->create();
        Apartment::factory()->count(100)->create();
        Tenant::factory()->count(200)->create();
        RentReceipt::factory()->count(1000)->create();
    }
}
