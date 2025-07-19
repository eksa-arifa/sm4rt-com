<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Interfaces\UserServiceInterface;
use App\Models\User;
use App\Services\UserService;

class AuthController extends Controller
{

    protected $userService;

    public function __construct()
    {
        $user = new User();

        $this->userService = new UserService($user);
    }

    public function login()
    {
        return view('pages.login');
    }

    public function actionLogin(AuthRequest $request)
    {
        $validatedrequest = $request->validated();
        
        
        $this->userService->login([
            $validatedrequest->email,
            $validatedrequest->password
        ], $validatedrequest->remember_me);

    }
}
