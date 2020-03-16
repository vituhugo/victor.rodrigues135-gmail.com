<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Requests\FilmeRequest;
use App\Genre;

class FilmeController extends Controller
{
    public function procurarFilmeId($id) {
        $filmes = [
            1 => "Toy Story",
            2 => "Procurando Nemo",
            3 => "Avatar",
            4 => "Star Wars: Episódio V",
            5 => "Up",
            6 => "Mary e Max"
        ];
        //code here
        return "O filme escolhido foi: $filmes[$id]";
    }

    public function procurarFilmeNome($nome) {
        $filmes = [ 
            1 => "Toy Story",
            2 => "Procurando Nemo",
            3 => "Avatar",
            4 => "Star Wars: Episódio V",
            5 => "Up",
            6 => "Mary e Max"
        ];

        foreach($filmes as $filme) {
            if (strtolower($filme) == strtolower($nome)) {
                return $filme;
            }
        }
    }

    public function listar() {
        $filmes = Movie::query()->paginate();
        return view('filmes', ['filmes' => $filmes]);
    }

    public function adicionarFilme() {
        $genres = Genre::all();
        return view('adicionar_filme', ['genres' => $genres]);
    }

    public function adicionarFilmePost(FilmeRequest $request) {
        // dd($request->all());
        // $filmeNovo = new Movie();
        // $filmeNovo->title = $request->titulo;
        // $filmeNovo->rating = $request->classificacao;
        // $filmeNovo->awards = $request->premios;
        // $filmeNovo->length = $request->duracao;
        // // $filmeNovo->release_date = '2020-03-09 00:00:00';
        // $filmeNovo->release_date = "$request->ano-$request->mes-$request->dia 00:00:00";
        // $filmeNovo->genre_id = $request->genre_id;
        // $filmeNovo->save();
        $data = $request->all();
        $filmeNovo = new Movie();
        $filmeNovo->release_date = "$request->ano-$request->mes-$request->dia 00:00:00";
        $filmeNovo->fill($data)->save();

        //   "titulo" => "Sair pra passear"
        //     "classificacao" => "12"
        //     "premios" => "5"
        //'     "duracao" => "120"
        //     "dia" => null
        //     "mes" => null
        //     "ano" => null
        //     "submit" => "Adicionar Filme"
        // dd('oi');
        return redirect('/filmes')->with('mensagem', 'Formulario salvo!');
    }
}
