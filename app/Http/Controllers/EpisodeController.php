<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Episode;

class EpisodeController extends Controller
{
    public function index() {
        // $episodes = Episode::all();

        // $episode = Episode::find(1);
        // // $epsodios_com_query = Episode::query()
        // //             ->whereIn('id', [1, 2])
        // //             ->get();

        //         $epsodios_com_query = Episode::query()
        //             ->whereIn('id', [1, 2])
        //             ->first();

        // dd($epsodios_com_query);
        // // dd($episode->toArray());
        // // dd($episodes);

        // $episode = new Episode();
        // $episode->title = "Mr. Roboot";
        // $episode->number = "456";
        // $episode->rating = "10";
        // $episode->release_date = "2020-03-06 00:00:00";
        // $episode->save();

        // $episode = Episode::find(58);
        // dd($episode);

        // $episode = Episode::find(1);
        // $episode->title = "GOT - Não presta!";
        // $episode->save();
        // dd($episode);

        $episode = Episode::find(1);
        $episode->delete();
    }
}
