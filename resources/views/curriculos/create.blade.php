@extends('layouts.app')

@section('content')
<h2>{{ isset($curriculo) ? 'Editar' : 'Criar' }} Currículo</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ isset($curriculo) ? route('curriculos.update', $curriculo->id) : route('curriculos.store') }}" method="POST">
    @csrf
    @if(isset($curriculo))
        @method('PUT')  <!-- Usando o método PUT para atualização -->
    @endif

    <input type="text" name="cpf" placeholder="CPF" value="{{ old('cpf', $curriculo->cpf ?? '') }}" required>
    <input type="text" name="data_nascimento" placeholder="Data de Nascimento (dd/mm/yyyy)" value="{{ old('data_nascimento', $curriculo->data_nascimento ?? '') }}" required>
    <select name="sexo" required>
        <option>Selecione</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
        <option value="Outro">Outro</option>
    </select>
    <input type="text" name="estado_civil" placeholder="Estado Civil" value="{{ old('estado_civil', $curriculo->estado_civil ?? '') }}" required>
    <input type="text" name="escolaridade" placeholder="Escolaridade" value="{{ old('escolaridade', $curriculo->escolaridade ?? '') }}" required>
    <textarea name="experiencia_profissional" placeholder="Experiência Profissional">{{ old('experiencia_profissional', $curriculo->experiencia_profissional ?? '') }}</textarea>
    <input type="number" name="pretensao_salarial" placeholder="Pretensão Salarial" value="{{ old('pretensao_salarial', $curriculo->pretensao_salarial ?? '') }}" required>

    <button type="submit">{{ isset($curriculo) ? 'Atualizar' : 'Salvar' }}</button>
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
