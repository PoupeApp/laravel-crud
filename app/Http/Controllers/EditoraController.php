<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller
{
    public function index()
    {
        $data['editoras'] = Editora::all();
        return view('editoras.index', $data);
    }

    public function create()
    {
        return view('editoras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        $editora = new Editora;
        $editora->nome = $request->nome;
        $editora->save();
        return redirect()->route('editoras.index');
    }

    public function edit($id)
    {
        $data['editora'] = Editora::findOrFail($id);

        return view('editoras.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        $editora = Editora::find($id);
        $editora->nome = $request->nome;
        $editora->save();
        return redirect()->route('editoras.index');
    }
    public function destroy($id)
    {
        Editora::destroy($id);
        return redirect()->route('editoras.index');
    }
}
