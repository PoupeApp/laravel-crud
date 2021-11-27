@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Clientes</h2>
    <a type="button" class="btn btn-primary" href="{{route('clientes.create')}}">Novo cliente</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <th scope="row">{{$cliente->id}}</th>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->cpf}}</td>
            <td>
                <form method="post" action="{{route('clientes.destroy', $cliente->id) }}" >
                    <a href="{{ route('clientes.edit',$cliente->id) }}" class="btn btn-outline-info">Editar</a>

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