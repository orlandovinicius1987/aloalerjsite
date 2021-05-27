<?php

namespace Database\Factories;



/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Data\Repositories\UserTypes as UserTypesRepository;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'username' => $name,
            'email' => $name . '@alerj.rj.gov.br',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'user_type_id' => app(UserTypesRepository::class)->randomElement()
        ];
    }

}
//$factory->define(User::class, function (Faker $faker) {
//    $usersRepository = app(UsersRepository::class);
//
//    do {
//        $name = strtolower($faker->unique()->firstName);
//        $name = preg_replace('/([^a-zA-Z])/', '', $name);
//    } while (!is_null($usersRepository->findByColumn('email', $name . '@alerj.rj.gov.br')));
//
//    return [
//        'name' => $name,
//        'username' => $name,
//        'email' => $name . '@alerj.rj.gov.br',
//        'password' => bcrypt('secret'),
//        'remember_token' => str_random(10),
//        'user_type_id' => app(UserTypesRepository::class)->randomElement()
//    ];
//});
//
//foreach (app(UserTypesRepository::class)->all() as $userType) {
//    $factory->defineAs(User::class, $userType->name, function ($faker) use ($factory, $userType) {
//        $issue = $factory->raw(User::class);
//        $userTypesRepository = app(UserTypesRepository::class);
//        $userType = $userTypesRepository->findByColumn('name', $userType->name);
//
//        $issue['user_type_id'] = $userType->id;
//
//        return $issue;
//    });
//}
