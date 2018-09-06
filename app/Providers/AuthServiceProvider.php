<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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

        Gate::define('committee-restrict', function ($user, $committee_id) {
            //Se não foi passado o committee_id, assume-se que pode acessar qualquer comissão
            if ($user->userType->name != 'Comissao') {
                return true;
            }
            $result = $user->committees->find($committee_id);

            if (is_null($result)) {
                dd('retornei alguém');
                return false;
            } else {
                return true;
            }
        });
    }
}
