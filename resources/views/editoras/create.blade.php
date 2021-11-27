@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-5 mt-5">
    <h2 class="border-left border-primary pl-2">Nova editora</h2>
    <a role="button" aria-pressed="true" class=" btn btn-outline-secondary" href="{{route('editoras.index')}}">Voltar</a>
</div>

<div class="card">
    <div class="card-header">
        Formulário de editora
    </div>
    <div class="card-body">
        <form action="{{ route('editoras.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
        </form>
    </div>
</div>
@endsection