<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{route('autores.index')}}" class="nav-link {{Request::is('autores**') ? 'active':''}}" aria-current="page">Autores</a></li>
                <li class="nav-item"><a href="{{route('editoras.index')}}" class="nav-link {{Request::is('editoras**') ? 'active':''}}">Editoras</a></li>
                <li class="nav-item"><a href="{{route('generos.index')}}" class="nav-link {{Request::is('generos**') ? 'active':''}}">Generos</a></li>
                <li class="nav-item"><a href="{{route('livros.index')}}" class="nav-link {{Request::is('livros**') ? 'active':''}}">Livros</a></li>
                <li class="nav-item"><a href="{{route('clientes.index')}}" class="nav-link {{Request::is('clientes**') ? 'active':''}}">Clientes</a></li>
                <li class="nav-item"><a href="{{route('alugueis.index')}}" class="nav-link {{Request::is('alugueis**') ? 'active':''}}">Alugueis</a></li>
            </ul>
        </header>
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
    
