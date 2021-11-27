<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\Cliente;
use App\Models\Livro;
use Illuminate\Http\Request;

class AluguelController extends Controller
{
    public function index()
    {
        $data['alugueis'] = Aluguel::all();
        return view('alugueis.index', $data);
    }

    public function create()
    {

        $data['clientes'] = Cliente::all();
        $data['livros'] = Livro::all();
        return view('alugueis.create', $data);
    }

    public function store(Request $request)
    {
        $aluguel = new Aluguel;
        $aluguel->cliente_id = $request->cliente_id;
        $aluguel->livro_id = $request->livro_id;
        $aluguel->dataRetirada = date('Y-m-d');
        $aluguel->dataDevolucao = date('Y-m-d', strtotime($aluguel->dataRetirada . ' + 10 days'));
        $aluguel->save();
        return redirect()->route('alugueis.index');
    }

    public function edit($id)
    {
        $data['aluguel'] = Aluguel::findOrFail($id);
        $data['clientes'] = Cliente::all();
        $data['livros'] = Livro::all();
        return view('alugueis.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $aluguel = Aluguel::findOrFail($id);
        $aluguel->cliente_id = $request->cliente_id;
        $aluguel->livro_id = $request->livro_id;
        $aluguel->dataRetirada = date('Y-m-d');
        $aluguel->dataDevolucao = date('Y-m-d', strtotime($aluguel->dataRetirada . ' + 10 days'));
        $aluguel->save();
        return redirect()->route('alugueis.index');
    }
    public function destroy($id)
    {
        Aluguel::destroy($id);
        return redirect()->route('alugueis.index');
    }
}
