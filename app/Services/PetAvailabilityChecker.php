<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Pet;

/**
 * Class PetAvailabilityChecker
 *
 * Check that a Pet is available at the given date or not
 */
class PetAvailabilityChecker
{
    private array $weekDays = [
        'monday' => 1,
        'tuesday' => 2,
        'wednesday' => 3,
        'thursday' => 4,
        'friday' => 5,
        'saturday' => 6,
        'sunday' => 7,
    ];

    private array $seasons = [
        'winter' => [12, 1, 2],
        'spring' => [3, 4, 5],
        'summer' => [6, 7, 8],
        'fall' => [9, 10, 11],
    ];


    /**
     * Check that a Pet is available at the given date or not
     * // TODO: Check for events, Check for specific date
     *
     * @param Pet                $pet
     * @param \DateTimeImmutable $date
     *
     * @return bool
     */
    public function isAvailableAt(Pet $pet, \DateTimeImmutable $date): bool
    {
        $properties = $pet->getProperties();

        return
            $this->isDayAllowed($properties->day, $date) &&
            $this->isSeasonAllowed($properties->season, $date) &&
            $this->isSpecialAllowed($properties->special, $date) &&
            true;
    }


    private function isDayAllowed(?string $day, \DateTimeImmutable $date): bool
    {
        if ($day === null) {
            return true;
        }

        return (int)$date->format('N') === $this->weekDays[$day];
    }


    private function isSeasonAllowed(?string $season, \DateTimeImmutable $date): bool
    {
        if ($season === null) {
            return true;
        }

        return in_array((int)$date->format('m'), $this->seasons[$season], true);
    }


    private function isSpecialAllowed(?string $special, \DateTimeImmutable $date): bool
    {
        if ($special === null) {
            return true;
        }

        switch ($special) {
            case 'halloween':
                return (int)$date->format('m') === 10 && (int)$date->format('d') === 31;

            default:
                throw new \Exception('Invalid special: ' . $special);
        }
    }
}
