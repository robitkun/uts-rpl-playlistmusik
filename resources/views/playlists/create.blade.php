@extends('layouts.app')

@section('content')
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Tambah Playlist</h1>

    <form action="{{ route('playlists.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-lg font-medium text-gray-700">Nama Playlist</label>
            <input type="text" name="name" id="name" class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label for="songs" class="block text-lg font-medium text-gray-700">Pilih Lagu</label>
            <div class="mt-2 space-y-2">
                @foreach ($songs as $song)
                    <div class="flex items-center">
                        <input type="checkbox" name="songs[]" id="song{{ $song->id }}" value="{{ $song->id }}" class="form-checkbox h-5 w-5 text-indigo-600" 
                            {{ in_array($song->id, old('songs', [])) ? 'checked' : '' }}>
                        <label for="song{{ $song->id }}" class="ml-2 text-gray-700">{{ $song->title }}</label>
                    </div>
                @endforeach
            </div>
            <small class="text-sm text-gray-500">Pilih satu atau lebih lagu untuk playlist ini.</small>
        </div>

        <button type="submit" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan</button>
    </form>
</div>
@endsection
