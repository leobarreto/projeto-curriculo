@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Lista de Currículos</h2>
        <a href="{{ route('curriculos.create') }}" class="btn btn-primary">Cadastrar Currículo</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Pretensão Salarial</th>
                <th>Ações</th> <!-- Coluna para as ações de editar e excluir -->
            </tr>
        </thead>
        <tbody>
            @foreach ($curriculos as $curriculo)
                <tr style="background-color: {{ $curriculo->pretensao_salarial < $media_salarial ? 'green' : 'blue' }}">
                    <td>{{ $curriculo->user->name }}</td>
                    <td>{{ $curriculo->cpf }}</td>
                    <td>{{ number_format($curriculo->pretensao_salarial, 2, ',', '.') }}</td>
                    <td>
                        <!-- Link para editar o currículo -->
                        <a href="{{ route('curriculos.create', $curriculo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <!-- Formulário para excluir o currículo -->
                        {{-- <form action="{{ route('curriculos.destroy', $curriculo->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja excluir este currículo?')">Excluir</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Média Salarial: {{ number_format($media_salarial, 2, ',', '.') }}</p>
@endsection
