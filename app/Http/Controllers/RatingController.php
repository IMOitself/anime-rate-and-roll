<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Gate;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'anime_id' => 'required|exists:animes,id',
            'score' => 'required|integer|min:1|max:10',
            'comment' => 'nullable|string|max:500',
        ]);

        Rating::create([
            'user_id' => auth()->id(),
            'anime_id' => $request->anime_id,
            'score' => $request->score,
            'comment' => $request->comment,
        ]);

        return redirect()->route('dashboard')->with('success', 'Rating saved.');
    }

    public function destroy(Rating $rating)
    {
        Gate::authorize('delete', $rating);
        $rating->delete();

        return redirect()->route('dashboard')->with('success', 'Rating deleted.');
    }
}