<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use App\Models\Category;
use App\Models\Link;
use DB;

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

        // View::composer('frontEnd.home.home', function($view) {
        View::composer('*', function($view) {
            //$categories = Category::where('publicationStatus', 1)->get();
            $categories = Category::all();
            $view->with('categories', $categories);
        });

        View::composer('*', function($view) {
            $tv = Link::where('type', 'LiveTv')->first();
            $index = Link::where('type', 'Index')->first();
            $partner = Link::where('type', 'FTP-Partner')->first();

            $view->with([
                'tv' => $tv,
                'index' => $index,
                'partner' => $partner,
            ]);
        });




    }
}
