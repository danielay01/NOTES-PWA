<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function dashboard()
{
    $user = Auth::user();
 
    if ($user->role == 1) {
    
        $notes = Note::with('user')->latest()->get();
        return view('admin.dashboard', compact('notes'));
    }
 
    $notes = $user->notes;
    return view('dashboard', compact('notes'));
}


}
