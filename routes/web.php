<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/collection', function() {
    // $winter_is_coming = App\Episode::find(1);
    // dd($winter_is_coming->actors);

    // $movie = App\Movie::find(1);
    // $movie->genre;

    $actor = App\Actor::find(1);
    dd($actor->first_name, $actor->favorite_movie);
});








Route::get('/', function() { return "hello word"; });
Route::get('/episodes', 'EpisodeController@index');
Route::get('/filmes/{id}', 'FilmeController@procurarFilmeId');
Route::get('/filmes/procurar/{nome}', 'FilmeController@procurarFilmeNome');
Route::get('/filmes', 'FilmeController@listar');
Route::get('/adicionar-filme', 'FilmeController@adicionarFilme');
Route::post('/adicionar-filme', 'FilmeController@adicionarFilmePost');

//Adicionar essas Rotas:

Route::get('/adicionar-usuario', 'UserController@create');
Route::post('/adicionar-usuario', 'UserController@store');

Route::get('/usuarios', 'UserController@index')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
