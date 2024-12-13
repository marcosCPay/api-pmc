<?php

namespace App\Providers;
use App\Models\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\ServiceProvider;

use App\Services\DocumentService;

use App\ServicesImpl\DocumentServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->bind(DocumentService::class, DocumentServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        //
    }
}
