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

        Gate::define('committee-canEdit', function ($user, $committee_id) {
            if ($user->userType->name == 'Comissao') {
                return !$committee_id
                    ? false
                    : app(UsersCommitteesRepostory::class)->userHasCommittee(
                        $user->id,
                        $committee_id
                    );
            } else {
                return true;
            }
        });
    }
}
