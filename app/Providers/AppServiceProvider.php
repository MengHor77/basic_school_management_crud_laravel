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
        //  home page component
        Blade::component('frontend.components.callToActionButton', 'callToActionButton');
        Blade::component('frontend.components.cardCourse', 'cardCourse');
        Blade::component('frontend.components.cardTeacher', 'cardTeacher');
        Blade::component('frontend.components.enrollButton', 'enrollButton');

        //  my courses pagecomponent
        Blade::component('frontend.components.viewCourseButton', 'viewCourseButton');
        Blade::component('frontend.components.removeCourseButton', 'removeCourseButton');
        Blade::component('frontend.components.cardMyCourse', 'cardMyCourse');

        //  about us page component
        Blade::component('frontend.components.cardOurMission', 'cardOurMission');
        Blade::component('frontend.components.cardOurVision', 'cardOurVision');
        Blade::component('frontend.components.cardOurCoreValues', 'cardOurCoreValues');
        Blade::component('frontend.components.cardProfile', 'cardProfile');

        //  Contact PageComponents
        Blade::component('frontend.components.contactHeader', 'contactHeader');
        Blade::component('frontend.components.alertMessage', 'alertMessage');
        Blade::component('frontend.components.contactForm', 'contactForm');
        Blade::component('frontend.components.cardContactInfo', 'cardContactInfo');
        Blade::component('frontend.components.googleMap', 'googleMap');
    }


}