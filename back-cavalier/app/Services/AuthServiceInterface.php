<?php

namespace App\Services;

interface AuthServiceInterface
{
    public function createUser(array $userData);

    public function blockUser($userId);
}
