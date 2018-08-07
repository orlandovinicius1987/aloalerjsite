<?php
namespace App\Data\Repositories;

use App\Data\Models\UserType;
use App\Data\Models\User;
use App\Services\Authorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Users extends Base
{
    /**
     * @var string
     */
    protected $model = User::class;

    protected $tiposUsuarios;

    /**
     * @var Authorization
     */
    private $authorization;

    /**
     * Users constructor.
     *
     * @param Authorization $authorization
     */
    public function __construct(
        Authorization $authorization,
        TiposUsuarios $tiposUsuarios
    ) {
        $this->authorization = $authorization;

        $this->tiposUsuarios = $tiposUsuarios;
    }

    /**
     * @param $request
     *
     * @return mixed
     */
    private function credentials($request)
    {
        return $request->only(['username', 'password']);
    }

    /**
     * @param $email
     *
     * @return mixed
     */
    public function findUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findUserById($id)
    {
        return User::find($id);
    }

    /**
     * @param $username
     *
     * @return mixed
     */
    private function getUserType($username)
    {
        return // $this->authorization->getUserProfiles($username)->first()
        UserType::where('name', 'Usuario')->first();
    }

    private function getUserTypeFromPermissions($permissions)
    {
        $type = $this->isAdministrador($permissions)
            ? 'Administrador'
            : studly_case(
                $this->isType($permissions, 'Administrador')
                    ? 'administrador'
                    : 'usuario'
            );

        return app(TiposUsuarios::class)->findByName($type);
    }

    private function isAdministrador($permissions)
    {
        return ($this->isType($permissions, 'Administrador'));
    }

    /**
     * @param $permissions
     * @param $type
     *
     * @return bool
     */
    private function isType($permissions, $type)
    {
        return (
            $permissions
                ->filter(function ($user) use ($type) {
                    return starts_with($user['nomeFuncao'], $type);
                })
                ->count() > 0
        );
    }

    /**
     * @param $request
     * @param $remember
     *
     * @return bool
     */
    public function loginUser($request, $remember)
    {
        try {
            $credentials = extract_credentials($request);

            if (
                is_null(
                    $user = $this->findUserByEmail(
                        $email = "{$credentials['username']}@alerj.rj.gov.br"
                    )
                )
            ) {
                $user = new User();

                $user->name = $credentials['username'];

                $user->username = $credentials['username'];

                $user->email = $email;

                $user->password = Hash::make($email);

                $user->user_type_id = $this->getUserTypeFromPermissions(
                    app(Authorization::class)->getUserPermissions(
                        $user->username
                    )
                )->id;

                $user->save();
            }

            Auth::login($user, $remember);
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }

    /**
     * @param $type
     *
     * @return mixed
     */
    public function getByType($type)
    {
        $type = $this->tiposUsuarios->findByName($type);

        $model = $this->model;

        return $this->makeResultForSelect(
            $model::where('user_type_id', $type->id)->get(),
            'name'
        );
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $query = User::orderBy('name');

        if (!is_administrator()) {
            $administrator = $this->tiposUsuarios->findByName('Administrador');

            $query->where('user_type_id', '!=', $administrator->id);
        }

        return $query->get();
    }

    public function notifiables()
    {
        return User::where('all_notifications', true)->get();
    }

    public function updateCurrentUserTypeViaPermissions($permissions)
    {
        $user = Auth::user();

        $userType = $this->tiposUsuarios->findByName(
            $this->getUserTypeFromPermissions($permissions)
        );

        if ($userType) {
            $user->user_type_id = $userType->id;

            $user->save();
        }
    }

    /**
     * @param $permissions
     * @param $user
     */
    private function updateUserTypeFromPermissions($permissions, $user): void
    {
        $userType = $this->tiposUsuarios->findByName(
            $this->getUserTypeFromPermissions($permissions)
        );

        if ($userType) {
            $user->user_type_id = $userType->id;

            $user->save();
        }
    }
}
