<!-- determina de qual layout está extendendo -->
@extends('layouts.main')

<!-- título dessa página -->
@section('title', $livro->title)

<!-- início conteúdo do site -->
@section('content')

<div class="col-md-10 offset-md-1">
  <div class="row">

    <div id="image-container" class="col-md-6">
      <img src="/img/livros/{{ $livro->image }}" class="img-fluid" alt="{{ $livro->title }}">
    </div>

    <div id="info-container" class="col-md-6">
      <h2>{{ $livro->title }}</h2>

      <p class="livro-author">
        <ion-icon name="star-outline"></ion-icon>
        </ion-icon>Escrito por {{ $livro->author }}
      </p>

      <p class="livro-publishing">
        <ion-icon name="book-outline"></ion-icon>
        </ion-icon>Editora {{ $livro->publishing }}
      </p>

      <p class="livro-description">
        <ion-icon name="newspaper-outline"></ion-icon>{{ $livro->description }}
      </p>

      <p class="livro-price">
        <ion-icon name="cash-outline"></ion-icon>R${{ $livro->price }}
      </p>

      <a href="/buy" class="button">Comprar</a>
    </div>

  </div>
</div>

<!-- fim conteúdo do site -->
@endsection