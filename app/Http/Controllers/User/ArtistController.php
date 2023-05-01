<?php

namespace App\Http\Controllers\User;

use App\Models\Artist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ArtistController extends Controller
{
    public function index()
    {
        $query = DB::select("SELECT * FROM artists ");
        
        $page = request()->query('page', 1);
        $perPage = 10;
        $items = collect($query);
        $paginator = new Paginator($items->forPage($page, $perPage), $perPage, $page);

        $artists = $paginator;
        
        return view('user.list.artists', compact('artists'));
    }

    public function create()
    {
        return view('user.form.artist');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'first_release_year' => 'required',
            'no_of_album_release' => 'required',
        ]);

        $name = request('name');
        $address = request('address');
        $dob = request('dob');
        $gender = request('gender');
        $first_release_year = request('first_release_year');
        $no_of_album_release = request('no_of_album_release');

        $sql = "INSERT INTO artists (name, address, dob, gender, first_release_year, no_of_album_release) VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$name, $address, $dob, $gender, $first_release_year, $no_of_album_release];
        $success = DB::insert($sql, $params);

        if ($success) {
            return redirect()->route('user.artists.get')->with('success_message', 'Artist created successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to create artist');
        }

    }

    public function edit($id)
    {
        $artist = DB::select("SELECT * FROM artists WHERE id = $id");
        // dd($user[0]->id);
        return view('user.form.artist', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'first_release_year' => 'required',
            'no_of_album_release' => 'required',
        ]);

        

        $name = request('name');
        $address = request('address');
        $dob = request('dob');
        $gender = request('gender');
        $first_release_year = request('first_release_year');
        $no_of_album_release = request('no_of_album_release');

        // dd($gender);

        $success = DB::update('UPDATE artists SET name = ?, address = ?, dob = ?, gender = ?, first_release_year = ?, no_of_album_release = ? WHERE id = ?', [$name, $address, $dob, $gender, $first_release_year, $no_of_album_release, $id]);

        // dd($success);

        if ($success) {
            return redirect()->route('user.artists.get')->with('success_message', 'Artist Updated successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to update Artist');
        }
    }

    public function destory($id)
    {
        $success = DB::delete("DELETE from artists where id = $id");

        if ($success) {
            return redirect()->route('user.artists.get')->with('success_message', 'Artist Deleted successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to delete Artist');
        }
    }

    public function musics($artist_id)
    {
        $artist = DB::select("SELECT * FROM artists WHERE id = $artist_id");

        $query_music = DB::select("SELECT * FROM music WHERE artist_id = $artist_id");
        
        $page = request()->query('page', 1);
        $perPage = 10;
        $items = collect($query_music);
        $paginator = new Paginator($items->forPage($page, $perPage), $perPage, $page);

        $musics = $paginator;

        // dd($musics);
        // foreach($musics as $row)
        // {
        //     dd($row->title);
        // }

        return view('user.form.artist-music', compact('artist', 'musics'));
    }

    public function storeMusics(Request $request, $artist_id)
    {
        $request->validate([
            'title' => 'required',
            'album_name' => 'required',
            'genre' => 'required',
        ]);

        $title = request('title');
        $album_name = request('album_name');
        $genre = request('genre');

        $sql = "INSERT INTO music (artist_id, title, album_name, genre) VALUES (?, ?, ?, ?)";
        $params = [$artist_id, $title, $album_name, $genre];
        $success = DB::insert($sql, $params);

        if ($success) {
            return redirect()->back()->with('success_message', 'Music created successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to create music');
        }
    }

    public function editMusics($artist_id, $music_id)
    {
        $artist = DB::select("SELECT * FROM artists WHERE id = $artist_id");
        $music = DB::select("SELECT * FROM music WHERE id = $music_id");

        $query_music = DB::select("SELECT * FROM music WHERE artist_id = $artist_id AND id <> $music_id");
        
        $page = request()->query('page', 1);
        $perPage = 10;
        $items = collect($query_music);
        $paginator = new Paginator($items->forPage($page, $perPage), $perPage, $page);

        $musics = $paginator;

        return view('user.form.artist-music', compact('artist', 'music', 'musics'));
    }

    public function updateMusics(Request $request, $artist_id, $music_id)
    {
        $request->validate([
            'title' => 'required',
            'album_name' => 'required',
            'genre' => 'required',
        ]);

        $title = request('title');
        $album_name = request('album_name');
        $genre = request('genre');

        $success = DB::update('UPDATE music SET artist_id = ?, title = ?, album_name = ?, genre = ? WHERE id = ?', [$artist_id, $title, $album_name, $genre, $music_id]);

        // dd($success);

        if ($success) {
            return redirect()->back()->with('success_message', 'Music Updated successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to update music');
        }
    }

    public function destroyMusics($id)
    {
        $success = DB::delete("DELETE from music where id = $id");

        if ($success) {
            return redirect()->back()->with('success_message', 'Music Deleted successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to delete Music');
        }
    }
}
