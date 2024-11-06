@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Daftar Playlist</h1>
    <a href="{{ route('playlists.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 mb-4 inline-block">Tambah Playlist</a>

    <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">#</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama Playlist</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Jumlah Lagu</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($playlists as $playlist)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $playlist->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $playlist->songs->count() }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <a href="{{ route('playlists.show', $playlist->id) }}" class="bg-blue-500 text-white py-1 px-3 rounded-md hover:bg-blue-600">Lihat</a>
                        <a href="{{ route('playlists.edit', $playlist->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded-md hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-md hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
