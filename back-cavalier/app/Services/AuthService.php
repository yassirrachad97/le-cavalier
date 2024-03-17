<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface

{
    public function createUser( $request)
    {
        User::create([
            "first-name" => $request['first-name'],
            "last-name" => $request['last-name'],
            "email" => $request["email"],
            "phone" => $request["phone"],
            "password" => Hash::make($request['password'])
        ]);
    }

    public function blockUser($userId)
    {
        $user = User::find($userId);
        $user->is_blocked = !$user->is_blocked;
        $user->save();
    }
}
