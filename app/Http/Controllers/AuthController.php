<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('admin.login'); // sesuai login.blade kamu
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // cari user di DB
        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // simpan id user di session
            $request->session()->put('id', $user->id);
            $request->session()->put('username', $user->username);

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah!',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->forget(['user_id', 'username']);
        return redirect()->route('admin.login');
    }
}
