<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $ratings = auth()->check() 
            ? auth()->user()->ratings()->with('anime')->latest()->get()
            : collect();
            
        return view('dashboard', compact('ratings'));
    }
}