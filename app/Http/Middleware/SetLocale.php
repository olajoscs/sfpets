<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;

/**
 * Class SetLocale
 *
 * Set the application locale from the cookie
 */
class SetLocale
{
    public function handle($request, Closure $next)
    {
        $availableLocales = \Config::get('app.locales_available');
        $locale = \Cookie::get('lang');

        if (in_array($locale, $availableLocales, true)) {
            \App::setLocale($locale);
        }

        \Cookie::queue(\Cookie::forever('lang', \App::getLocale()));

        return $next($request);
    }
}
