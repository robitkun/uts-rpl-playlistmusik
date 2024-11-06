<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PlaylistSongController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/playlists/{playlist}/songs', [PlaylistSongController::class, 'addSong'])->name('playlists.songs.add');
Route::delete('/playlists/{playlist}/songs/{song}', [PlaylistSongController::class, 'removeSong'])->name('playlists.songs.remove');


Route::resource('artists', ArtistController::class);
Route::resource('albums', AlbumController::class);
Route::resource('songs', SongController::class);
Route::resource('playlists', PlaylistController::class);

require __DIR__.'/auth.php';

