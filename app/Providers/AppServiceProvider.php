<?php

namespace App\Providers;

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
        //
	    view()->composer('components.teams',function($view){
		    $view->with('sports',\App\Sport::all());
	    });
	    view()->composer('components.tournament-create',function($view){
		    $view->with('sports',\App\Sport::all());

	    });
	    view()->composer('components.tournaments',function($view){

		    $view->with('formats',\App\Format::all());
		    $view->with('levels',\App\Level::all());
	    });
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
