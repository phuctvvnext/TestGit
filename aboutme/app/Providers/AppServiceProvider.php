<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Tintuc;
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
        View::share('publicURL', getenv('PUBLIC_URL'));
        View::share('adminURL', getenv('ADMIN_URL'));
        view()->composer('templates/admin/sidebar',function($view){
            $story = new Tintuc();
            
            $count = $story->check();
            $view->with('count',$count);
        });
    }
}
