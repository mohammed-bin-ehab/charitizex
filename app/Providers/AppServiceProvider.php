<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Image;

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
        Schema::defaultStringLength(191);

        $settings = Setting::pluck('value', 'key')->toArray();
        View::share('settings', $settings);

        $images = Image::where('type', 'gallery')->latest()->take(6)->get()->toArray();
        View::share('images', $images);
    }
}
