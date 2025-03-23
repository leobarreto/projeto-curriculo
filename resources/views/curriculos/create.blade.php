@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <h2 class="text-center mb-4">{{ isset($curriculo) ? 'Editar' : 'Criar' }} Currículo</h2>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form
                    action="{{ isset($curriculo) ? route('curriculos.update', $curriculo->id) : route('curriculos.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($curriculo))
                        @method('PUT') <!-- Usando o método PUT para atualização -->
                    @endif

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control form-control-sm"
                            placeholder="Digite o Nome do Candidato" value="{{ old('nome', $curriculo->nome ?? '') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" name="email" id="email" class="form-control form-control-sm"
                            placeholder="Digite o e-mail do Candidato" value="{{ old('email', $curriculo->email ?? '') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control form-control-sm cpf-mask"
                            placeholder="Digite seu CPF" value="{{ old('cpf', $curriculo->cpf ?? '') }}" required>
                        <div id="cpf-error" class="alert alert-danger mt-2" style="display: none;">
                            Formato de CPF inválido!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="text" name="data_nascimento" id="data_nascimento"
                            class="form-control form-control-sm date-mask" placeholder="dd/mm/yyyy"
                            value="{{ old('data_nascimento', $curriculo->data_nascimento ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select name="sexo" id="sexo" class="form-select form-select-sm" required>
                            <option value="" disabled {{ old('sexo', $curriculo->sexo ?? '') ? '' : 'selected' }}>
                                Selecione</option>
                            <option value="Masculino"
                                {{ old('sexo', $curriculo->sexo ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino
                            </option>
                            <option value="Feminino"
                                {{ old('sexo', $curriculo->sexo ?? '') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                            <option value="Outro" {{ old('sexo', $curriculo->sexo ?? '') == 'Outro' ? 'selected' : '' }}>
                                Outro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="estado_civil" class="form-label">Estado Civil</label>
                        <input type="text" name="estado_civil" id="estado_civil" class="form-control form-control-sm"
                            placeholder="Digite seu estado civil"
                            value="{{ old('estado_civil', $curriculo->estado_civil ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="escolaridade" class="form-label">Escolaridade</label>
                        <input type="text" name="escolaridade" id="escolaridade" class="form-control form-control-sm"
                            placeholder="Digite sua escolaridade"
                            value="{{ old('escolaridade', $curriculo->escolaridade ?? '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="cursos_especializacoes" class="form-label">Cursos e Especializações</label>
                        <textarea name="cursos_especializacoes" id="cursos_especializacoes" class="form-control form-control-sm"
                            placeholder="Descreva sua experiência profissional" rows="4">{{ old('cursos_especializacoes', $curriculo->cursos_especializacoes ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="experiencia_profissional" class="form-label">Experiência Profissional</label>
                            <textarea name="experiencia_profissional" id="experiencia_profissional" class="form-control form-control-sm"
                                placeholder="Descreva sua experiência profissional" rows="4">{{ old('experiencia_profissional', $curriculo->experiencia_profissional ?? '') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pretensao_salarial" class="form-label">Pretensão Salarial</label>
                            <input type="number" name="pretensao_salarial" id="pretensao_salarial"
                                class="form-control form-control-sm" placeholder="Digite sua pretensão salarial"
                                value="{{ old('pretensao_salarial', $curriculo->pretensao_salarial ?? '') }}" required>
                        </div>
                        <button type="submit"
                            class="btn btn-success w-100">{{ isset($curriculo) ? 'Atualizar' : 'Salvar' }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
