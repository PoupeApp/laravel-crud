@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Generos</h2>
    <a type="button" class="btn btn-primary" href="{{route('generos.create')}}">Novo genero</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($generos as $genero)
        <tr>
            <th scope="row">{{$genero->id}}</th>
            <td>{{$genero->nome}}</td>
            <td>
                <form method="post" action="{{route('generos.destroy', $genero->id) }}" >
                    <a href="{{ route('generos.edit',$genero->id) }}" class="btn btn-outline-info">Editar</a>

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