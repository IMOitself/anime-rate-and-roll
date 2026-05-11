<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $ratings = auth()->user()->ratings()->with('anime')->latest()->get();
        return view('dashboard', compact('ratings'));
    }
}