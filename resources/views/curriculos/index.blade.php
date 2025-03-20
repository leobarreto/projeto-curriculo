@extends('layouts.app')

@section('content')
<h2>Lista de Currículos</h2> | <a href="{{ route('curriculos.create') }}">Cadastrar Currículo</a>
<table>
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Pretensão Salarial</th>
    </tr>
    @foreach ($curriculos as $curriculo)
        <tr style="background-color: {{ $curriculo->pretensao_salarial < $media_salarial ? 'green' : 'blue' }}">
            <td>{{ $curriculo->user->name }}</td>
            <td>{{ $curriculo->cpf }}</td>
            <td>{{ number_format($curriculo->pretensao_salarial, 2, ',', '.') }}</td>
        </tr>
    @endforeach
</table>
<p>Média Salarial: {{ number_format($media_salarial, 2, ',', '.') }}</p>
@endsection
