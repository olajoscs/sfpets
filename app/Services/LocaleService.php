<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Sets the locale of the app
 */
class LocaleService
{
    private const COOKIE_NAME = 'locale';


    /**
     * Set the locale for the app
     *
     * @param string|null $localeCode
     *
     * @return void
     */
    public function setLocale(?string $localeCode): void
    {
        $availableLocales = \Config::get('app.locales_available');

        if (in_array($localeCode, $availableLocales, true)) {
            \App::setLocale($localeCode);
        }

        if (\Cookie::hasQueued(self::COOKIE_NAME)) {
            \Cookie::unqueue(self::COOKIE_NAME);
        }

        \Cookie::queue(\Cookie::forever(self::COOKIE_NAME, \App::getLocale()));
    }


    /**
     * Set the locale from the request
     *
     * @return void
     */
    public function setLocaleFromRequest(): void
    {
        if (\Cookie::get(self::COOKIE_NAME)) {
            $this->setLocaleFromCookie();
            return;
        }

        $this->setLocaleFromHeader();
    }


    /**
     * Set the locale for the app from the Cookie
     *
     * @return void
     */
    private function setLocaleFromCookie(): void
    {
        $localeCode = \Cookie::get(self::COOKIE_NAME);

        $this->setLocale($localeCode);
    }


    /**
     * Set the locale for the app from the browser useragent
     *
     * @return void
     */
    private function setLocaleFromHeader(): void
    {
        $locale = \Request::getPreferredLanguage();

        $this->setLocale(substr($locale, 0, 2));
    }
}
