<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
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
        $pattern = "/^http:\/\/|^https:\/\//";
        Validator::extend('contains_name_protocol',
            function ($attributes, $value, $parameters, $validator) use ($pattern) {
                return is_string($value) && preg_match($pattern, $value);
            }
        );
    }
}
