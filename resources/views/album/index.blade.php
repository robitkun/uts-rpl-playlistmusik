<!-- resources/views/album/index.blade.php -->

@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Daftar Album</h1>
        <a href="{{ route('albums.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Tambah Album</a>
    </div>

    <!-- Tabel Album -->
    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Judul</th>
                <th class="py-2 px-4 border-b">Tanggal Rilis</th>
                <th class="py-2 px-4 border-b">Artist</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td class="py-2 px-4 border-b">{{ $album->title }}</td>
                <td class="py-2 px-4 border-b">{{ $album->release_date }}</td>
                <td class="py-2 px-4 border-b">{{ $album->artist->name }}</td>
                <td class="py-2 px-4 border-b flex space-x-2">
                    <a href="{{ route('albums.show', $album->id) }}" class="text-blue-500">Lihat</a>
                    <a href="{{ route('albums.edit', $album->id) }}" class="text-yellow-500">Edit</a>
                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus album ini?')" class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
