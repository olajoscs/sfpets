<?php

declare(strict_types=1);

return [
    /*
     * The key which is used to generate the JWT token signature
     */
    'secret' => env('JWT_SECRET', '')
];