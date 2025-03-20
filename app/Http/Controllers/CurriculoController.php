<?php

namespace App\Http\Controllers;

use App\Models\Curriculo;
use App\Http\Requests\CurriculoRequest;
use Illuminate\Support\Facades\Auth;

class CurriculoController extends Controller
{
    public function create()
    {
        return view('curriculos.create');
    }

    public function store(CurriculoRequest $request)
    {
        $data = $request->validated();
        $data['data_nascimento'] = \Carbon\Carbon::createFromFormat('d/m/Y', $data['data_nascimento'])->format('Y-m-d');
        $data['user_id'] = Auth::id();

        Curriculo::create($data);

        return redirect()->route('curriculos.index')->with('success', 'Currículo cadastrado com sucesso!');
    }

    public function index()
    {
        $curriculos = Curriculo::all();
        $media_salarial = Curriculo::avg('pretensao_salarial');

        return view('curriculos.index', compact('curriculos', 'media_salarial'));
    }
}
