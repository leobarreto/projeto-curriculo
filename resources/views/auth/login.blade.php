@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Coluna para o Formulário de Login -->
            <div class="col-md-5">
                <h2 class="mb-4 text-center">Login</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" name="login" id="login" class="form-control"
                            placeholder="Digite seu login" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Digite sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>

            <!-- Coluna para o Formulário de Cadastro -->
            <div class="col-md-5">
                <h2 class="mb-4 text-center">Criar Conta</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Digite seu nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" name="login" id="login" class="form-control"
                            placeholder="Digite seu login" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control cpf-mask"
                            placeholder="Digite seu CPF" required>
                        <div id="cpf-error" class="alert alert-danger mt-2" style="display: none;">
                            Formato de CPF inválido!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Digite sua senha" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirme sua senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="Confirme sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
