<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\MyCourse;
use App\Models\Course;

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

        // ----------------------
        // fronent components
        // ----------------------


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


        // ----------------------
        // Backend components
        // ----------------------

         // Backend Dashboard Components
        Blade::component('backend.components.welcomeAdmin', 'welcomeAdmin');
        Blade::component('backend.components.statCard', 'statCard');
        Blade::component('backend.components.quickLink', 'quickLink');

        // ----------------------
        // Share global data
        // ----------------------
        
        View::composer('*', function ($view) {
            $view->with('totalStudents', User::where('is_delete', 0)->count());
            $view->with('enrollmentsToday', MyCourse::whereDate('created_at', now())->count());
            $view->with('totalCourses', Course::count());
        });
    }


}