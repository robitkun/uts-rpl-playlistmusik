<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Artist;
use App\Models\Album;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        $artists= Artist::all();
        $albums = Album::all();
        return view('songs.create',compact('albums','artists'));
    }

    public function store(Request $request)
    {
        \Log::info($request->all()); 
        $request->validate([
            'title' => 'required|string|max:100',
            'duration' => 'nullable|integer',
            'album_id' => 'nullable|exists:albums,id',
            'artist_id' => 'required|exists:artists,id',
        ]);

        Song::create([
            'title' => $request->title,
            'duration' => $request->duration ?? null, 
            'album_id' => $request->album_id,
            'artist_id' => $request->artist_id
        ]);

        return redirect()->route('songs.index')->with('success', 'Song created successfully.');
    }

    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    public function edit(Song $song)
    {
        $albums = Album::all();
        $artists = Artist::all();
        return view('songs.edit', compact('song','albums','artists'));
    }

    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'duration' => 'nullable|integer',
            'album_id' => 'nullable|exists:albums,id',
            'artist_id' => 'required|exists:artists,id',
        ]);

        $song->update($request->all());

        return redirect()->route('songs.index')->with('success', 'Song updated successfully.');
    }

    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Song deleted successfully.');
    }
}
