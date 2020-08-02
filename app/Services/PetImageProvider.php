<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Pet;

/**
 * Provides Pet image full path
 */
class PetImageProvider
{
    private const IMAGE_PATH = '/images/pets/';


    public function getImageFullPath(Pet $pet): string
    {
        if ($pet->image === null) {
            return $this->getPlaceHolderImage($pet);
        }

        return $this->generateFullPath($pet->image);
    }


    private function getPlaceHolderImage(Pet $pet): string
    {
        $categoryName = $pet->category->translate('name', 'en');

        return $this->generateFullPath($categoryName . '-egg.png');
    }


    private function generateFullPath(string $image): string
    {
        return self::IMAGE_PATH . $image;
    }
}
