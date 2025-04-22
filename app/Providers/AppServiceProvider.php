<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Backend\AppLayout;
use App\View\Components\Frontend\AppLayout as FrontendAppLayout;
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
     * \\
     */
    public function boot(): void
    {
        Blade::component('backend.app-layout', AppLayout::class);
        Blade::component('frontend.app-layout', FrontendAppLayout::class);
        Paginator::useTailwind();
        // Paginator::useBootstrap();
    }
}
