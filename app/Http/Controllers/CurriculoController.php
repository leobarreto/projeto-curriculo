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

    public function edit(Curriculo $curriculo)
    {
        return view('curriculos.create', [
            'curriculo' => $curriculo
        ]);
    }

    public function store(CurriculoRequest $request)
    {
        $data = $request->validated();
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

    public function update(CurriculoRequest $request, Curriculo $curriculo)
    {
        $curriculo->update($request->validated()); // O mutator cuidará da conversão
        return redirect()->route('curriculos.index')->with('success', 'Currículo atualizado!');
    }

    // CurriculoController.php
    public function destroy(Curriculo $curriculo)
    {
        $curriculo->delete();
        return redirect()->route('curriculos.index')
            ->with('success', 'Currículo excluído com sucesso!');
    }
}
