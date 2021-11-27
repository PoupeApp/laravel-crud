@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Editar {{$livro->titulo}}</h2>
    <a role="button" aria-pressed="true" class=" btn btn-outline-secondary" href="{{route('livros.index')}}">Voltar</a>
</div>

<div class="card">
    <div class="card-header">
        Formulário de livro
    </div>
    <div class="card-body">
        <form action="{{ route('livros.update', $livro->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{$livro->titulo}}" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" value="{{$livro->isbn}}" name="isbn" required>
            </div>
            <div class="form-group">
                <label for="dataPublicacao">Date de Publicação</label>
                <input type="date" class="form-control" id="dataPublicacao" value="{{$livro->dataPublicacao}}" name="dataPublicacao" required>
            </div>

            <div class="form-group">
                <label for="sinopse">Sinopse</label>
                <textarea class="form-control" name="sinopse" id="sinopse">{{$livro->sinopse}}</textarea>
            </div>
            @php
             $autoresSelected = $livro->autores()->get()->pluck('id')->toArray();
             $generosSelected = $livro->generos()->get()->pluck('id')->toArray();
            @endphp
            <div class="form-group">
                <label for="autores">Autores</label>
                <select class="form-control" multiple name="autores[]" id="autores" >
                    @foreach ($autores as $autor)
                    <option value="{{$autor->id}}" @if(in_array($autor->id, $autoresSelected)) selected @endif>{{$autor->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="generos">Generos</label>
                <select class="form-control" multiple name="generos[]" id="generos" >
                    @foreach ($generos as $genero)
                    <option value="{{$genero->id}}" @if(in_array($genero->id, $generosSelected)) selected @endif >{{$genero->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="editora">Editora</label>
                <select class="form-control" name="editora_id" id="editora" >
                    @foreach ($editoras as $editora)
                    <option value="{{$editora->id}}" @if($editora->id == $livro->editora->id) selected @endif>{{$editora->nome}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary float-right">Salvar</button>
        </form>
    </div>
</div>
@endsection