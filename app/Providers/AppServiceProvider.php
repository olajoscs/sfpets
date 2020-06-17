<?php

namespace App\Providers;

use App\Services\CurrentDateProvider;
use App\Services\DateProvider;
use App\Services\PetRepository;
use App\Services\PetRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $singletons = [
        DateProvider::class => CurrentDateProvider::class,
        PetRepository::class => PetRepositoryEloquent::class,
    ];


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
