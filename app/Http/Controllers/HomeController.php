<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Exibe a página inicial.
     * Se o usuário estiver autenticado, redireciona para a página de currículos.
     */
    public function index()
    {
        return Auth::check() ? redirect()->route('curriculos.index') : redirect()->route('login');
    }
}
