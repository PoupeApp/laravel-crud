<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $data['generos'] = Genero::all();
        return view('generos.index', $data);
    }

    public function create()
    {
        return view('generos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        $genero = new Genero;
        $genero->nome = $request->nome;
        $genero->save();
        return redirect()->route('generos.index');
    }

    public function edit($id)
    {
        $data['genero'] = Genero::findOrFail($id);

        return view('generos.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        $genero = Genero::find($id);
        $genero->nome = $request->nome;
        $genero->save();
        return redirect()->route('generos.index');
    }
    public function destroy($id)
    {
        Genero::destroy($id);
        return redirect()->route('generos.index');
    }
}
