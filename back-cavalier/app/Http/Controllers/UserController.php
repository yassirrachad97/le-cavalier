<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('role')->paginate(8);

        return view('backOffice.users', compact('users'));
    }
    //

    public function blockUser($id){
        $user= User::find($id);
        $user->is_blocked = !$user->is_blocked;
        $user->save();
        return redirect()->back();
    }
    public function changeRole(Request $request)
    {
        $user = User::findOrFail($request->user);
        $user->update(['role_id' => $request->role]);
        return redirect()->back()->with('success', 'Événement approuvé avec succès.');
    }


}
