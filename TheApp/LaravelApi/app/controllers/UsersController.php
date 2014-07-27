<?php

use Todo\Models\Controllers\BaseApiController;

/**
 * Class UsersController
 */
class UsersController extends BaseApiController {

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DummyUsers::makeUsers(mt_rand(2, 20));

        return $this->respondOk($users->toArray());
    }

}

/**
 * Class DummyUsers
 * @TEMP
 * @TODO Extract out to a factory type service...
 */
class DummyUsers {

    /**
     * @param $num
     * @return array|\Illuminate\Support\Collection
     */
    static function makeUsers($num)
    {
        $faker = Faker\Factory::create();

        while ($num-- > 0)
        {
            // @todo - Implement some type of Model/Data abstraction (i.e. repositories)
            $users[] = new \Todo\Models\User([
                'id'         => mt_rand(1, 100000),
                'email'      => $faker->email,
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName
            ]);
        }
        $users = \Illuminate\Support\Collection::make($users);
        return $users;
    }
}