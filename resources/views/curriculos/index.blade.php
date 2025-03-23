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
                <tr style="background-color: {{ $curriculo->pretensao_salarial < $media_salarial ? 'green' : 'white' }}">
                    <td>{{ $curriculo->nome }}</td>
                    <td>{{ $curriculo->email }}</td>
                    <td>{{ $curriculo->cpf }}</td>
                    <td>{{ number_format($curriculo->pretensao_salarial, 2, ',', '.') }}</td>
                    <td>
                        <!-- Link para editar o currículo -->
                        <a href="{{ route('curriculos.edit', $curriculo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal" data-id="{{ $curriculo->id }}">
                            Excluir
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Média Salarial: {{ number_format($media_salarial, 2, ',', '.') }}</p>

    <!-- Modal de Confirmação -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Você deseja excluir este currículo?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteModal = document.getElementById('confirmDeleteModal');

                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget; // Botão que acionou o modal
                    const id = button.getAttribute('data-id');
                    const form = document.getElementById('deleteForm');
                    form.action = `/curriculos/${id}`;
                });
            });
        </script>
    @endpush
@endsection
