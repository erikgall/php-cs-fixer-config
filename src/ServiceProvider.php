<?php

namespace ErikGall\PhpCsFixer;

use Illuminate\Support\ServiceProvider as BaseProvider;

/**
 * PHP-CS-Fixer Laravel service provider.
 *
 * @author Erik Galloway <erikgalloway8@gmail.com>
 */
class ServiceProvider extends BaseProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\InstallPhpCsFixer::class,
                Commands\RunPhpCsFixer::class,
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}
