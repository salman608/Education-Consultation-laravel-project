<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\TutorProfile;

class MasterLayoutView extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.backend', function ($view) {
            if(auth()->user()->role == 'administrator')
            {
                $data['profile_photo'] = NULL;
            }
            if(auth()->user()->role == 'admin')
            {
                $data['profile_photo'] = NULL;
            }
            if(auth()->user()->role == 'tutor')
            {
                $top_percentage = 0;
                $data['top_percentage'] = $top_percentage;
                $top_percentage = TutorProfile::tutorProfilePercentage();
                if (!empty($top_percentage)) {
                    $data['top_percentage'] = $top_percentage;
                }
                /* red */
                $data['color'] = 'red';
                if ($top_percentage >= 60) {
                    /* yellow */
                    $data['color'] = 'yellow';
                }
                if ($top_percentage >= 80) {
                    /* blue */
                    $data['color'] = 'blue';
                }

                $data['profile_photo'] = auth()->user()->relTutorsProfile->photo;
            }
            if(auth()->user()->role == 'guardian')
            {
                $data['profile_photo'] = auth()->user()->relGuardianProfile->photo;
            }
            $view->with($data);
        });
    }
}
