<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository{
    protected User $user;


    public function __construct()
    {
        $user = new User();

        $this->user = $user;
    }

    public function checkEmail($email){
        return $this->user->where("email", $email)->first();
    }

    public function checkPassword(User $user, $password){
        return Hash::check($password, $user->password);
    }
}