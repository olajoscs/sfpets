<?php

declare(strict_types=1);

namespace App\Services\Pet;

use App\Models\Pet\Pet;

/**
 * Determines that the availability of the pet is sure or not
 */
class PetSureChecker
{
    /**
     * Determine that the availability of the pet is sure or not
     *
     * @param \App\Models\Pet\Pet $pet
     *
     * @return bool
     */
    public function isSure(Pet $pet): bool
    {
        $properties = $pet->getProperties();

        // In the first version, only the event pets are not sure
        return $properties->event === null;
    }
}