<?php

namespace App\Providers;

use App\Category;
use App\Page;
use App\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = Setting::find(1);
        $pages = Page::all();
        $categories = Category::all();
        view::share(
            [
                'setting'    => $setting,
                'pages'      => $pages,
                'categories' => $categories
            ]
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
