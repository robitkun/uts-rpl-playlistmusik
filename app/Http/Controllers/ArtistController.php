<?php

namespace App\Http\Controllers;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(){
        $artists = Artist::all();
        return view('artist.index',compact('artists'));
    }
    public function create()
    {
        return view('artist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'genre' => 'nullable|string|max:50',
        ]);

        Artist::create($request->all());
        return redirect()->route('artists.index')->with('success', 'Artist created successfully.');
    }

    public function show(Artist $artist)
    {
        return view('artist.show', compact('artist'));
    }

    public function edit(Artist $artist)
    {
        return view('artist.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'genre' => 'nullable|string|max:50',
        ]);

        $artist->update($request->all());
        return redirect()->route('artists.index')->with('success', 'Artist updated successfully.');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully.');
    }
}
