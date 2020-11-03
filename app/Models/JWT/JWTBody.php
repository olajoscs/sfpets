<?php

declare(strict_types=1);

namespace App\Models\JWT;

/**
 * Defines the body (payload) of the jwt token
 */
class JWTBody
{
    /**
     * @var string
     */
    public $uuid;

    /**
     * @var string Issuer
     */
    public $iss;

    /**
     * @var int Issued at timestamp
     */
    public $iat;


    public function __construct(?string $uuid = null, ?\DateTimeImmutable $issuedAt = null)
    {
        if ($uuid !== null) {
            $this->uuid = $uuid;
        }

        if ($issuedAt !== null) {
            $this->iat = $issuedAt->getTimestamp();
        }

        $this->iss = env('APP_NAME');
    }


    /**
     * Create a JWTBody object from an stdclass
     *
     * @param object $object
     *
     * @return JWTBody
     */
    public static function createFromStdClass(object $object): JWTBody
    {
        $jwtBody = new static();

        foreach (get_object_vars($object) as $property => $value) {
            $jwtBody->$property = $value;
        }

        return $jwtBody;
    }


    /**
     * Do not allow magic set
     *
     * @param $name
     * @param $value
     *
     * @return void
     */
    public function __set($name, $value)
    {
        throw new \InvalidArgumentException('Magic set is not permitted');
    }
}