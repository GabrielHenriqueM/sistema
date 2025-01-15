<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('logar.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('dashboard')->with('success', 'Bem-vindo, Admin!');
            }

            if (Auth::user()->hasRole('funcionario')) {
                return redirect()->route('dashboard')->with('success', 'Bem-vindo, Funcionário!');
            }

            if (Auth::user()->hasRole('estagiario')) {
                return redirect()->route('dashboard')->with('success', 'Bem-vindo, Estagiário!');
            }

            return redirect()->route('dashboard')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'name' => 'Usuário ou senha inválidos.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout realizado com sucesso!');
    }
}
