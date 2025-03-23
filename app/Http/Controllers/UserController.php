<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; // Adicionada a importação correta
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Adicionada a importação correta
use Illuminate\Validation\ValidationException; // Adicionada a importação correta

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // Validação manual com grupo de erros
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'login' => 'required|string|unique:users',
            'cpf' => 'required|cpf|size:14|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail informado é inválido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'login.required' => 'O campo login é obrigatório.',
            'login.unique' => 'Este login já está em uso.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.cpf' => 'O CPF informado é inválido.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.', // <---- Tradução aqui
            'password.confirmed' => 'As senhas não coincidem.',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray())
                ->errorBag('register');
        }

        // Se a validação passar, cria o usuário
        $data = $validator->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);

        return redirect()->route('curriculos.index')->with('success', 'Usuário cadastrado e autenticado com sucesso!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('curriculos.index');
        }

        // Mantém apenas o login do formulário de login e limpa outros campos
        return back()
            ->withInput($request->only('login'))
            ->withErrors(['login' => 'Credenciais inválidas'], 'login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
