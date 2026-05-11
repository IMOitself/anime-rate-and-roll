<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return redirect()->route('admin.users');
        }

        $ratings = auth()->check() 
            ? auth()->user()->ratings()->with('anime')->latest()->get()
            : collect();
            
        return view('dashboard', compact('ratings'));
    }
}