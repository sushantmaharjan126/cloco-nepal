<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Artist;
use App\Models\Music;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $artist = Artist::count();
        $music = Music::count();

        return view('user.dashboard', compact('user', 'artist', 'music'));
    }
}
