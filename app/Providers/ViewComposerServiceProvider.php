<?php
namespace App\Providers;

use App\Services\Authorization;
use App\Data\Repositories\Users;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (!isset($view->laravel)) {
                $view->with('laravel', []);
            }
        });
    }
}
