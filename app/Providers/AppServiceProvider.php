<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Contact_Us;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use \Mcamara\LaravelLocalization\Traits\LoadsTranslatedCachedRoutes;



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
        Paginator::useBootstrap();
        View::composer('frontend.layouts.footer' , function($view){
            $ContactUS = Contact_Us::first();
            $view->with('footerData', $ContactUS);
        });
        View::composer('backend.layouts.header' , function($view){
            $setting = Setting::first();
            $view->with('setting', $setting);
        });
        View::composer('frontend.layouts.header' , function($view){
            $setting = Setting::first();
            $view->with('setting', $setting);
        });

    }
}