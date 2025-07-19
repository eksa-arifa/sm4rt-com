<?php

namespace App\Services;

use App\Interfaces\UserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login(array $userData, $remember)
    {
        if(Auth::attempt($userData, $remember)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with("error", "Login gagal");
        }
    }

}