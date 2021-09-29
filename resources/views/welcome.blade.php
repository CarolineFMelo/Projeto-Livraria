<!-- determina de qual layout está extendendo -->
@extends('layouts.main')

<!-- título dessa página -->
@section('title', 'Livraria Books')

<!-- início conteúdo do site -->
@section('content')

<h3>Bem-Vindo!!</h3>

<div id="search-container">

    <h3>Busque um livro</h3>

    <form action="">
        <input type="text" id="search" name="search" placeholder="Procurar...">
    </form>

</div>

<div id="livros-container">

    <h3>Livros</h3>
    <p>Veja nosso catálogo de livros disponíveis</p>

    <div id="cards-container" class="row">
        @foreach($livros as $livro)
        <div class="card col-md-2">

            <img src="/img/livros/{{ $livro->image }}" alt="{{ $livro->title }}">

            <div class="card-body">
                <h5>{{ $livro->title }}</h5>
                <h6>R${{ $livro->price }}</h6>
                <a href="/livros/{{ $livro->id }}" class="button-book">Ver mais</a>
            </div>

        </div>
        @endforeach
    </div>

</div>

<!-- fim conteúdo do site -->
@endsection