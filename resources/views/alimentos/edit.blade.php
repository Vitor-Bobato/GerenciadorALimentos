@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0"><i class="fas fa-edit me-2"></i>Editar Alimento</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('alimentos.update', $alimento) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nome" class="form-label fw-bold">Nome do Alimento</label>
                            <input type="text" name="nome" id="nome" class="form-control form-control-lg" required
                                   value="{{ old('nome', $alimento->nome) }}">
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6 mb-4">
                                <label for="quantidade" class="form-label fw-bold">Quantidade</label>
                                <input type="number" name="quantidade" id="quantidade" 
                                       class="form-control form-control-lg" required
                                       value="{{ old('quantidade', $alimento->quantidade) }}">
                                @if($alimento->quantidade <= $quantidadeBaixa)
                                    <div class="text-danger small mt-1">
                                        <i class="fas fa-exclamation-triangle"></i> Estoque baixo!
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validade" class="form-label fw-bold">Data de Validade</label>
                                <input type="date" name="validade" id="validade" 
                                       class="form-control form-control-lg"
                                       value="{{ old('validade', $alimento->validade) }}">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="categoria_id" class="form-label fw-bold">Categoria</label>
                            <select name="categoria_id" id="categoria_id" class="form-select form-select-lg">
                                <option value="">Selecione uma categoria</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $alimento->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('alimentos.index') }}" class="btn btn-outline-secondary btn-lg me-md-2">
                                <i class="fas fa-arrow-left me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-1"></i> Atualizar Alimento
                            </button>
                        </div>
                    </form>

                    <div class="mt-5 pt-4 border-top">
                        <h5 class="text-danger mb-3">Zona Perigosa</h5>
                        <form action="{{ route('alimentos.destroy', $alimento) }}" method="POST" 
                              onsubmit="return confirm('Tem certeza que deseja remover permanentemente este alimento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-trash-alt me-1"></i> Excluir Permanentemente
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection