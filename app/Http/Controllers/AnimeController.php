<?php

namespace App\Http\Controllers;

use App\Models\Anime;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::withCount('ratings')
            ->withAvg('ratings', 'score')
            ->paginate(12);
        return view('animes.index', compact('animes'));
    }

    public function show(Anime $anime)
    {
        $anime->load(['ratings.user']);
        $anime->loadAvg('ratings', 'score');
        return view('animes.show', compact('anime'));
    }
}