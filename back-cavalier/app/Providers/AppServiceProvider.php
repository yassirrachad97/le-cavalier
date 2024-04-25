<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Categories;
use App\Services\AuthService;
use App\Services\AuthServiceInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $articles = Article::all();
            $view->with('articles', $articles);
        });

        view()->composer('*', function ($view) {
            $categories = Categories::all();
            $view->with('categories', $categories);
        });
        Paginator::useBootstrap();
    }
}
