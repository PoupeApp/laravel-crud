@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Editoras</h2>
    <a type="button" class="btn btn-primary" href="{{route('editoras.create')}}">Nova editora</a>
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
        @foreach($editoras as $editora)
        <tr>
            <th scope="row">{{$editora->id}}</th>
            <td>{{$editora->nome}}</td>
            <td>
                <form method="post" action="{{route('editoras.destroy', $editora->id) }}" >
                    <a href="{{ route('editoras.edit',$editora->id) }}" class="btn btn-outline-info">Editar</a>

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