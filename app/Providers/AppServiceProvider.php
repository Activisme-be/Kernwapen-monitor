<?php

namespace App\Providers;

use App\Composers\LayoutComposer;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;
use App\Models\Tags;
use App\Observers\TagsObserver;

/**
 * Class AppServiceProvider 
 * 
 * @package App\Provider
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        view()->composer('*', LayoutComposer::class);

        // Eloquent Models observers
        Tags::observe(TagsObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}
