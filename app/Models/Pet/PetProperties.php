<?php

declare(strict_types=1);

namespace App\Models\Pet;

/**
 * Class PetProperties
 *
 * Definition of the properties of a pet
 */
class PetProperties
{
    public ?string $day = null;
    public ?string $season = null;
    public ?string $special = null;
    public ?string $event = null;
    public ?\stdClass $date = null;
    public ?string $month = null;


    public function __construct(\stdClass $object)
    {
        foreach (get_object_vars($object) as $property => $value) {
            $this->$property = $value;
        }
    }


    public function __set($name, $value)
    {
        throw new \Exception('Invalid property: ' . $name);
    }
}
