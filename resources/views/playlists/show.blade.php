@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Detail Playlist: {{ $playlist->name }}</h1>

    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Lagu dalam Playlist</h3>
    <ul class="list-disc pl-6 space-y-2 text-gray-700">
        @foreach ($playlist->songs as $song)
            <li class="flex items-center">
                <span>{{ $song->title }}</span>
                <span class="ml-2 text-gray-500">Artis: {{ $song->artist->name }}</span>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('playlists.index') }}" class="mt-6 inline-block bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        Kembali ke Daftar Playlist
    </a>
</div>
@endsection
