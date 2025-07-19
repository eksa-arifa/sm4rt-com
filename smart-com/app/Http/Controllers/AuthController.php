<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $userService;

    public function __construct()
    {
        $userRepository = new UserRepository();

        $this->userService = new UserService($userRepository);
    }

    public function login()
    {
        return view('pages.login');
    }

    public function actionLogin(AuthRequest $request)
    {
        $validatedrequest = $request->validated();
        
        
        $login = $this->userService->login([
            "email" => $validatedrequest["email"],
            "password" => $validatedrequest["password"]
        ]);

        if($login){
            $isRemember = $validatedrequest["remember_me"] ?? "";
            if($isRemember == "on"){
                Auth::login($login, true);
            }else{
                Auth::login($login);
            }

            return redirect()->route("dashboard");
        }else{
            return redirect()->back()->with("error", "Login gagal");
        }

    }

    public function actionLogout()
    {
        Auth::logout();

        return redirect()->route("login");
    }
}
