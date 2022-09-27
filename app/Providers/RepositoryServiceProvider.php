<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    ContactRepositoryInterface,
    ContactInformationRepositoryInterface
};
use App\Repositories\{
    ContactRepository,
    ContactInformationRepository
};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ContactRepositoryInterface::class,
            ContactRepository::class,
        );

        $this->app->bind(
            ContactInformationRepositoryInterface::class,
            ContactInformationRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
