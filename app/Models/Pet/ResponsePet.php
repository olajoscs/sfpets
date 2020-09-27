<?php

declare(strict_types=1);

namespace App\Models\Pet;

/**
 * Class ResponsePet
 *
 * Contains the necessary information for the API response
 */
class ResponsePet
{
    public int $id;
    public string $name;
    public string $description;
    public string $location;
    public string $category;
    public bool $available;
    public int $rank;
    public int $categoryId;
    public ?string $image;

    public bool $isDiscovered = false;
    public bool $isFound = false;

    public bool $sure;
}
