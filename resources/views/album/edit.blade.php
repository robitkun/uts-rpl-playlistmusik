<!-- resources/views/album/edit.blade.php -->

@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Edit Album</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('albums.update', $album->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Judul Album:</label>
                <input type="text" name="title" id="title" value="{{ $album->title }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="release_date" class="block text-gray-700">Tanggal Rilis:</label>
                <input type="date" name="release_date" id="release_date" value="{{ $album->release_date }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="artist_id" class="block text-gray-700">Artist:</label>
                <select name="artist_id" id="artist_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @foreach($artists as $artist)
                    <option value="{{ $artist->id }}" {{ $album->artist_id == $artist->id ? 'selected' : '' }}>{{ $artist->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
