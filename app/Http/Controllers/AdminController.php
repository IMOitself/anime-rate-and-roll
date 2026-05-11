<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::withCount('ratings')
            ->where('id', '!=', auth()->id())
            ->where('email', '!=', 'commander@erwin.com')
            ->get();

        return view('admin.users', compact('users'));
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')->with('error', 'Cannot delete yourself.');
        }

        if ($user->email === 'commander@erwin.com') {
            return redirect()->route('admin.users')->with('error', 'Cannot delete the default admin.');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted.');
    }
}
