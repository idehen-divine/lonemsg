<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Libs\RepositoryInterfaces\UserRepositoryInterface;
use App\Libs\Repositories\UserRepository;

use App\Libs\RepositoryInterfaces\MessageRepositoryInterface;
use App\Libs\Repositories\MessageRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
		$this->app->bind(UserRepositoryInterface::class, UserRepository::class);
	
		$this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);
	
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
