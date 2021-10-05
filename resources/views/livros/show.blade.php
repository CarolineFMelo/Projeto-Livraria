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
        <ion-icon name="book-outline"></ion-icon>Editora {{ $livro->publishing }}
      </p>

      <p class="livro-date">
        <ion-icon name="calendar-outline"></ion-icon>Publicado em {{ date("d/m/Y", strtotime($livro->date)) }}
      </p>

      <p class="livro-description">
        <ion-icon name="newspaper-outline"></ion-icon>{{ $livro->description }}
      </p>

      <p class="livro-price">
        <ion-icon name="cash-outline"></ion-icon>R${{ $livro->price }}
      </p>

      <h7>O livro acompanha:</h7>
      <ul id="items-list">
        @foreach($livro->items as $item)
        <li>
          <ion-icon name="checkmark"></ion-icon>{{ $item }}
        </li>
        @endforeach
      </ul>

      <a href="/buy" class="button">Comprar</a>

      <form action="/livros/{{ $livro->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="button">Deletar</button>
      </form>
    </div>

  </div>
</div>

<!-- fim conteúdo do site -->
@endsection