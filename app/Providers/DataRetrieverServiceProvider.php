<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataRetrieverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->when('App\Http\Controllers\TransactionsController')
            ->needs('App\Contracts\DataRetriever')
            ->give(function () {
                $dataRetrieverService = config('dataretrievers.'.request()->source);
                
                if (is_null($dataRetrieverService)) {
                    abort(404);
                }
                
                return new $dataRetrieverService;
            });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
