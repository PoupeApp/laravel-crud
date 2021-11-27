@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Editar aluguel de {{$aluguel->cliente->nome}}</h2>
    <a role="button" aria-pressed="true" class=" btn btn-outline-secondary" href="{{route('alugueis.index')}}">Voltar</a>
</div>

<div class="card">
    <div class="card-header">
        Formulário de aluguel
    </div>
    <div class="card-body">
        <form action="{{ route('alugueis.update', $aluguel->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select class="form-control"  name="cliente_id" id="cliente_id">
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}" @if($cliente->id == $aluguel->cliente->id) selected @endif>{{$cliente->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="livro_id">Livro</label>
                <select class="form-control" name="livro_id" id="livro_id" >
                    @foreach ($livros as $livro)
                    <option value="{{$livro->id}}" @if($livro->id == $aluguel->livro->id) selected @endif >{{$livro->titulo}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary float-right">Salvar</button>
        </form>
    </div>
</div>
@endsection