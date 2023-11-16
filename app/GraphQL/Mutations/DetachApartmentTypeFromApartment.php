<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Apartment;
use App\Models\ApartmentType;

final readonly class DetachApartmentTypeFromApartment
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $apartment = Apartment::findOrFail($args['apartment_id']);
        $apartmentType = ApartmentType::findOrFail($args['apartment_type_id']);

        $apartment->apartmentType()->dissociate($apartmentType);

        return $apartment;
    }
}
