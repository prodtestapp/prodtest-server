<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\Step;
use App\Observers\ProjectObserver;
use App\Observers\StepObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Step::observe(StepObserver::class);
        Project::observe(ProjectObserver::class);
    }
}
