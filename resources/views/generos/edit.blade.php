@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Editar {{$genero->nome}}</h2>
    <a role="button" aria-pressed="true" class=" btn btn-outline-secondary" href="{{route('generos.index')}}">Voltar</a>
</div>

<div class="card">
    <div class="card-header">
        Formulário de genero
    </div>
    <div class="card-body">
        <form action="{{ route('generos.update', $genero->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{$genero->nome}}" required>
            </div>
            <button type="submit" class="btn btn-primary float-right">Salvar</button>
        </form>
    </div>
</div>
@endsection