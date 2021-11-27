@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Alugueis</h2>
    <a type="button" class="btn btn-primary" href="{{route('alugueis.create')}}">Novo aluguel</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Livro</th>
            <th scope="col">Cliente</th>
            <th scope="col">Data de retirada</th>
            <th scope="col">Data de devolução</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alugueis as $aluguel)
        <tr>
            <th scope="row">{{$aluguel->id}}</th>
            <td>{{$aluguel->livro->titulo}}</td>
            <td>{{$aluguel->cliente->nome}}</td>
            <td>{{$aluguel->dataRetirada}}</td>
            <td>{{$aluguel->dataDevolucao}}</td>
            <td>
                <form method="post" action="{{route('alugueis.destroy', $aluguel->id) }}">
                    <a href="{{ route('alugueis.edit',$aluguel->id) }}" class="btn btn-outline-info">Editar</a>

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