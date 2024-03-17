<?php

namespace App\Http\Controllers;

use App\Services\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $Authservice;

    public function __construct(AuthServiceInterface $Authservice)
    {
        $this->Authservice = $Authservice;
    }

    public function connexion()
    {
        return view('auth.login');
    }

    public function signup(Request $request)
    {
        $validated = $request->validate([
            'first-name' => 'required|string|min:2|max:12',
            'last-name' => 'required|string|min:2|max:12',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits:10|unique:users,phone',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $this->Authservice->createUser($validated);

        Session::flash('success', 'Account created successfully!');
        return redirect()->route('auth.connexion');
    }

    public function signin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            $user = Auth::user();

            if ($user->is_blocked) {
                Auth::logout();
                Session::flash('error', 'Votre compte est bloqué.');
                return redirect('/login');
            }

            request()->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->route('auth.connexion')->withErrors([
            'email' => 'No matching user found with provided email and password.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.connexion');
    }

    public function blockUser($userId)
    {

        $this->Authservice->blockUser($userId);

        return redirect()->back();
    }
}
