    @extends('layouts.app')

    @section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-warning">
                    <i class="fas fa-calendar-exclamation me-2"></i>
                    Alimentos com Validade Próxima
                </h1>
                <p class="mb-0 text-muted">Vencimento nos próximos {{ $dias }} dias</p>
            </div>
            <a href="{{ route('alimentos.index') }}" class="btn btn-outline-secondary btn-lg">
                <i class="fas fa-arrow-left me-1"></i> Voltar
            </a>
        </div>

        @if(count($alimentos) > 0)
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Atenção!</strong> Existem {{ count($alimentos) }} alimentos com validade próxima.
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                @if(count($alimentos) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-warning">
                                <tr>
                                    <th class="py-3">Nome</th>
                                    <th class="py-3">Status</th>
                                    <th class="py-3">Data de Validade</th>
                                    <th class="py-3">Quantidade</th>
                                    <th class="py-3">Categoria</th>
                                    <th class="py-3 text-end">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alimentos as $alimento)
                                    @php
                                        $validade = \Carbon\Carbon::parse($alimento->validade);
                                        $diff = $validade->diffInDays(\Carbon\Carbon::now(), false);
                                    @endphp
                                    <tr class="{{ $diff <= 3 ? ($diff < 0 ? 'table-dark' : 'table-danger') : '' }}">
                                        <td class="align-middle fw-bold">{{ $alimento->nome }}</td>
                                        <td class="align-middle">
                                            <span class="badge bg-{{ $diff < 0 ? 'dark' : ($diff <= 3 ? 'danger' : 'warning') }}">
                                                @if($diff < 0)
                                                    Vencido há {{ abs($diff) }} dias
                                                @else
                                                    Vence em {{ $diff }} dias
                                                @endif
                                            </span>
                                        </td>
                                        <td class="align-middle">{{ $validade->format('d/m/Y') }}</td>
                                        <td class="align-middle">{{ $alimento->quantidade }}</td>
                                        <td class="align-middle">
                                            @if($alimento->categoria)
                                                <span class="badge bg-primary">{{ $alimento->categoria->nome }}</span>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-calendar-check fa-4x text-success mb-4"></i>
                        <h3 class="fw-bold text-success">Nenhum alimento com validade próxima</h3>
                        <p class="text-muted">Não há alimentos com vencimento nos próximos {{ $dias }} dias.</p>
                        <a href="{{ route('alimentos.index') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-arrow-left me-1"></i> Voltar para Lista Completa
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endsection