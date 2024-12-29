<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\TaskCategory;
use App\Observers\TaskCategoryObserver;
use App\Observers\TaskObserver;
use OpenAI;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(OpenAI\Client::class, function ($app) {
            return OpenAI::client(env('OPENAI_API_KEY'));
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Task::observe(TaskObserver::class);
        TaskCategory::observe(TaskCategoryObserver::class);


    }
}
