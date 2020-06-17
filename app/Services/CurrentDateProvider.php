<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Class CurrentDateProvider
 *
 * Provides always the current date/time
 */
class CurrentDateProvider implements DateProvider
{
    public function getToday(): \DateTimeImmutable
    {
        return $this->getNow()->setTime(0, 0, 0);
    }


    public function getNow(): \DateTimeImmutable
    {
        return new \DateTimeImmutable();
    }
}
