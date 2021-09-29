<!-- determina de qual layout está extendendo -->
@extends('layouts.main')

<!-- título dessa página -->
@section('title', 'Adicionar livro')

<!-- início conteúdo do site -->
@section('content')

<div id="livro-create-container" class="col-md-6 offset-md-3">
  <h3>Adicione um livro</h3>

  <form action="/livros" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Imagem:</label>
      <input type="file" class="form-control-file" id="image" name="image">
    </div>

    <div class="form-group">
      <label for="title">Título:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Título">
    </div>

    <div class="form-group">
      <label for="title">Autor:</label>
      <input type="text" class="form-control" id="author" name="author" placeholder="Autor">
    </div>

    <div class="form-group">
      <label for="title">Editora:</label>
      <input type="text" class="form-control" id="publishing" name="publishing" placeholder="Editora">
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Descrição"></textarea>
    </div>
    <div class="form-group">
      <label for="title">Preço:</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="Preço">
    </div>
    <input type="submit" class="button" value="Adicionar Livro">

  </form>

</div>

<!-- fim conteúdo do site -->
@endsection