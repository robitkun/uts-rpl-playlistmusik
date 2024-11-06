<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistSongController extends Controller
{
    public function addSong(Request $request, Playlist $playlist)
    {
        // Validasi ID lagu
        $request->validate([
            'song_id' => 'required|exists:songs,id',
        ]);

        // Tambahkan lagu ke playlist jika belum ada
        if (!$playlist->songs->contains($request->song_id)) {
            $playlist->songs()->attach($request->song_id);
            return redirect()->route('playlists.show', $playlist->id)->with('success', 'Song added to playlist.');
        }

        return redirect()->route('playlists.show', $playlist->id)->with('info', 'Song already exists in the playlist.');
    }

    public function removeSong(Playlist $playlist, Song $song)
    {
        // Hapus lagu dari playlist
        $playlist->songs()->detach($song->id);
        return redirect()->route('playlists.show', $playlist->id)->with('success', 'Song removed from playlist.');
    }
}
