<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homecontroller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::where('id', $user->id)->get();
        return view('home', compact('users'));
    }
}
