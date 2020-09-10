<?php

namespace App\Providers;

use App\Services\Character\CharacterRepository;
use App\Services\Character\CharacterRepositoryEloquent;
use App\Services\CurrentDateProvider;
use App\Services\DateProvider;
use App\Services\JWT\JWTAuth;
use App\Services\Pet\PetRepository;
use App\Services\Pet\PetRepositoryEloquent;
use App\Services\User\UserRepository;
use App\Services\User\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $singletons = [
        DateProvider::class => CurrentDateProvider::class,
        PetRepository::class => PetRepositoryEloquent::class,
        UserRepository::class => UserRepositoryEloquent::class,
        CharacterRepository::class => CharacterRepositoryEloquent::class,
    ];


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(JWTAuth::class);
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
