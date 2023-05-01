<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class MusicController extends Controller
{
    public function index()
    {
        $query = DB::select("SELECT music.*, artists.name as artist_name FROM music LEFT JOIN artists ON music.artist_id = artists.id");
        
        $page = request()->query('page', 1);
        $perPage = 10;
        $items = collect($query);
        $paginator = new Paginator($items->forPage($page, $perPage), $perPage, $page);

        $musics = $paginator;
        
        return view('user.list.musics', compact('musics'));
    }

    public function create()
    {
        $artists = DB::select("SELECT * FROM artists ");

        return view('user.form.music', compact('artists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'artist' => 'required',
            'title' => 'required',
            'album_name' => 'required',
            'genre' => 'required',
        ]);

        $artist_id = request('artist');
        $title = request('title');
        $album_name = request('album_name');
        $genre = request('genre');

        $sql = "INSERT INTO music (artist_id, title, album_name, genre) VALUES (?, ?, ?, ?)";
        $params = [$artist_id, $title, $album_name, $genre];
        $success = DB::insert($sql, $params);

        if ($success) {
            return redirect()->route('user.musics.get')->with('success_message', 'Music created successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to create Music');
        }

    }

    public function edit($id)
    {
        $music = DB::select("SELECT * FROM music WHERE id = $id");
        // dd($user[0]->id);
        return view('user.form.music', compact('music'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'artist' => 'required',
            'title' => 'required',
            'album_name' => 'required',
            'genre' => 'required',
        ]);

        $artist_id = request('artist');
        $title = request('title');
        $album_name = request('album_name');
        $genre = request('genre');

        $success = DB::update('UPDATE music SET artist_id = ?, title = ?, album_name = ?, genre = ? WHERE id = ?', [$artist_id, $title, $album_name, $genre, $id]);

        // dd($success);

        if ($success) {
            return redirect()->route('user.musics.get')->with('success_message', 'Music Updated successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to update music');
        }
    }

    public function destory($id)
    {
        $success = DB::delete("DELETE from music where id = $id");

        if ($success) {
            return redirect()->route('user.musics.get')->with('success_message', 'Music Deleted successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to delete music');
        }
    }
}
