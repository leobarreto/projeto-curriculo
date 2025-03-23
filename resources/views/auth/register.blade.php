@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Cadastro</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulário de cadastro -->
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" name="login" id="login" class="form-control" placeholder="Digite seu login" required>
            @error('login')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite seu CPF" required>
            <div id="cpf-error" class="text-danger" style="display: none;">CPF deve ter 11 dígitos!</div>
            @error('cpf')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirme a senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirme sua senha" required>
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success w-100">Registrar</button>
    </form>
</div>

<script>
    // Validação do CPF no frontend
    document.querySelector("form").addEventListener("submit", function(event) {
        let cpf = document.querySelector("input[name='cpf']").value;
        let cpfError = document.getElementById('cpf-error');

        if (cpf.length !== 11) {
            cpfError.style.display = 'block';  // Exibe a mensagem de erro
            event.preventDefault();  // Impede o envio do formulário
        } else {
            cpfError.style.display = 'none';  // Esconde a mensagem de erro
        }
    });
</script>
@endsection
