<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; // Adicionada a importação correta
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'login' => 'required|string|unique:users',
            'cpf' => 'required|string|size:14|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        Auth::login($user);

        // return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso!');
        return redirect()->route('curriculos.index')->with('success', 'Usuário cadastrado e autenticado com sucesso!');
    }

    public function login(Request $request) // Método de login
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('curriculos.index');
        }

        return back()->withErrors(['login' => 'Credenciais inválidas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
