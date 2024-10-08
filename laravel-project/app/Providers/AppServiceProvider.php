<?php

namespace App\Providers;
use App\Services\OpenAIService;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(OpenAIService::class, function ($app) {
            return new OpenAIService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (App::environment('production','staging')) {
            URL::forceScheme('https');
        }
    }
}
