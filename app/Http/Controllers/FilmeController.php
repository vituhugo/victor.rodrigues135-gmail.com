<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

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
        return view('adicionar_filme');
    }

    public function adicionarFilmePost(Request $request) {
        // dd($request->all());
        $filmeNovo = new Movie();
        $filmeNovo->title = $request->titulo;
        $filmeNovo->rating = $request->classificacao;
        $filmeNovo->awards = $request->premios;
        $filmeNovo->length = $request->duracao;
        // $filmeNovo->release_date = '2020-03-09 00:00:00';
        $filmeNovo->release_date = "$request->ano-$request->mes-$request->dia 00:00:00";
        $filmeNovo->save();
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
