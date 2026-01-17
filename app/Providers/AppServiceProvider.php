<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('frontend.components.callToActionButton', 'callToActionButton');
        Blade::component('frontend.components.cardCourse', 'cardCourse');
        Blade::component('frontend.components.cardTeacher', 'cardTeacher');
        Blade::component('frontend.components.enrollButton', 'enrollButton');
    }


}
