@extends('layouts.app')

@section('title', 'Detalhes do Alimento')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="mb-0"><i class="fas fa-info-circle me-2"></i>Detalhes do Alimento</h2>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i> Ações
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('alimentos.edit', $alimento) }}"><i class="fas fa-edit me-2"></i>Editar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('alimentos.destroy', $alimento) }}" method="POST" id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Tem certeza que deseja remover este alimento?')">
                                            <i class="fas fa-trash-alt me-2"></i>Remover
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="text-primary mb-4">{{ $alimento->nome }}</h3>
                            
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 px-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                            <i class="fas fa-boxes text-primary fa-lg"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-1 text-muted">Quantidade em Estoque</h5>
                                            <p class="mb-0 fs-4 fw-bold {{ $alimento->quantidade <= $quantidadeBaixa ? 'text-danger' : '' }}">
                                                {{ $alimento->quantidade }}
                                                @if($alimento->quantidade <= $quantidadeBaixa)
                                                    <span class="badge bg-danger ms-2">
                                                        <i class="fas fa-exclamation-triangle me-1"></i> Estoque baixo
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="list-group-item border-0 px-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                            <i class="fas fa-tags text-primary fa-lg"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-1 text-muted">Categoria</h5>
                                            <p class="mb-0 fs-4">
                                                @if($alimento->categoria)
                                                    <span class="badge bg-primary py-2 px-3">{{ $alimento->categoria->nome }}</span>
                                                @else
                                                    <span class="text-muted">Não categorizado</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                @if($alimento->validade)
                                <div class="list-group-item border-0 px-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                            <i class="fas fa-calendar-alt text-primary fa-lg"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-1 text-muted">Data de Validade</h5>
                                            @php
                                                $validade = \Carbon\Carbon::parse($alimento->validade);
                                                $diff = $validade->diffInDays(\Carbon\Carbon::now(), false);
                                            @endphp
                                            <p class="mb-0 fs-4 fw-bold {{ $diff <= 7 ? 'text-danger' : '' }}">
                                                {{ $validade->format('d/m/Y') }}
                                                @if($diff < 0)
                                                    <span class="badge bg-dark ms-2">
                                                        <i class="fas fa-exclamation-triangle me-1"></i> Vencido há {{ abs($diff) }} dias
                                                    </span>
                                                @elseif($diff <= 7)
                                                    <span class="badge bg-danger ms-2">
                                                        <i class="fas fa-exclamation-triangle me-1"></i> Vence em {{ $diff }} dias
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-primary mb-4">Ações Rápidas</h5>
                                    <div class="d-grid gap-3">
                                        <a href="{{ route('alimentos.edit', $alimento) }}" class="btn btn-primary btn-lg">
                                            <i class="fas fa-edit me-2"></i> Editar Alimento
                                        </a>
                                        <form action="{{ route('alimentos.destroy', $alimento) }}" method="POST" class="d-grid">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-lg" 
                                                    onclick="return confirm('Tem certeza que deseja remover este alimento?')">
                                                <i class="fas fa-trash-alt me-2"></i> Remover Alimento
                                            </button>
                                        </form>
                                        <a href="{{ route('alimentos.index') }}" class="btn btn-outline-secondary btn-lg">
                                            <i class="fas fa-arrow-left me-2"></i> Voltar para Lista
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection