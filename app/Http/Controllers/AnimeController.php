<?php

namespace App\Http\Controllers;

use App\Models\Anime;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::has('ratings')
            ->withCount('ratings')
            ->withAvg('ratings', 'score')
            ->orderByDesc('ratings_avg_score')
            ->orderByDesc('ratings_count')
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