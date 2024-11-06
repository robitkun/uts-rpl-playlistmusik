<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('artist')->get();
        return view('album.index', compact('albums'));
    }

    public function create()
    {
        $artists = Artist::all();
        return view('album.create', compact('artists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'release_date' => 'nullable|date',
            'artist_id' => 'required|exists:artists,id',
        ]);

        Album::create($request->all());
        return redirect()->route('albums.index')->with('success', 'Album created successfully.');
    }

    public function show(Album $album)
    {
        return view('album.show', compact('album'));
    }

    public function edit(Album $album)
    {
        $artists = Artist::all();
        return view('album.edit', compact('album', 'artists'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'release_date' => 'nullable|date',
            'artist_id' => 'required|exists:artists,id',
        ]);

        $album->update($request->all());
        return redirect()->route('albums.index')->with('success', 'Album updated successfully.');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index')->with('success', 'Album deleted successfully.');
    }
}
