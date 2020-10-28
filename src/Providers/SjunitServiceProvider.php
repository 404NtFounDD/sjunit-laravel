<?php
namespace OldFather\SJunitLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class SjunitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRoutes();
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'sjunit'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function routeConfiguration()
    {
        return [
            'namespace' => 'OldFather\SJunitLaravel\Http\Controllers',
            'prefix' => 'sjunit',
            'middleware'=>'web'
        ];
    }
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
    }
}