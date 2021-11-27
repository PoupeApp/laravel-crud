<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Editora;
use App\Models\Genero;
use App\Models\Livro;
use FFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LivroController extends Controller
{
    public function index()
    {
        $data['livros'] = Livro::all();
        return view('livros.index', $data);
    }

    public function create()
    {
        $data['autores'] = Autor::all();
        $data['editoras'] = Editora::all();
        $data['generos'] = Genero::all();
        return view('livros.create', $data);
    }

    public function store(Request $request)
    {
        $livro = new Livro;
        $livro->titulo = $request->titulo;
        $livro->isbn = $request->isbn;
        $livro->dataPublicacao = $request->dataPublicacao;
        $livro->sinopse = $request->sinopse;
        $livro->editora_id = $request->editora_id;
        $livro->save();
        $livro->autores()->attach($request->autores);
        $livro->generos()->attach($request->generos);
        return redirect()->route('livros.index');
    }

    public function edit($id)
    {
        $data['livro'] = Livro::findOrFail($id);
        $data['autores'] = Autor::all();
        $data['editoras'] = Editora::all();
        $data['generos'] = Genero::all();
        return view('livros.edit', $data);
    }

    public function update(Request $request, $id)
    {
 
        $livro = Livro::find($id);
        $livro->titulo = $request->titulo;
        $livro->isbn = $request->isbn;
        $livro->dataPublicacao = $request->dataPublicacao;
        $livro->sinopse = $request->sinopse;
        $livro->editora_id = $request->editora_id;
        $livro->save();
        $livro->autores()->sync($request->autores);
        $livro->generos()->sync($request->generos);
        return redirect()->route('livros.index');
    }
    public function destroy($id)
    {
        Livro::destroy($id);
        return redirect()->route('livros.index');
    }
}
