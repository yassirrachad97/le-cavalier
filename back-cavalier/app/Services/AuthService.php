<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
   public function createUser(array $userData)
    {
        User::create([
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'password' => Hash::make($userData['password']),
            'role_id' => 2,
        ]);
    }

    public function blockUser($userId)
    {
        $user = User::find($userId);
        $user->is_blocked = !$user->is_blocked;
        $user->save();
    }
}
