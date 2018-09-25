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

        try {
            $committeesRepository = app(CommitteesRepostory::class);
            $committees = $committeesRepository->all();

            foreach ($committees as $committee) {
                Gate::define('committee-' . $committee->slug, function (
                    $user
                ) use ($committee) {
                    $usersCommitteesRepository = app(
                        UsersCommitteesRepostory::class
                    );

                    $userTypesRepostory = app(UserTypesRepostory::class);
                    $userTypesArray = $userTypesRepostory->toArrayWithColumnKey(
                        $userTypesRepostory->all(),
                        'name'
                    );

                    if (
                        $userTypesArray['Comissao']->id == $user->userType->id
                    ) {
                        //Se é usuário de comissão, verifica as comissões que tem acesso
                        return $usersCommitteesRepository->userHasCommittee(
                            $user->id,
                            $committee->id
                        );
                    } else {
                        //Se é qualquer outro tipo de usuário, aceita
                        return true;
                    }
                });
            }
        } catch (\PDOException $e) {
            //Database doesn't exist. Do nothing.
        }
    }
}
