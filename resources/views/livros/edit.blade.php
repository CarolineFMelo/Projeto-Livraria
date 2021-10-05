<!-- determina de qual layout está extendendo -->
@extends('layouts.main')

<!-- título dessa página -->
@section('title','Editando: ' . $livro->title)

<!-- início conteúdo do site -->
@section('content')

<div id="livro-create-container" class="col-md-6 offset-md-3">
  <h3>Editando: {{ $livro->title }}</h3>

  <form action="/livros/update/{{ $livro->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="image">Imagem:</label>
      <input type="file" class="form-control-file" id="image" name="image">
      <img src="/img/livros/{{ $livro->image }}" alt="{{ $livro->title }}" class="img-preview">
    </div>

    <div class="form-group">
      <label for="title">Título:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Título" value="{{ $livro->title }}">
    </div>

    <div class="form-group">
      <label for="title">Autor:</label>
      <input type="text" class="form-control" id="author" name="author" placeholder="Autor" value="{{ $livro->author }}">
    </div>

    <div class="form-group">
      <label for="title">Editora:</label>
      <input type="text" class="form-control" id="publishing" name="publishing" placeholder="Editora" value="{{ $livro->publishing }}">
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Descrição" value="{{ $livro->description }}"></textarea>
    </div>
    <div class=" form-group">
      <label for="title">Preço:</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="Preço" value="{{ $livro->price }}">
    </div>
    <div class="form-group">
      <label for="title">Adicione itens característicos:</label>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="cartonado"> Capa dura/cartonado
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="brochura"> Capa mole/brochura
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="marcador"> Marcador de página
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="pôster"> Pôster
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="autógrafo"> Autógrafo
      </div>
      <div class="form-group">
        <label for="date">Data de lançamento:</label>
        <input type="date" class="form-control" id="date" name="date" value="{{ $livro->date->format('Y-m-d') }}">
      </div>
    </div>
    <input type="submit" class="button" value="Concluir edição">

  </form>

</div>

<!-- fim conteúdo do site -->
@endsection