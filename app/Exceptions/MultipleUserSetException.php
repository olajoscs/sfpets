<?php

declare(strict_types=1);

namespace App\Exceptions;

/**
 * Thrown when multiple users are authenticated in one request
 */
class MultipleUserSetException extends \Exception
{

}