<?php

namespace App\Providers;

use App\View\Composers\headerComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        View::composer('Articles.article', headerComposer::class);
        View::composer('Articles.index', headerComposer::class);
        View::composer('Articles.show', headerComposer::class);
        View::composer('dashboard.index', headerComposer::class);
        View::composer('Articles.showResetPasswordForm', headerComposer::class);

       
    }
    
}
