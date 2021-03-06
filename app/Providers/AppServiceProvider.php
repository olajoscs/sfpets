<?php

namespace App\Providers;

use App\Services\Character\CharacterPetRepository;
use App\Services\Character\CharacterPetRepositoryEloquent;
use App\Services\Character\CharacterRepository;
use App\Services\Character\CharacterRepositoryEloquent;
use App\Services\JWT\JWTAuth;
use App\Services\JWT\TokenRepository;
use App\Services\JWT\TokenRepositoryEloquent;
use App\Services\Pet\PetRepository;
use App\Services\Pet\PetRepositoryEloquent;
use App\Services\User\UserRepository;
use App\Services\User\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
use OlajosCs\DateProvider\CurrentDateProvider;
use OlajosCs\DateProvider\DateProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $singletons = [
        DateProvider::class => CurrentDateProvider::class,
        PetRepository::class => PetRepositoryEloquent::class,
        UserRepository::class => UserRepositoryEloquent::class,
        CharacterRepository::class => CharacterRepositoryEloquent::class,
        CharacterPetRepository::class => CharacterPetRepositoryEloquent::class,
        TokenRepository::class => TokenRepositoryEloquent::class,
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
