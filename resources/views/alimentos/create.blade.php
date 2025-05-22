@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Adicionar Novo Alimento</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('alimentos.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nome" class="form-label fw-bold">Nome do Alimento</label>
                            <input type="text" name="nome" id="nome" class="form-control form-control-lg" required
                                   placeholder="Digite o nome do alimento">
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-md-6 mb-4">
                                <label for="quantidade" class="form-label fw-bold">Quantidade</label>
                                <input type="number" name="quantidade" id="quantidade" 
                                       class="form-control form-control-lg" required
                                       placeholder="Quantidade em estoque">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validade" class="form-label fw-bold">Data de Validade</label>
                                <input type="date" name="validade" id="validade" 
                                       class="form-control form-control-lg">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="categoria_id" class="form-label fw-bold">Categoria</label>
                            <select name="categoria_id" id="categoria_id" class="form-select form-select-lg">
                                <option value="">Selecione uma categoria</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('alimentos.index') }}" class="btn btn-outline-secondary btn-lg me-md-2">
                                <i class="fas fa-arrow-left me-1"></i> Voltar
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-1"></i> Salvar Alimento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection