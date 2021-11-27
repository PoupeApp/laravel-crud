@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Livros</h2>
    <a type="button" class="btn btn-primary" href="{{route('livros.create')}}">Novo livro</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">ISBN</th>
            <th scope="col">Data de publicação</th>
            <th scope="col">Autores</th>
            <th scope="col">Generos</th>
            <th scope="col">Editora</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($livros as $livro)
        <tr>
            <th scope="row">{{$livro->id}}</th>
            <td>{{$livro->titulo}}</td>
            <td>{{$livro->isbn}}</td>
            <td>{{$livro->dataPublicacao}}</td>
            @php
             $autores = implode(", ",$livro->autores()->get()->pluck('nome')->toArray());
             $generos = implode(", ",$livro->generos()->get()->pluck('nome')->toArray());
            @endphp
            <td>{{$autores}}</td>
            <td>{{$generos}}</td>
            <td>{{$livro->editora->nome}}</td>
            <td>
                <form method="post" action="{{route('livros.destroy', $livro->id) }}">
                    <a href="{{ route('livros.edit',$livro->id) }}" class="btn btn-outline-info">Editar</a>

                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Remover</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection