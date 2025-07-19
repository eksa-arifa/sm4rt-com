<?php

namespace App\Services;

use App\Interfaces\UserServiceInterface;
use App\Repositories\UserRepository;

class UserService implements UserServiceInterface{

    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(array $userData)
    {

        $checkEmail = $this->userRepository->checkEmail($userData["email"]);
        if($checkEmail){
            if($this->userRepository->checkPassword($checkEmail, $userData["password"])){
                return $checkEmail;
            }
        }else{
            return false;
        }
    }

}