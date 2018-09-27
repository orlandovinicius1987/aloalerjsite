<?php

namespace App\Providers;

use App\Services\Workflow;
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
            $this->mergeLaravel($view, [
                'files_upload_url' => dd(route('files.upload')),
            ]);

            if (!isset($view->workflow)) {
                $view->with('workflow', Workflow::started());
            }
        });
    }

    public function mergeLaravel($view, $laravel)
    {
        if (isset($view->laravel)) {
            $laravel = array_merge($view->laravel, $laravel);
        }

        $view->with('laravel', $laravel);
    }
}
