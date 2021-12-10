<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        if(env('APP_ENV') != 'local'){
            URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
                $view->with('pub_brands', Brand::where('status', 1)->latest()->get());
                $view->with('pub_linit_categories', Category::where('status', 1)->orderBy('id', 'ASC')->take(4)->get());
                $view->with('all_pub_categories', Category::where('status', 1)->orderBy('id', 'ASC')->get());
                $view->with('all_new_pub_products', Product::where('status', 1)->orderBy('id', 'DESC')->get());
        });


    }
}