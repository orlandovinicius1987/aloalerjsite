<?php
namespace App\Providers;

use App\Services\Authorization;
use App\Data\Repositories\Users;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Horizon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @var Users
     */
    private $usersRepository;

    public function __construct()
    {
        $this->usersRepository = app(Users::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootGates();

        $this->bootHorizon();
    }

    private function bootHorizon()
    {
        Horizon::auth(function ($request) {
            return true;
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

    private function bootGates()
    {
        Gate::define('use-app', function ($user) {
            if ($user->userType->name == 'Comissao') {
                if ($user->committees->count() == 0) {
                    //Se for de comissão e não tem nenhuma comissão. Usuário não autorizado
                    return false;
                } else {
                    //Se for de comissão e tiver alguma comissão
                    return true;
                }
            } else {
                //Se não for de comissão, aceita
                return true;
            }
        });
    }
}
