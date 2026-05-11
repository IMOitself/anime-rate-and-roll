<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Anime;

class RollController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return redirect()->route('admin.users');
        }

        $randomPage = rand(1, 5);
        $response = Http::withoutVerifying()
            ->get("https://api.jikan.moe/v4/top/anime?filter=bypopularity&page={$randomPage}&sfw=true");

        $data = $response->json('data');

        if (empty($data)) {
            return redirect()->route('roll')->with('error', 'Roll failed. Try again.');
        }

        $apiAnime = collect($data)->random();

        $anime = Anime::firstOrCreate(
            ['mal_id' => $apiAnime['mal_id']],
            [
                'image_url' => $apiAnime['images']['jpg']['large_image_url'] ?? '',
                'title' => $apiAnime['title_english'] ?? $apiAnime['title'] ?? 'Unknown',
                'score' => 0,
                'episodes' => $apiAnime['episodes'] ?? 0,
            ]
        );

        $anime->loadAvg('ratings', 'score');
        $anime->loadCount('ratings');

        return view('roll.index', compact('anime'));
    }
}