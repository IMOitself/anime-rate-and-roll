<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('animes.index');
});

Route::resource('animes', AnimeController::class);

require __DIR__.'/auth.php';
