<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Halaman Login
    public function login()
    {
        return view('login');
    }

    // 2. Proses Login
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        }

        return back()->with('error', 'Email / password salah');
    }

    // 3. Halaman Register
    public function registration()
    {
        return view('registration');
    }

    // 4. Proses Register
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Registrasi berhasil');
    }

    // 5. Halaman Home
    public function home()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return view('home', [
            'user' => Auth::user()
        ]);
    }

    // 6. Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}