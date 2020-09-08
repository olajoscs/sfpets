<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Provides an exact date and time
 */
class ExactDateProvider implements DateProvider
{
    private \DateTimeImmutable $date;


    public function __construct(\DateTimeImmutable $date)
    {
        $this->date = $date;
    }


    public function getToday(): \DateTimeImmutable
    {
        return $this->getNow()->setTime(0, 0, 0);
    }


    public function getNow(): \DateTimeImmutable
    {
        return $this->date;
    }
}