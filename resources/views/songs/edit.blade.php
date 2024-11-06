@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Lagu: {{ $song->title }}</h1>
    </div>

    <!-- Form Edit Lagu -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('songs.update', $song->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Field Judul Lagu -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Judul Lagu:</label>
                <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title', $song->title) }}" required>
            </div>

            <!-- Field Album -->
            <div class="mb-4">
                <label for="album_id" class="block text-gray-700">Pilih Album:</label>
                <select name="album_id" id="album_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Album --</option>
                    @foreach ($albums as $album)
                        <option value="{{ $album->id }}" {{ old('album_id', $song->album_id) == $album->id ? 'selected' : '' }}>{{ $album->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Field Artis -->
            <div class="mb-4">
                <label for="artist_id" class="block text-gray-700">Pilih Artis:</label>
                <select name="artist_id" id="artist_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">-- Pilih Artis --</option>
                    @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}" {{ old('artist_id', $song->artist_id) == $artist->id ? 'selected' : '' }}>{{ $artist->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Field Durasi -->
            <div class="mb-4">
                <label for="duration" class="block text-gray-700">Durasi:</label>
                <input type="text" name="duration" id="duration" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('duration', $song->duration) }}" required>
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <a href="{{ route('songs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-600">Batal</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
