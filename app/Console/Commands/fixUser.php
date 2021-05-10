<?php

namespace App\Console\Commands;

use App\Data\Repositories\Users as UsersRepository;
use Illuminate\Console\Command;
use App\Data\Models\Audit as AuditModel;
use App\Data\Models\Committee as CommitteeModel;
use App\Data\Models\User as UserModel;
use App\Data\Models\Progress as ProgressModel;
use Carbon\Carbon;
use App\Services\Authorization;

class fixuser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aloalerj:fix-user {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix the user_type and committes of the user ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //        dd();
        $user_id = $this->argument('user_id');
        $user = UserModel::where('id', $user_id)->first();

        if ($user) {
            dump('Updating user ' . $user->username);

            $permissions = app(Authorization::class)->getRemoteUserPermissions($user->username);

            app(UsersRepository::class)->updateCurrentUserTypeViaPermissions($permissions, $user);
            dump('User ' . $user->username . ' updated');
        } else {
            dump('Informe um id válido');
        }
    }
}
