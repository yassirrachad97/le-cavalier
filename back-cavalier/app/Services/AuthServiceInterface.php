<?php

namespace App\Services;

interface AuthServiceInterface
{
    public function createUser($request);

    public function blockUser($userId);
}
