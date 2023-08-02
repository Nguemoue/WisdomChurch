<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SharedDefaultLanguageServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
    	$supportedLocales = collect(\LaravelLocalization::getSupportedLocales());
    	\View::share("supportedLocales",$supportedLocales);
    }
}
