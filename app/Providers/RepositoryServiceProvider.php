<?php

namespace App\Providers;

use App\Interfaces\HomeRepositoryInterface;
use App\Interfaces\ResultRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\HomeRepository;
use App\Repositories\ResultRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ResultRepositoryInterface::class, ResultRepository::class);
        $this->app->bind(HomeRepositoryInterface::class, HomeRepository::class);
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
