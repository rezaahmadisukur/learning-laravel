<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(): View
    {
        return view("pages.auth.login");
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $userStatus = Auth::user()->status;

            if ($userStatus == "submitted") {
                return back()->withErrors([
                    "email" => "Akun anda masih menunggu persetujuan admin"
                ]);
            } elseif ($userStatus == "rejected") {
                return back()->withErrors([
                    "email" => "Akun anda telah ditolak admin"
                ]);
            }

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Terjadi kesalahan, periksa kembali email atau password anda.',
        ])->onlyInput('email');
    }

    public function registerView(): View
    {
        return view("pages.auth.register");
    }

    /**
     * Summary of register
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = 2; // User (Penduduk)
        $user->saveOrFail();

        return redirect('/')->with('success', 'Berhasil mendaftarkan akun, menunggu persetujuan admin');
    }

    /**
     * Summary of logout
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
