<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\LocaleService;
use Closure;

/**
 * Class SetLocale
 *
 * Set the application locale from the cookie
 */
class SetLocale
{
    private LocaleService $localeService;


    public function __construct(LocaleService $localeService)
    {
        $this->localeService = $localeService;
    }


    public function handle($request, Closure $next)
    {
        $this->localeService->setLocaleFromRequest();

        return $next($request);
    }
}
