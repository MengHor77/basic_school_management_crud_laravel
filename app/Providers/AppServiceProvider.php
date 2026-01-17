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
        // component home page 
        Blade::component('frontend.components.callToActionButton', 'callToActionButton');
        Blade::component('frontend.components.cardCourse', 'cardCourse');
        Blade::component('frontend.components.cardTeacher', 'cardTeacher');
        Blade::component('frontend.components.enrollButton', 'enrollButton');

        // component my courses page
        Blade::component('frontend.components.viewCourseButton', 'viewCourseButton');
        Blade::component('frontend.components.removeCourseButton', 'removeCourseButton');
        Blade::component('frontend.components.cardMyCourse', 'cardMyCourse');

        // component about us page
        Blade::component('frontend.components.cardOurMission', 'cardOurMission');
        Blade::component('frontend.components.cardOurVision', 'cardOurVision');
        Blade::component('frontend.components.cardOurCoreValues', 'cardOurCoreValues');
        Blade::component('frontend.components.cardProfile', 'cardProfile');
    }


}
