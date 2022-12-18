<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function createUser(array $userDetails)
    {

        $user = User::firstOrCreate(['name' =>  $userDetails['name']]);
        setUserID($user->id);

       return  [
            "user" => $user,
            "success" => true
        ];

    }

    public function logout()
    {
        unsetUserID();
    }

}
