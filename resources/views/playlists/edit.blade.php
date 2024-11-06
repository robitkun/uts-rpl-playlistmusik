@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Playlist: {{ $playlist->name }}</h1>

    <form action="{{ route('playlists.update', $playlist->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Playlist</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name', $playlist->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="songs" class="block text-sm font-medium text-gray-700">Pilih Lagu</label>
            <div class="mt-2 space-y-2">
                @foreach ($songs as $song)
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            name="songs[]" 
                            value="{{ $song->id }}" 
                            id="song_{{ $song->id }}" 
                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                            {{ in_array($song->id, $playlist->songs->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label for="song_{{ $song->id }}" class="ml-2 text-sm text-gray-700">{{ $song->title }}</label>
                    </div>
                @endforeach
            </div>
            <small class="text-gray-500">Pilih satu atau lebih lagu untuk playlist ini.</small>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">Update</button>
    </form>
</div>
@endsection
