@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary"><i class="fas fa-utensils me-2"></i>Gestão de Alimentos</h1>
        <div>
            <a href="{{ route('alimentos.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus me-1"></i> Novo Alimento
            </a>
            <a href="{{ route('alimentos.validadeProxima') }}" class="btn btn-warning btn-lg ms-2">
                <i class="fas fa-calendar-exclamation me-1"></i> Validade Próxima
            </a>
        </div>
    </div>

    @if(session('sucesso'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('sucesso') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3">Nome</th>
                            <th class="py-3">Quantidade</th>
                            <th class="py-3">Categoria</th>
                            <th class="py-3">Validade</th>
                            <th class="py-3 text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alimentos as $alimento)
                            <tr class="{{ $alimento->quantidade <= $quantidadeBaixa ? 'table-warning' : '' }}">
                                <td class="align-middle fw-bold">{{ $alimento->nome }}</td>
                                <td class="align-middle">
                                    <span class="d-flex align-items-center">
                                        {{ $alimento->quantidade }}
                                        @if($alimento->quantidade <= $quantidadeBaixa)
                                            <span class="badge bg-danger ms-2">
                                                <i class="fas fa-exclamation-triangle me-1"></i> Baixo
                                            </span>
                                        @endif
                                    </span>
                                </td>
                                <td class="align-middle">
                                    @if($alimento->categoria)
                                        <span class="badge bg-primary">{{ $alimento->categoria->nome }}</span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if($alimento->validade)
                                        @php
                                            $validade = \Carbon\Carbon::parse($alimento->validade);
                                            $diff = (int)$validade->diffInDays(\Carbon\Carbon::now(), false);
                                        @endphp
                                        <span class="{{ $diff <= 7 ? 'text-danger fw-bold' : '' }}">
                                            {{ $validade->format('d/m/Y') }}
                                            @if($diff < 0)
                                                <span class="badge bg-dark ms-1">Vencido há {{ abs($diff) }} dias</span>
                                            @elseif($diff <= 7)
                                                <span class="badge bg-danger ms-1">Vence em {{ $diff }} dias</span>
                                            @endif
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="align-middle text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('alimentos.edit', $alimento) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('alimentos.destroy', $alimento) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('Tem certeza que deseja remover este alimento?')">
                                                <i class="fas fa-trash-alt"></i> Remover
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="fas fa-box-open fa-2x mb-3"></i>
                                    <h5>Nenhum alimento cadastrado</h5>
                                    <p class="mb-0">Clique no botão "Novo Alimento" para adicionar</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection