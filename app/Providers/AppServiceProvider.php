<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
    public function boot()
    {
        //
////        if (!Auth::guest()) {
//            $user = Auth::user();
//            app()->setLocale($user->locale ?? app()->getLocale());
//            info(config('app.locale'));
////        }
//
////        info(__('voyager::generic.is_rtl'));
////        if( config('app.locale') == 'ar'){
////
////            \Carbon\Carbon::setLocale('ar_SY');
////        }

    }
}
