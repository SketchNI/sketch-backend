<?php

namespace App\Providers;

use App\Models\PersonalAccessToken;
use Illuminate\Support\ServiceProvider;
use Inspector\Laravel\InspectorServiceProvider;
use Laravel\Dusk\DuskServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        /* I don't like this. - Sketch, 11:05pm 12/06/2022 */
        if ($this->app->environment(['local', 'testing'])) {
            $this->app->register(DuskServiceProvider::class);
        }

        if ($this->app->environment('production')) {
            $this->app->register(InspectorServiceProvider::class);
        }

        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
