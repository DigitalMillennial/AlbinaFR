<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))  ) {
            return back()->withErrors([
                'email' => 'Неверный логин или пароль',
            ]);
        }
 
     return redirect()->route('dashboard');

    }
}
