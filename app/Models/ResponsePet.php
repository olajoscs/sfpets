<?php

declare(strict_types=1);

namespace App\Models;

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

    public bool $sure;
}
