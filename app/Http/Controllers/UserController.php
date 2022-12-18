<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function setUser(CreateUserRequest $request)
    {
        $response = $this->userRepository->createUser($request->only(['name']));

        return response()->json($response);
    }

    function logout(){

        $this->userRepository->logout();

        return redirect('/');
    }
}
