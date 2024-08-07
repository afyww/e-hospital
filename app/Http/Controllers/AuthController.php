<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    function login()
    {
        return view('login');
    }

    function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->level === 'admin' || $user->level === 'dokter') {
                return redirect(route('dashboard'))->with('toast_success', 'Berhasil Login !');
            } elseif ($user->level === 'pasien') {
                return redirect(route('dashboard-pasien'))->with('toast_success', 'Berhasil Login !');
            }
        }
        return back()->with('error', 'Password atau Email Salah !');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'keahlian' => 'required|string|max:255',
            'level' => 'required|string|in:admin,pasien,dokter',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->alamat = $validatedData['alamat'];
        $user->nik = $validatedData['nik'];
        $user->keahlian = $validatedData['keahlian'];
        $user->level = $validatedData['level'];
        $user->save();

        return redirect('/user')->with('success', 'User Berhasil Dibuat !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('toast_success', 'Berhasil Logout !');
    }
}
