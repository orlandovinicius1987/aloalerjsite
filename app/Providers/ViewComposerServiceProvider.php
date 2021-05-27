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
                'files_upload_url' => route('files.upload'),
                'csrf_token' => csrf_token(),
                'api_token' => \Auth::user()->api_token ?? '',
                'chat' => config('chat'),
                'mode' => 'show',
                'config' => ['mix_message_home' => config('app.mix_message_home')],
            ]);

            if (!isset($view->workflow)) {
                $view->with('workflow', Workflow::started());
            }
        });
    }

    private function mergeLaravel($view, $laravel)
    {
        if (isset($view->laravel)) {
            $laravel = array_merge($laravel, $view->laravel);
        }

        $view->with('laravel', $laravel);
    }
}
