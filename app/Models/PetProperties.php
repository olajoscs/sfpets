<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Class PetProperties
 *
 * Definition of the properties of a pet
 */
class PetProperties
{
    public ?string $day;
    public ?string $season;
    public ?string $special;
    public ?string $event;
    public ?\stdClass $date;


    public function __construct(\stdClass $object)
    {
        $this->day = $object->day ?? null;
        $this->season = $object->season ?? null;
        $this->special = $object->special ?? null;
        $this->event = $object->event ?? null;
        $this->date = $object->date ?? null;
    }
}
