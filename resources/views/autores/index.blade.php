@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Autores</h2>
    <a type="button" class="btn btn-primary" href="{{route('autores.create')}}">Novo Autor</a>
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
        @foreach($autores as $autor)
        <tr>
            <th scope="row">{{$autor->id}}</th>
            <td>{{$autor->nome}}</td>
            <td>
                <form method="post" action="{{route('autores.destroy', $autor->id) }}" >
                    <a href="{{ route('autores.edit',$autor->id) }}" class="btn btn-outline-info">Editar</a>

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