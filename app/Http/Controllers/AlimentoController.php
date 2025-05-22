<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alimento;
use Carbon\Carbon;

class AlimentoController extends Controller
{
public function index()
{
$alimentos = Alimento::all();
    $quantidadeBaixa = 5; // Defina o limite para estoque baixo
    return view('alimentos.index', compact('alimentos', 'quantidadeBaixa'));
}

public function create()
{
    $categorias = \App\Models\Categoria::all();
    return view('alimentos.create', compact('categorias'));
}

public function store(Request $request)
{
$request->validate([
    'nome' => 'required',
    'quantidade' => 'required|integer',
    'validade' => 'nullable|date',
    'categoria_id' => 'nullable|exists:categorias,id',
]);

Alimento::create($request->all());

return redirect()->route('alimentos.index')->with('sucesso', 'Alimento adicionado!');
}

public function edit(Alimento $alimento)
{
    $categorias = \App\Models\Categoria::all();
    return view('alimentos.edit', compact('alimento', 'categorias'));
}

public function update(Request $request, Alimento $alimento)
{
$request->validate([
    'nome' => 'required',
    'quantidade' => 'required|integer',
    'validade' => 'nullable|date',
    'categoria_id' => 'nullable|exists:categorias,id',
]);

$alimento->update($request->all());

return redirect()->route('alimentos.index')->with('sucesso', 'Alimento atualizado!');
}

public function destroy(Alimento $alimento)
{
$alimento->delete();

return redirect()->route('alimentos.index')->with('sucesso', 'Alimento removido!');
}
public function validadeProxima()
{
    $dias = 7; // Você pode alterar para o número de dias desejado
    $hoje = Carbon::today();
    $limite = Carbon::today()->addDays($dias);

    $alimentos = \App\Models\Alimento::whereBetween('validade', [$hoje, $limite])->get();

    return view('alimentos.validade_proxima', compact('alimentos', 'dias'));
}

public function show(Alimento $alimento)
{
    return view('alimentos.show', compact('alimento'));
}


}