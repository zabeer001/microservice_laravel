<?php

namespace App\Providers;

use App\Jobs\ProductCreated;
use App\Jobs\ProductDeleted;
use App\Jobs\ProductUpdated;
use App\Jobs\TestJob;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // \App::bindMethod(TestJob::class . '@handle', function ($job) {
        //     return $job->handle();
        // });

          \App::bindMethod(ProductCreated::class . '@handle', function ($job) {
            return $job->handle();
        });

            \App::bindMethod(ProductUpdated::class . '@handle', function ($job) {
            return $job->handle();
        });

              \App::bindMethod(ProductDeleted::class . '@handle', function ($job) {
            return $job->handle();
        });
    }
}
