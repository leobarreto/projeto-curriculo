@extends('layouts.app')

@section('content')
    <h2>Login</h2>

    <!-- Formulário de login -->
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>

    <hr>

    <h2>Criar Conta</h2>

    <!-- Formulário de cadastro -->
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="text" name="login" placeholder="Login" required>
        <input type="text" name="cpf" placeholder="CPF" required>
        <input type="password" name="password" placeholder="Senha" required>
        <input type="password" name="password_confirmation" placeholder="Confirme a senha" required>
        <button type="submit">Cadastrar</button>
    </form>
@endsection
