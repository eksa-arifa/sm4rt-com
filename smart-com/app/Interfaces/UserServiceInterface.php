<?php

namespace App\Interfaces;


interface UserServiceInterface
{
    public function login(array $userData, $remember);
}
