<!-- resources/views/album/show.blade.php -->

@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Detail Album</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">{{ $album->title }}</h2>
        
        <div class="mb-4">
            <strong>Artist:</strong>
            <p>{{ $album->artist->name }}</p>
        </div>

        <div class="mb-4">
            <strong>Tanggal Rilis:</strong>
            <p>{{ $album->release_date }}</p>
        </div>

        <div class="flex justify-start mt-6">
            <a href="{{ route('albums.edit', $album->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md mr-2">Edit</a>
            <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus album ini?')" class="bg-red-500 text-white px-4 py-2 rounded-md">Hapus</button>
            </form>
            <a href="{{ route('albums.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md ml-2">Kembali</a>
        </div>
    </div>
</div>
@endsection
