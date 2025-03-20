@extends('layouts.app')

@section('content')
<h2>Cadastro</h2>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<form action="{{ route('register') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nome" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="text" name="login" placeholder="Login" required>
    <input type="text" name="cpf" placeholder="CPF" required>
    <input type="password" name="password" placeholder="Senha" required>
    <input type="password" name="password_confirmation" placeholder="Confirme a senha" required>
    <button type="submit">Registrar</button>
</form>

<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        let cpf = document.querySelector("input[name='cpf']").value;
        if (cpf.length !== 11) {
            alert("CPF deve ter 11 dígitos!");
            event.preventDefault();
        }
    });
</script>

@endsection
