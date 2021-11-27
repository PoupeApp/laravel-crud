@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Editar {{$autor->nome}}</h2>
    <a role="button" aria-pressed="true" class=" btn btn-outline-secondary" href="{{route('autores.index')}}">Voltar</a>
</div>

<div class="card">
    <div class="card-header">
        Formulário de autor
    </div>
    <div class="card-body">
        <form action="{{ route('autores.update', $autor->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{$autor->nome}}" required>
            </div>
            <button type="submit" class="btn btn-primary float-right">Salvar</button>
        </form>
    </div>
</div>
@endsection