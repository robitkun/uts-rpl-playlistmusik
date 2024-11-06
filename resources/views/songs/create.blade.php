@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Lagu</h1>

    <form action="{{ route('songs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Lagu</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="album_id" class="form-label">Pilih Album</label>
            <select name="album_id" id="album_id" class="form-control">
                <option value="">-- Pilih Album --</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}" {{ old('album_id') == $album->id ? 'selected' : '' }}>{{ $album->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="artist_id" class="form-label">Pilih Artis</label>
            <select name="artist_id" id="artist_id" class="form-control" required>
                <option value="">-- Pilih Artis --</option>
                @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}" {{ old('artist_id') == $artist->id ? 'selected' : '' }}>{{ $artist->name }}</option>
                @endforeach
            </select>
        </div>
        

        <div class="mb-3">
            <label for="duration" class="form-label">Durasi</label>
            <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
