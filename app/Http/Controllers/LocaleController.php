<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\LocaleService;
use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    private LocaleService $localeService;


    public function __construct(LocaleService $localeService)
    {
        $this->localeService = $localeService;
    }


    public function setLocale(?string $localeCode): RedirectResponse
    {
        $this->localeService->setLocale($localeCode);

        return \Redirect::to('/');
    }
}
