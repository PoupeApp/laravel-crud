<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{

    public function index()
    {
        $data['autores'] = Autor::all();
        return view('autores.index', $data);
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        $autor = new Autor;
        $autor->nome = $request->nome;
        $autor->save();
        return redirect()->route('autores.index');
    }

    public function edit($id)
    {
        $data['autor'] = Autor::findOrFail($id);
    
        return view('autores.edit', $data);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nome' => 'required',
        ]);
        $autor = Autor::find($id);
        $autor->nome = $request->nome;
        $autor->save();
        return redirect()->route('autores.index');
    }
    public function destroy($id)
    {
        Autor::destroy($id);
        return redirect()->route('autores.index');
    }
}
