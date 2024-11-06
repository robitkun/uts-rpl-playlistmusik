<?php

namespace App\Http\Controllers;
use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::all();
        return view('playlists.index', compact('playlists'));
    }

    public function create()
    {
        $songs =Song::all();
        return view('playlists.create' ,compact('songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'songs' => 'required|array',  // Memastikan input songs berupa array
            'songs.*' => 'exists:songs,id', // Validasi agar ID lagu yang dipilih ada di tabel songs
        ]);
    
        // Membuat playlist baru
        $playlist = Playlist::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id(),  // Pastikan user_id dimasukkan
        ]);
    
        // Menyimpan hubungan banyak ke banyak (many-to-many) antara playlist dan lagu
        $playlist->songs()->attach($request->songs);
    
        return redirect()->route('playlists.index')->with('success', 'Playlist created successfully.');
    }
    

    public function show(Playlist $playlist)
    {
        return view('playlists.show', compact('playlist'));
    }

    public function edit(Playlist $playlist)
    {
        $songs = Song::all();
        return view('playlists.edit', compact('playlist','songs'));
    }

    public function update(Request $request, Playlist $playlist)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'songs' => 'required|array',
    ]);

    // Debug: melihat lagu yang dikirim

    // Perbarui nama playlist
    $playlist->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    // Sinkronkan lagu-lagu yang dipilih dengan playlist
    $playlist->songs()->sync($request->songs);

    return redirect()->route('playlists.index')->with('success', 'Playlist updated successfully.');
}


    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('playlists.index')->with('success', 'Playlist deleted successfully.');
    }
}
