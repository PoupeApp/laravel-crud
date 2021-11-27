@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Novo cliente</h2>
    <a role="button" aria-pressed="true" class=" btn btn-outline-secondary" href="{{route('clientes.index')}}">Voltar</a>
</div>

<div class="card">
    <div class="card-header">
        Formulário de cliente
    </div>
    <div class="card-body">
        <form action="{{ route('clientes.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
        </form>
    </div>
</div>
@endsection