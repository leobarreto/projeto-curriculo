@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Coluna para o Formulário de Login -->
            <div class="col-md-5">
                <h2 class="mb-4 text-center">Login</h2>
                <!-- Erros do Login -->
                @if ($errors->login->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->login->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Formulário de Login -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" name="login" id="login"
                            class="form-control @error('login') is-invalid @enderror" placeholder="Digite seu login"
                            value="{{ old('login') }}" required>
                        @error('login')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Digite sua senha"
                            required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>

            <!-- Coluna para o Formulário de Cadastro -->
            <div class="col-md-5">
                <h2 class="mb-4 text-center">Criar Conta</h2>
                <!-- Erros do Cadastro -->
                @if ($errors->register->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->register->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulário de Cadastro -->
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Digite seu nome"
                            value="{{ old('name', session()->get('errors')?->register?->get('name') ? old('name') : '') }}"
                            required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Digite seu e-mail"
                            value="{{ old('email', session()->get('errors')?->register?->get('email') ? old('email') : '') }}"
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" name="login" id="login"
                            class="form-control @error('login') is-invalid @enderror" placeholder="Digite seu login"
                            value="{{ session()->has('errors') && $errors->register->has('login') ? old('login') : '' }}"
                            required>
                        @error('login')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" name="cpf" id="cpf"
                            class="form-control cpf-mask @error('cpf') is-invalid @enderror" placeholder="Digite seu CPF"
                            value="{{ old('cpf', session()->get('errors')?->register?->get('cpf') ? old('cpf') : '') }}"
                            required>
                        <div id="cpf-error" class="alert alert-danger mt-2" style="display: none;">
                            Formato de CPF inválido!
                        </div>
                        @error('cpf')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Digite sua senha"
                            required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
