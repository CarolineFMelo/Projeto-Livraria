<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- muda o title dinamicamente -->
    <title>@yield('title')</title>

    <!-- Fontes do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- CSS  -->
    <link rel="stylesheet" href="/css/styles.css">

    <script src="/js/scripts.js"></script>

</head>

<header>
    <h1>Livraria Books📚</h1>
    <ul>
        <li class="list">
            <a href="/">Início</a>
        </li>
        <li class="list">
            <a href="/livros/create">Novo Livro</a>
        </li>

        @auth
        <li class="list">
            <a href="/dashboard">Livros</a>
        </li>
        <li class="list">
            <form action="/logout" method="POST">
                @csrf
                <a href="/logout" onclick="livro.preventDefault();
                this.closest('form').submit();">Sair
                </a>
            </form>
        </li>
        @endauth
        @guest
        <li class="list">
            <a href="/about">Sobre nós</a>
        </li>
        <li class="list">
            <a href="/login">Login</a>
        </li>
        <li class="list">
            <a href="/register">Cadastrar</a>
        </li>
        @endguest
    </ul>
    <hr class="divider">
</header>

<body>
    <!-- Ícones -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>

<!-- muda o conteúdo dinamicamente -->
<main>
    <div class="container-fluid">
        <div class="row">
            @if(session('msg'))
            <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content')
        </div>
    </div>
</main>
<footer>
    <p>Livraria Books &copy; 2021</p>
</footer>

</html>

<!-- Banco de Dados -->
<!-- http://localhost/phpmyadmin/index.php?route=/sql&db=livrariabooks&table=livros&pos=0 -->