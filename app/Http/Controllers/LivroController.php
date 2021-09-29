<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

class LivroController extends Controller
{
  public function index()
  {
    $livros = Livro::all();

    return view('welcome', ['livros' => $livros]);
  }

  public function create()
  {
    return view('livros.create');
  }


  public function about()
  {
    return view('about');
  }

  public function buy()
  {
    return view('buy');
  }

  // Pega as informações que foram preenchidas no formulário e salva nas variáveis do objeto (Livro).
  public function store(request $request)
  {
    $livro = new Livro;

    $livro->title = $request->title;
    $livro->author = $request->author;
    $livro->publishing = $request->publishing;
    $livro->description = $request->description;
    $livro->price = $request->price;
    $livro->items = $request->items;

    // Upload de imagens.
    if ($request->hasFile('image') && $request->file('image')->isValid()) {

      $requestImage = $request->image;

      $extension = $requestImage->extension();

      // Pega o nome do arquivo e cria uma string única baseada no tempo do upload.
      $imageName = md5($requestImage->getClientOriginalname() . strtotime('now')) . "." . $extension;

      $requestImage->move(public_path('img/livros'), $imageName);

      $livro->image = $imageName;
    }

    $livro->save();

    return redirect('/')->with('msg', 'Livro adicionado com sucesso!');
  }

  public function show($id)
  {

    $livro = Livro::findOrFail($id);

    return view('livros.show', ['livro' => $livro]);
  }
}
