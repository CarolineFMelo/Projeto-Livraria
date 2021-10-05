<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

class LivroController extends Controller
{
  public function index()
  {

    $search = request('search');

    // title = nome do livro pra pesquisa
    // like = pode ser um título parecido, não precisa ser idêntico
    // % = pode ser qualquer coisa pra trás ou pra frente do que quer buscar

    if ($search) {

      $livros = Livro::where([
        ['title', 'like', '%' . $search . '%']
      ])->get();
    } else {

      $livros = Livro::all();
    }

    return view('welcome', ['livros' => $livros, 'search' => $search]);
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
    $livro->date = $request->date;

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

  public function destroy($id)
  {
    Livro::findOrFail($id)->delete();
    return redirect('/')->with('msg', 'Livro excluído com sucesso!');
  }

  public function edit($id)
  {
    $livro = Livro::findOrFail($id);

    return view('livros.edit', ['livro' => $livro]);
  }

  public function update(Request $request)
  {

    $data = $request->all();

    // Image upload
    if ($request->hasFile('image') && $request->file('image')->isValid()) {

      $requestImage = $request->image;

      $extension = $requestImage->extension();

      // Pega o nome do arquivo e cria uma string única baseada no tempo do upload.
      $imageName = md5($requestImage->getClientOriginalname() . strtotime('now')) . "." . $extension;

      $requestImage->move(public_path('img/livros'), $imageName);

      $data['image'] = $imageName;
    }

    Livro::findOrFail($request->id)->update($data);


    return redirect('/')->with('msg', 'Livro editado com sucesso!');
  }
}
