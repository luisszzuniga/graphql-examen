<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Building;
use App\Models\Equipment;

final readonly class DetachEquipmentFromBuilding
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $building = Building::findOrFail($args['building_id']);
        $equipment = Equipment::findOrFail($args['equipment_id']);

        $building->equipments()->detach($equipment);

        return $building;
    }
}
