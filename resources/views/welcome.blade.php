<!-- determina de qual layout está extendendo -->
@extends('layouts.main')

<!-- título dessa página -->
@section('title', 'Livraria Books')

<!-- início conteúdo do site -->
@section('content')

<div id="search-container">

    <h3>Busque um livro</h3>

    <form action="/" method="GET">
        <input class="input-search" type="text" id="search" name="search" placeholder="Procurar...">
        <input class="button-search" type="submit" value="Pesquisar">
    </form>

</div>

<div id="livros-container">

    @if($search)
    <h4>Resultados da busca por: <span>{{ $search }}</span> </h4>
    @else(count($livros) != 0)
    <h3>Livros</h3>
    <h7>Veja nosso catálogo de livros disponíveis</h7>
    @endif

    @if(count($livros) == 0 && $search)
    <h7>Não há resultados para a busca.</h7>
    <a href="/"> Ver todos</a>
    @elseif(count($livros) == 0)
    <h7>Não há livros disponíveis.</h7>
    @endif

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