<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Provides date and time
 */
interface DateProvider
{
    public function getToday(): \DateTimeImmutable;


    public function getNow(): \DateTimeImmutable;
}
