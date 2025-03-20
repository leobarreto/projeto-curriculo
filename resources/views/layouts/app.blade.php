<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Sistema de Cadastro de Currículos')</title>
    </head>
    <body>
        <header>
            <h1>Sistema de Cadastro de Currículos</h1>
            @auth
                <p>Bem-vindo, {{ auth()->user()->name }} | <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
        </header>

        <main>
            @yield('content')
        </main>
    </body>
</html>
