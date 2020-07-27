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
            $this->isAvailableByDay($properties->day, $date) &&
            $this->isAvailableBySeason($properties->season, $date) &&
            $this->isAvailableBySpecial($properties->special, $date);
    }


    private function isAvailableByDay(?string $day, \DateTimeImmutable $date): bool
    {
        if ($day === null) {
            return true;
        }

        return (int)$date->format('N') === $this->weekDays[$day];
    }


    private function isAvailableBySeason(?string $season, \DateTimeImmutable $date): bool
    {
        if ($season === null) {
            return true;
        }

        return in_array((int)$date->format('m'), $this->seasons[$season], true);
    }


    private function isAvailableBySpecial(?string $special, \DateTimeImmutable $date): bool
    {
        if ($special === null) {
            return true;
        }

        switch ($special) {
            case 'halloween':
                return $this->isHalloween($date);

            case 'easter':
                return $this->isEaster($date);

            case 'whitsun':
                return $this->isWhitsun($date);

            case 'valentine':
                return $this->isValentine($date);

            case 'new-year':
                return $this->isNewYear($date);

            default:
                throw new \Exception('Invalid special: ' . $special);
        }
    }


    private function isHalloween(\DateTimeImmutable $date): bool
    {
        return (int)$date->format('m') === 10 && (int)$date->format('d') === 31;
    }


    private function isEaster(\DateTimeImmutable $date): bool
    {
        $easterSunday = $this->createEasterSunday($date);
        $easterMonday = $easterSunday->modify('+1 day');

        return $date == $easterSunday || $date == $easterMonday;
    }


    /**
     * https://hu.wikipedia.org/wiki/P%C3%BCnk%C3%B6sd
     */
    private function isWhitsun(\DateTimeImmutable $date): bool
    {
        $easterSunday = $this->createEasterSunday($date);
        $whitsunSunday = $easterSunday->modify('+7 weeks');
        $whitsunMonday = $whitsunSunday->modify('+1 day');

        return $date == $whitsunSunday || $date == $whitsunMonday;
    }


    private function createEasterSunday(\DateTimeImmutable $date): \DateTimeImmutable
    {
        $easterDays = easter_days((int)$date->format('Y'));
        $march21 = (new \DateTimeImmutable())->setDate((int)$date->format('Y'), 3, 21)->setTime(0, 0, 0);

        return $march21->modify($easterDays . ' days');
    }


    private function isValentine(\DateTimeImmutable $date): bool
    {
        return (int)$date->format('m') === 2 && (int)$date->format('d') === 14;
    }


    private function isNewYear(\DateTimeImmutable $date): bool
    {
        return
            ((int)$date->format('m') === 12 && (int)$date->format('d') === 31) ||
            ((int)$date->format('m') === 1 && (int)$date->format('d') === 1);
    }
}
