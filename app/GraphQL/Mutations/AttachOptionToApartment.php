<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Option;
use App\Models\Apartment;

final readonly class AttachOptionToApartment
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $apartment = Apartment::findOrFail($args['apartment_id']);
        $option = Option::findOrFail($args['option_id']);

        $apartment->options()->attach($option);

        return $apartment;
    }
}
