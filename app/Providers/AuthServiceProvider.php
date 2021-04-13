<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Data\Repositories\UsersCommittees as UsersCommitteesRepostory;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('committee-canEdit', function ($user, $committee) {
            if ($user->userType->name == 'Comissao') {
                //Perfil do usuário é de comissão
                return !$committee
                    ? false
                    : app(UsersCommitteesRepostory::class)->userHasCommittee(
                        $user->id,
                        $committee->id
                    );
            } else {
                //Perfil do usuário não é de comissão. Pode ser Operador, Administrador etc
                return true;
            }
        });
    }
}
