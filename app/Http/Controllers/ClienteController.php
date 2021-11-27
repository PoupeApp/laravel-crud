<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $data['clientes'] = Cliente::all();
        return view('clientes.index', $data);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required'
        ]);
        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->save();
        return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
        $data['cliente'] = Cliente::findOrFail($id);

        return view('clientes.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required'
        ]);
        $cliente = Cliente::find($id);
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->save();
        return redirect()->route('clientes.index');
    }
    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect()->route('clientes.index');
    }
}
