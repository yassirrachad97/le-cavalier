<?php

namespace App\Http\Controllers;

use App\Services\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $AuthService;

    public function __construct(AuthServiceInterface $AuthService)
    {
        $this->AuthService = $AuthService;

    }

    public function connexion()
    {
        return view('auth.login');

    }


    public function signup()
    {
        $validated = request()->validate([
            'first_name' => 'required|string|min:2|max:12',
            'last_name' => 'required|string|min:2|max:12',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required',
        ]);



        $this->AuthService->createUser($validated);


        Session::flash('success', 'Account created successfully!');
        return redirect()->route('auth.login');
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
                return redirect()->route('auth.login');
            }

            request()->session()->regenerate();
            return redirect()->route('frentOffice.home')->with('user', $user);
        }

        return redirect()->route('auth.login')->withErrors([
            'email' => 'No matching user found with provided email and password.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('frentOffice.home')->withSuccess('Logged out successfully.');
    }
    public function EditeProfil(Request $request)
    {
        
         $user = Auth::user();
        return view('backOffice.Profile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();




        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->email = $request->input("email");
        $user->phone = $request->input("phone");

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input("password"));
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profil', 'public');
            $user->image = $imagePath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
