<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        if (Session::has('user')) {
            return $this->redirectByRole(Session::get('user.role'));
        }
        return view('auth.login'); // halaman ada di resources/views/auth/login.blade.php
    }

    /**
     * Menampilkan halaman register
     */
    public function showRegister()
    {
        if (Session::has('user')) {
            return $this->redirectByRole(Session::get('user.role'));
        }
        return view('auth.register'); // halaman ada di resources/views/auth/register.blade.php
    }

    /**
     * Proses register user baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:teacher,student'
        ]);

        DB::table('users')->insert([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Email atau password salah.']);
        }

        Session::put('user', [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'role'  => $user->role
        ]);

        return $this->redirectByRole($user->role);
    }

    /**
     * Logout user
     */
    public function logout()
    {
        Session::forget('user');
        Session::flush();
        return redirect('/login');
    }

    /**
     * Redirect sesuai role
     */
    private function redirectByRole($role)
    {
        if ($role === 'teacher') {
            return redirect('/dashboard-teacher');
        }
        return redirect('/dashboard-student');
    }
}
