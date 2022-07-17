<?php

namespace App\Containers\AppSection\User\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use  App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Observers\UserObserver;
/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{

/**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        parent::boot();

       User::observe(UserObserver::class);
    }

    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
        // InternalServiceProviderExample::class,
        // ...
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [

    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        // do your binding here..
        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
