<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function RegisterPage() {
        return view('auth.RegisterPage');
    }
    public function RegisterStore(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|max:4',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        User::create($data);
        return redirect()->route('login');
    }
    public function LoginPage() {
        return view('auth.LoginPage');
    }
    public function LoginStore(Request $request) {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);
        return redirect()->route('index');
    }

    public function Logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function Profile(user $user) {
        return view('auth.Profile', compact('user'));
    }

}
