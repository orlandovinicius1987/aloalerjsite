<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Data\Repositories\Committees as CommitteesRepostory;
use App\Data\Repositories\UsersCommittees as UsersCommitteesRepostory;
use App\Data\Repositories\UserTypes as UserTypesRepostory;

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
                $userCommitteesRepository = app(
                    UsersCommitteesRepostory::class
                );

                return $userCommitteesRepository->userHasCommittee(
                    $user->id,
                    $committee_id
                );
            } else {
                return true;
            }
        });
    }
}
