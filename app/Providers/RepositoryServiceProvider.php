<?php

namespace App\Providers;
use App\Libs\Interfaces\MessageRepositoryInterface;
use App\Libs\Repository\MessageRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Automatically generated binding code
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
