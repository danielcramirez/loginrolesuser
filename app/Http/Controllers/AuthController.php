<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        // Buscar por email o por nombre de usuario
        $user = \App\Models\User::where('email', $login)
            ->orWhere('name', $login)
            ->first();

        if ($user && \Hash::check($password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('error', 'Usuario o contraseña incorrectos');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
